<?php
class Appapi_Model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function login_check($email){
        $gmailid=$this->security->xss_clean($email);
        $this->db->where('email',$gmailid);
        $query=$this->db->get('users');
        $num_rows=$query->num_rows();
        if($num_rows == 1)
        {
            $this->db->select('email, fullname, phone, college, accommodation');
            if( $gmailid != NULL ){
                $this->db->where('email', $gmailid );
            }
            $query = $this->db->get('users');
            return $query->result_array()[0];
        }else{
            return "false";
        }
    }
    public function get_user_full_info($hash){
        if( $this->session->type != 'super' && $this->session->type != 'monitor' && $this->session->type != 'accommodation' && $this->session->type != 'volunteer' && $this->session->event_id == NULL && $this->session->cat_id == NULL ){
            return 401;
        }
        $hash=$this->security->xss_clean($hash);
        $this->db->where('hashcode',$hash);
        $query=$this->db->get('users');
        $num_rows=$query->num_rows();

        if($num_rows == 1)
        {

            $emailid=$query->row()->email;
            $this->db->select ( 'title,link' );
            $this->db->from ( 'events' );
            $this->db->join ( 'registration', 'registration.event_id = events.event_id' , 'inner' );
            if( $emailid != NULL ){
                $this->db->where ( 'registration.member_email',$emailid);
                $queryx = $this->db->get ();
                $data['email']=$query->row()->fullname;
                $data['college']=$query->row()->college;
                $data['fullname']=$query->row()->fullname;
                $data['phone']=$query->row()->phone;
                $data['accommodation']=$query->row()->accommodation;
                $data['events']=$queryx->result_array();
                return $data;
            }

        }else{
            return "false";
        }
    }
    public function GetEventCurrentStatus($eid, $email = NULL){
        $event=$this->get_single_event($eid);
        $eid=$event->event_id;
        $today = date('Y-m-d');
        $startdate=date('Y-m-d', strtotime($event->reg_start));
        $enddate = date('Y-m-d', strtotime($event->reg_end));
        $this->load->model('report_model');
        $cnt=$this->report_model->get_event_reg_count($eid);

        if ($email != NULL) {

            $this->db->select ( '*' );
            $this->db->from ( 'registration' );
    
            if( $eid != NULL ){
                $this->db->where ('member_email',$email);
                $this->db->where ('event_id',$eid);

                $queryx = $this->db->get ();
                if($queryx->num_rows()>0){
                    return 'booked';
                }
            }

        }

        if (($today >= $startdate) && ($today <= $enddate)){


            if($cnt<$event->seats || $event->seats == 0){
                // available
                return true;
            }else{
                //Sold Out
                return 'sold';
            }

        }else{
            if(($startdate  > $today)){
                $dtstart = date_create($startdate);
                //Not Started
                return $dtstart;

            }
            if(($today > $enddate)){
                //closed
                return 'closed';
            }
        }
    }


    public function get_single_event($eid){
        $this->db->select ( '*' );
        $this->db->from ( 'events' );

        if( $eid != NULL ){
            $this->db->where ('event_id',$eid);
            $query = $this->db->get ();
            return $query->row();
        }


    }

    public function insert_user_details($isupdate="N"){
       $email=$this->security->xss_clean($this->input->post('email'));
        $data['fullname']=$this->security->xss_clean($this->input->post('fullname'));
        $data['college']=$this->security->xss_clean($this->input->post('college'));
        $data['phone']=$this->security->xss_clean($this->input->post('phone'));
        if($email){
            if($isupdate=="N"){
                $data['email']=$email;
                $data['hashcode']=password_hash($email, PASSWORD_BCRYPT);
                //mail send
                 $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://www.hestia.live/payment/mail/usermail.php?email='.$data['email'].'',
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0"
                ]);
            // Send the request & save response to $resp
                $resp = curl_exec($curl);
            //echo $resp;
            // Close request to clear up some resources
                curl_close($curl);
                return $this->db->insert('users', $data);
                }else{
                $this->db->where('email', $email );
                return $this->db->update('users', $data);
            }

        }else{
            return "0";
        }
        
    }

    public function get_reg_events(){
        $email=$this->security->xss_clean($this->input->post('email'));
        $imgpath=base_url("assets/uploads/event_images/");
        $query=$this->db->query("select e.event_id, e.title, e.file1 as f1_hint, e.file2 as f2_hint, r.file1, r.file2 from events e, registration r where e.event_id=r.event_id and r.member_email='".$email."'");
        return  json_encode($query->result());

    }
    public function get_event_count($catname){

        $query=$this->db->query("select * from events where cat_id in (select cat_id from categories where cat_name like '".$catname. "%')");
        return  $query->num_rows();

    }

    public function get_event_details(){
        $id=$this->security->xss_clean($this->input->post('id'));
        $this->db->select('event_id, cat_id, title, short_desc, details, min_memb, max_memb, venue, reg_fee, fee_type, prize, file1, file2, co1_name, co1_no, co2_name, co2_no, seats, reg_start, reg_end, link');
        $this->db->where('event_id', $id );
        $query = $this->db->get('events');
        return json_encode($query->result_array());
    }


    public function set_file_urls($mem_email,$f1,$evid,$f2 = NULL)
    {
        $this->db->set('file1', $f1);

        $reg_mail=$this->get_regmail_by_membmail($mem_email,$evid);
        if(!$reg_mail){
            return 0;
        }
        $array = array('reg_email' =>$reg_mail , 'event_id' => $evid);
        $this->db->where($array);
        $ret=$this->db->update('registration');
        if($f2!== NULL)
        {
            $this->db->set('file2', $f2);
            $this->db->where($array);
            $ret= $this->db->update('registration');
        }
        return $ret;
    }
    public function get_regmail_by_membmail($email,$eid)
    {
        $this->db->select ( 'reg_email' );
        $this->db->from ( 'registration' );
        $array = array('member_email' =>$email , 'event_id' => $eid);

        $this->db->where ( $array );
        $query = $this->db->get ();
        if($query->num_rows()>0){
            return $query->result()[0]->reg_email;

        }else{
            return false;
        }
    }

    public function get_schedule() {
        $query=$this->db->query("select e.title, t.label, t.start_time, e.venue from events e, time t where e.event_id=t.event_id order by t.start_time");
        return json_encode($query->result());
    }

}
?>
