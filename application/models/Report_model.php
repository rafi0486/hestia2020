<?php
class Report_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function login(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('username',$username);

        $query=$this->db->get('login_users');
        //$num_rows=$this->db->count_all_results('userlogin');
        $num_rows=$query->num_rows();

        if($num_rows == 1)
        {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                $data = array(
                    'lid' => $row->lid,
                    'username' => $row->username,
                    'loginname' => $row->name,
                    'user_type' => $row->user_type,                    
                    'validated' => true
                );
                $this->session->set_userdata($data);
                return true;
            } else {
                return false;
            }

            return true;

        }
        return false;
    }

    public function get_events($id){
        $this->db->select ( '*' );
        $this->db->from ( 'events' );
        $this->db->join ( 'categories', 'categories.cat_id = events.cat_id' , 'inner' );
        if( $id != NULL ){
            $this->db->where ( 'categories.cat_name',$id);
        }
        $query = $this->db->get ();
        return $query->result();
    }
    public function get_events_detail($id){
        $this->db->select ( '*' );
        $this->db->from ( 'events' );
        $this->db->join ( 'categories', 'categories.cat_id = events.cat_id' , 'inner' );
        if( $id != NULL ){
            $this->db->where ( 'categories.cat_name',$id);
        }
        $query = $this->db->get ();
        $data=$query->result();
        $newdata= array();
        $today = date('Y-m-d');
        foreach ($data as $row){
            $row->schedule=$this->get_event_schedule($row->event_id);
            $eid=$row->event_id;
            $isbooked=$this->get_book_status($eid);    
            $row->parent=$this->get_event_cat_details($eid)->cat_name;

            $startdate=date('Y-m-d', strtotime($row->reg_start));
            $enddate = date('Y-m-d', strtotime($row->reg_end));
            $cnt=$this->get_event_reg_count($eid);
            $reg_fee=$row->reg_fee;
            $reg_end = '';
            $resulthtml="";
            $results=$this->get_event_status_result($eid);
            $btn = "";
            if(count($results)>0){
                $btn="<a href='#' class='btn btn-success btn-result'>Result &nbsp;<i class='fas fa-trophy'></i></a>";
                $resulthtml="<table class='table table-striped'>";
                foreach ($results as $rowresult){
                    $resulthtml=$resulthtml."<tr><td>".$rowresult['label']."</td><td>".$rowresult['fullname']."</td><td>".$rowresult['college']."</td></tr>";
                }
                $resulthtml=$resulthtml."</table>";

            }else{
                if($reg_fee !== NULL){
                    if($isbooked>=1) {
                        $btn="<a href='#' id='".$eid."' class='btn btn-warning btn-custom disabled'>Booked &nbsp;<i class='fas fa-ticket-alt'></i></a>";
                    } else {
                        if (($today >= $startdate) && ($today <= $enddate)){

                            if($cnt<$row->seats || $row->seats == 0){
                                $btn="<a href='#'  id='".$eid."' class='btn btn-custom btn-primary'>BUY TICKET&nbsp;<i class='fas fa-shopping-cart'></i></a>";
                                $reg_end = date('d-m-Y', strtotime($row->reg_end));
                            }else{
                                $btn="<a href='#'  id='".$eid."' class='btn btn-custom btn-danger disabled'>Sold Out&nbsp;<i class='fas fa-shopping-cart'></i></a>";
                            }
                        }else{
                            if(($startdate  > $today)){
                                $dtstart = date_create($startdate);
                                $btn="<a href='#'  id='".$eid."' class='btn btn-warning btn-custom disabled'>Registration Starts on ".date_format($dtstart, 'd-m-Y')."&nbsp;<i class='fas fa-clock'></i></a>";

                            }
                            if(($today > $enddate)){
                                $btn="<a href='#'  id='".$eid."' class='btn btn-danger btn-custom disabled'>Registration Closed&nbsp;<i class='fas fa-shopping-cart'></i></a>";

                            }
                        }
                    }
                }else{

                }

            }

            //$data['islogged']=false; //#TODO
            $row->result=$resulthtml;
            $row->certificate="";
            $row->btn=$btn;
            $row->reg_end=$reg_end;
            array_push($newdata,$row);           
        }
        return $newdata;
    }
    public function get_events_available($id){
        $sql="SELECT e.* FROM events e left join (select event_id as reg_eid,count(*) as cur_cnt from registration group by event_id ) r on e.event_id=r.reg_eid where ifnull(r.cur_cnt,0)<e.seats and e.cat_id in(select cat_id from categories where cat_name='".$id."')";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_categories(){
        $this->db->select ( '*' );
        $this->db->from ( 'categories');
        $query = $this->db->get ();
        return $query->result();
    }
    public function get_categorieslike($catname){
        $sql="SELECT * from categories where cat_name like '".$catname."%'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_regmail_by_membmail($email,$eid)
    {
        $this->db->select ( 'reg_email' );
        $this->db->from ( 'registration' );
        $array = array('member_email' =>$email , 'event_id' => $eid); 

      $this->db->where ( $array );
      $query = $this->db->get ();

     return $query->result()[0]->reg_email;
    }

    public function check_files_submit($eid)
    {
        $this->db->select ( 'file1,file2' );
        $this->db->from ( 'registration' );
        $array = array('member_email' =>$_SESSION['email'] , 'event_id' => $eid);
        $this->db->where ( $array );
        $query = $this->db->get ();
        $f1=$query->result()[0]->file1;
        $f2=$query->result()[0]->file2;
        if($this->check_files_lastdate($eid) && $f1==NULL && $f2==NULL)
            return true;
        else
            return false;
    }

    public  function check_files_lastdate($eid)
    {
        $this->db->select ( 'file_last_date' );
        $this->db->from ( 'events' );
        $array = array( 'event_id' => $eid); 
        $this->db->where ( $array );
        $query = $this->db->get ();
        if($query->result()[0]->file_last_date===NULL){

            return true;
        }
        $fld=$query->result()[0]->file_last_date;
        $now = time();
        $target = strtotime($fld. "+1 days -5 hours -30 minutes");
        $diff = $now - $target;
        return $diff <= 0;
    }
    public function get_single_event_spot($eid){
        $this->db->select ( '*' );
        $this->db->from ( 'events' );

        if( $eid != NULL ){
            $this->db->where ('event_id',$eid);
            $query = $this->db->get ();
            return $query->row();
        }


    }
    public function GetEventCurrentStatus_Spot($eid){
        $event=$this->get_single_event_spot($eid);
        $eid=$event->event_id;
        $today = date('Y-m-d');
        $startdate=date('Y-m-d', strtotime($event->reg_start));
        $enddate = date('Y-m-d', strtotime($event->reg_end));
        $this->load->model('report_model');
        $cnt=$this->report_model->get_event_reg_count($eid);





            if($cnt<$event->seats || $event->seats == 0){
                // available
                return true;
            }else{
                //Sold Out
                return 'sold';
            }


    }
    public function set_file_urls($f1,$evid,$f2 = NULL)
    {
        $this->db->set('file1', $f1);
        $reg_mail=$this->get_regmail_by_membmail($_SESSION['email'],$evid);
    
        $array = array('reg_email' =>$reg_mail , 'event_id' => $evid); 
        $this->db->where($array);
        $this->db->update('registration');
        if($f2!== NULL)
        {
            $this->db->set('file2', $f2);
            $this->db->where($array);
            $this->db->update('registration');
        }
    }

    public function get_eid_by_link($link)
    {
        $data['event']=$this->report_model->get_single_event($link);
        return $data['event']->event_id;
    }
    
    public function get_user_events($email=''){
        $this->db->select ( 'e.*,r.file1 as u_file1, r.file2 as u_file2,e.is_certificate_pub' );
        $this->db->from ( 'events as e' );
        $this->db->join ( 'registration  as r', 'r.event_id = e.event_id' , 'inner' );
      $this->db->where ( 'r.member_email',$email);
      $this->db->where ( 'e.event_id!=',"112");

        $query = $this->db->get ();
        $data = array();
        foreach($query->result() as $row1)
        {
                $row = array();
                $row['file1'] = $row1->file1;
                $row['event_id'] = $row1->event_id;
                $row['u_file1']=$row1->u_file1;
                $row['title'] = $row1->title;
                $row['venue'] = $row1->venue;
                $row['link'] = $row1->link;
                $row['file2'] = $row1->file2;
                $row['u_file2'] = $row1->u_file2;
                $row['file_last_date'] = $row1->file_last_date;
            $results=$this->get_event_status_result($row1->event_id);
                if(count($results)>0){
                    $row['result'] =true;
                    $resulthtml="<table class='table table-striped'>";
                    foreach ($results as $rowresult){
                        $resulthtml=$resulthtml."<tr><td>".$rowresult['label']."</td><td>".$rowresult['fullname']."</td><td>".$rowresult['college']."</td></tr>";
                    }
                    $resulthtml=$resulthtml."</table>";
                    $row['resulthtml']=$resulthtml;

                }else{
                    $row['result'] =false;

                }
                if($row1->is_certificate_pub==1 ){

                    $row['certificate']=$this->get_event_status_cert($row1->event_id,$email);

                }else{
                    $row['certificate']=-2;

                }


                $query_time=$this->db->query("SELECT * FROM time where event_id=".$row1->event_id."  order by start_time");
                $row['time']=$query_time->result_array();
                $data[] = $row;
        }

        return  $data;
    }
    public function get_reguser_events($email){
        $query=$this->db->query("select e.event_id, e.title from events e, registration r where e.event_id=r.event_id and r.member_email='".$email."'");
        return  json_encode($query->result());
    }

    public function get_all_registrations_certificate($mail="",$eid=""){
       if($mail!="" && $eid!=""){
           $query=$this->db->query("select upper(e.event_id) event_id, upper(e.title) title ,upper(u.fullname) fullname ,r.reg_id,upper(u.college) college from events e, registration r,users u where e.event_id=r.event_id and r.member_email=u.email and u.email='".$mail."' and u.profile_completed=1 and r.participated=1 and  r.event_id=".$eid);
           return  $query->result();
       }

    }
    public function get_single_certificate($certificateno){
        $certificateno = $this->security->xss_clean($certificateno);
        $query=$this->db->query("select e.event_id, e.title ,u.fullname,u.college ,r.reg_id from events e, registration r,users u where e.event_id=r.event_id and r.member_email=u.email and r.reg_id='".$certificateno."'");
        return  $query->row();
    }
    public function get_reguser_events_status($email,$eid){
        $query=$this->db->query("select e.event_id, e.title from events e, registration r where e.event_id=r.event_id and r.member_email='".$email."' and e.event_id=".$eid);
        return  $query->num_rows();
    }

    public function get_event_schedule($eid) {
        $this->db->select('*');
        $this->db->from('time');
        $this->db->order_by('start_time');
        $this->db->where('event_id', $eid);
        $query=$this->db->get();
        return $query->result();
    }

    public function get_single_event($link){
        $this->db->select ( '*' );
        $this->db->from ( 'events' );

        if( $link != NULL ){
            $this->db->where ('link',$link);
        }
        $query = $this->db->get ();
        return $query->row();
    }
    public function get_event_fee_amount($eid,$cnt){
        $resultfee=$this->db->query("SELECT fee_type ,reg_fee from events where event_id=".$eid);
        $fee_type= $resultfee->row()->fee_type;
        if($fee_type=='head')
        {
            $registrants_amnt=$cnt*$resultfee->row()->reg_fee;
        }//session for pay.php
        elseif ($fee_type=='team') {
            {
                $registrants_amnt=$resultfee->row()->reg_fee;
            }//session for pay.php
        }
        return $registrants_amnt;
    }
    public function get_event_cat_details($id){
        $this->db->select ( 'categories.*' );
        $this->db->from ( 'events' );
        $this->db->join ( 'categories', 'categories.cat_id = events.cat_id' , 'inner' );
        if( $id != NULL ){
            $this->db->where ( 'events.event_id',$id);
        }
        $query = $this->db->get ();
        return $query->row();
    }

    public function get_event_reg_count($eid){
        $cnt=$this->db->query("SELECT count(distinct reg_email) as Cnt from registration where event_id=".$eid);
        return $cnt->row()->Cnt;
    }

    public function get_team_size($eid){
        $cnt=$this->db->query("SELECT min_memb,max_memb from events where event_id=".$eid);
        return $cnt->row();
    }
    
    public function get_user_accomodations($email){
        $cnt=$this->db->query("SELECT accommodation from users where email='".$email."'");
        if($cnt->num_rows()==1){
            return $cnt->row()->accommodation;

        }else{
            return 0;

        }
    }
    public function get_user_info($email){
        $cnt=$this->db->query("SELECT * from users where email='".$email."'");
        return $cnt->row();
    }
    public function get_book_status($eid){
        if(!isset($_SESSION['email']))return 0;
        $cnt=$this->db->query("SELECT count(*) As Cnt from registration where member_email='".$_SESSION['email']."' and event_id=".$eid);
        return $cnt->row()->Cnt;
    }
    public function get_event_status_result($eid,$typ=""){

        $cnt=$this->db->query("SELECT * from result r left join users u on r.email=u.email where event_id=".$eid);
       if ($typ=="AR"){
           return $cnt->result();
       }
        return $cnt->result_array();
    }
    public function get_event_status_cert($eid,$mail=""){
        //$cnt=$this->db->query("SELECT * from result r, users u where r.email=u.email and  event_id=".$eid." and u.email='".$mail."' ");
        $cnt=$this->db->query("SELECT * from result r, registration s where s.event_id=r.event_id and r.email=s.reg_email and r.event_id=$eid and s.member_email='$mail'");
        if($cnt->num_rows()>=1){
            return -1;
        }else{
            $iscomplete=$this->db->query("SELECT * from users u where u.email='$mail' and profile_completed=0");
            if($iscomplete->num_rows()==1){
                return 0;
            }else{
                $ispart=$this->db->query("SELECT * from registration where event_id='$eid' and member_email='$mail' and participated=1");
                if($ispart->num_rows()==1){
                    return 1;
                }else {
                    return -2;
                }
            }

        }


        return $cnt->num_rows();
    }
    public function insert_reg_spot_temp($data){
            return $this->db->insert('registration',$data);
    }

    public function get_sponsors($s_type){

          $query = $this->db->get_where('sponsors',array('s_type' => $s_type));
          return $query->result_array();
      }
}
?>
