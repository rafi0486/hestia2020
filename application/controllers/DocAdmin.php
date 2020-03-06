<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocAdmin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('docadmin_model');

        if(!$this->session->userdata('username') || $this->session->userdata('user_type')!="D") {
            redirect('Login');
        }


    }
    public function home()
    {
        $data['categories']=$this->report_model->get_categories();
        $data['allevents']=$this->report_model->get_events(NULL);

        $this->load->view('doc_events_manage',$data);
    }
    public function edit($eid)
    {
        if(!$eid){
            return;
        }
        $data['edetails']=$this->report_model->get_eventsbyId($eid);
        $data['categories']=$this->report_model->get_categories();
        $data['allevents']=$this->report_model->get_events(NULL);

        $this->load->view('doc_events_edit',$data);
    }

    public function results()
    {
      $data['winners'] = $this->docadmin_model->get_winners(2);        
        $data['allevents']=$this->report_model->get_events(NULL);
        $this->load->view('doc_admin_result',$data);
    }
    public function result($eid)
    {
        if(!$eid){
          return;
        }
        $data['winners'] = $this->docadmin_model->get_winners($eid);
        $data['allevents']=$this->report_model->get_events(NULL);
        $this->load->view('doc_admin_result',$data);
    }

    public function SaveEvent(){
        if($this->docadmin_model->saveEvent()){
            redirect("DocAdmin/home");
        }
    }

  public function UpdateEvent(){
        if($this->docadmin_model->updateEvent()){
            redirect("DocAdmin/home");
        }
    }

    public function event_current_status_get($eid){

        echo $this->report_model->GetEventCurrentStatus_Spot($eid);
    }
    public function get_events_list($cat_id){
        echo json_encode($this->report_model->get_events($cat_id));

    }
    public function get_reg_user_info($email,$eid=NULL){
        if($eid!=NULL){
            if($this->report_model->get_reguser_events_status($email,$eid)>0){
                echo "none";
            }else{
                echo json_encode($this->report_model->get_user_info($email));

            }
        }else{
            echo json_encode($this->report_model->get_user_info($email));
        }

    }
    public function get_reg_user_events($email){
        echo $this->report_model->get_reguser_events($email);

    }
    function ProcessUserRequest($eid){
        $islogged=false;


        $team_size=$this->report_model->get_team_size($eid);

        if($team_size->min_memb==1  && $team_size->max_memb==1){
            echo "[201,$team_size->min_memb,$team_size->max_memb]";
        }else{
            echo "[201,$team_size->min_memb,$team_size->max_memb]";
        }




    }
    function insert_spot_reg()
    {
        $jsondata=json_decode($this->input->post('json_data1'));
        $members=$jsondata->emails;
        $this->load->model('user_model');
        $totalacc=0;
        $retcntr=0;

        foreach ($members as $row){

            $data=array();
            $data['fullname']=$row->fullname;
            $data['phone']=$row->phone;
            $data['college']=$row->college;
            if($row->acc=="Y"){

                $data['accommodation']=$jsondata->accommodation_days;
                //  $data_reg['acc']=$jsondata->accommodation_days;
                $splitted_in = str_split($jsondata->accommodation_days);
                $current_mem_acc=count($splitted_in);
                if($this->report_model->get_user_accomodations($row->email)){
                    $current_acc=$this->report_model->get_user_accomodations($row->email);

                }else{
                    $current_acc=0;
                }
                $current_acc_split = str_split($current_acc);
                foreach ($splitted_in as $single_day_in){
                    if (in_array($single_day_in, $current_acc_split))
                    {
                        $current_mem_acc--;
                    }
                }
                $totalacc=$totalacc+$current_mem_acc;
            }else{
                $data['accommodation']=NULL;
            }
            $data_reg['event_id']=$jsondata->event_id;
            $data_reg['reg_email']=$jsondata->reg_email;
            $data_reg['member_email']=$row->email;
            if($data_reg['member_email']==$data_reg['reg_email']){
                $data_reg['fee_amnt']=$this->input->post('fee_hid');

            }else{
                $data_reg['fee_amnt']=NULL;
            }
            if($this->user_model->is_registered($row->email,"N")){
                $this->user_model->modify_w($row->email,$data);
            }else{
                $data['email']=$row->email;
                $data['hashcode'] =password_hash($data['email'],PASSWORD_BCRYPT);
                $this->user_model->create($data);
                //insert
            }
            $data_reg['referral_code']=$jsondata->referral_code;
            $alreadyregistered=0;
            if($this->report_model->get_reguser_events_status($data_reg['member_email'],$data_reg['event_id'])==0) {
                $tempret=$this->report_model->insert_reg_spot_temp($data_reg);

                $retcntr=$retcntr+$tempret;

            }else{
                $alreadyregistered++;
            }



        }
        $backurl=base_url("Spot/home");
        if($retcntr>0 && $alreadyregistered==0){

            echo '<meta http-equiv="refresh" content="2;url='.$backurl.'" /><center><h1 style="color:green;"><br><br>'.$retcntr.' Nos. Successfully Registered. <br></h1></center>';


        }elseif($alreadyregistered>0){
            echo '<meta http-equiv="refresh" content="3;url='.$backurl.'" /><center><h1 style="color:red;"><br><br>'.$retcntr.' Nos. Successfully Registered.  <br> '.$alreadyregistered.' Nos. already registered for the same event.</h1></center>';

        }
        else{

            echo '<meta http-equiv="refresh" content="2;url='.$backurl.'" /><center><h1 style="color:red;"><br><br>Error Occurred <br></h1></center>';
        }

    }


    function get_spot_fee_total()
    {
        $jsondata=json_decode($this->input->post('json_data'));
        $members=$jsondata->emails;


        $this->load->model('user_model');
        $totalacc=0;
        foreach ($members as $row){
            $data=array();
            $data['fullname']=$row->fullname;
            $data['phone']=$row->phone;
            $data['college']=$row->college;
            if($row->acc=="Y" && $jsondata->accommodation_days!=""){
                $data['accommodation']=$jsondata->accommodation_days;
                $data_reg['acc']=$jsondata->accommodation_days;


                $splitted_in = str_split($data_reg['acc']);
                $current_mem_acc=count($splitted_in);
                if($this->report_model->get_user_accomodations($row->email)){
                    $current_acc=$this->report_model->get_user_accomodations($row->email);

                }else{
                    $current_acc=0;
                }
                $current_acc_split = str_split($current_acc);
                foreach ($splitted_in as $single_day_in){
                    if (in_array($single_day_in, $current_acc_split))
                    {
                        $current_mem_acc--;
                    }

                }
                $totalacc=$totalacc+$current_mem_acc;
                $data_reg['reg_key']=$row->email.microtime(true);
                $_SESSION['reg_key']=$data_reg['reg_key'];
                $data_reg['event_id']=$jsondata->event_id;
                $data_reg['reg_email']=$jsondata->reg_email;
                $data_reg['member_email']=$row->email;
                $data_reg['member_email']=$row->email;
                $data_reg['referral_code']=$jsondata->referral_code;
                //$this->report_model->insert_reg_spot_temp($data_reg);
            }else{
                $data['accommodation']=NULL;
            }

            if($this->user_model->is_registered($row->email,"N")){
                //$this->user_model->modify_w($row->email,$data);
            }else{
                $data['email']=$row->email;
                $data['hashcode'] =password_hash($data['email'],PASSWORD_BCRYPT);
                //$this->user_model->create($data);
                //insert
            }
        }
        $feeamoun=$this->report_model->get_event_fee_amount($jsondata->event_id,count($members));


        $data_ret['event_fee']=$feeamoun;
        $data_ret['acc_fee']=($totalacc*150);
        $data_ret['total_fee']=($totalacc*150)+$feeamoun;
        echo "<center><h1>₹ ".$data_ret['total_fee']." </h1><h5>Event Registration :   ₹ ".$data_ret['event_fee']." </h5><h5>Accommodation Charge  :   ₹ ".$data_ret['acc_fee']." </h5></center><input type='hidden' name='fee_hid' value='".$data_ret['total_fee']."'>";
    }

    public function Publish_Certificate($eid){
        $this->docadmin_model->publish_cert($eid);
        redirect('DocAdmin/Results/');
    }

}
