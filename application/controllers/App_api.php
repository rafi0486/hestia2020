<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_Api extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('appapi_Model');
    }
    function LoginCheck(){
        $login_details = $this->appapi_Model->login_check();
        $this->response($login_details);
    }

    function InsertNewUser(){
        $this->load->model('user_model');
        if($this->user_model->is_registered($this->input->post('email'),"N")==FALSE){
            echo $this->appapi_Model->insert_user_details("N");
             //send email
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://www.hestia.live/payment/mail/usermail.php?email='.$this->input->post('email').'',
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0"
            ]);
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            //echo $resp;
            // Close request to clear up some resources
            curl_close($curl);
        }else{
            echo $this->appapi_Model->insert_user_details("Y");
        }

    }

    function UpdateFilesInReg(){
        $ret=$this->appapi_Model->set_file_urls($this->input->post('email'),$this->input->post('file1'),$this->input->post('event_id'),$this->input->post('file2'));
        if($ret){
            echo "true";
        }else{
            echo "false";
        }

    }

    function GetUserEventsList(){
        echo $this->appapi_Model->get_reg_events();
    }

    function GetEventDetails(){
        echo $this->appapi_Model->get_event_details();
    }

    function getSchedule() {
        echo $this->appapi_Model->get_schedule();
    }


}