<?php
require(APPPATH.'libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Admin_API extends REST_Controller {

    function login_post(){
        $this->load->model('category_model');
        $this->load->model('event_model');
        $username=$this->post('username');
        $password=$this->post('password');
        $data = $this->category_model->validate($username,$password);
        if( $data == FALSE ){
            $data = $this->event_model->validate($username,$password);
        }
        $this->response($data);
    }
    function login_delete(){
        $this->session->sess_destroy();
        $this->response(true);
    }
    function status_get(){
        $data['status']='online';
        $data['version']='3.10';
        $app_ver_file = fopen(__DIR__ . '/app_version.txt', "r");
        $data['app_version']=rtrim(fgets($app_ver_file));
        fclose($app_ver_file);
        if(isset($_SESSION['username']))
            $data['username']=$_SESSION['username'];
        if(isset($_SESSION['type'])){
            if($_SESSION['type'] == 'category')
                $data['cat_id']=$_SESSION['cat_id'];
            elseif($_SESSION['type'] == 'event')
                $data['event_id']=$_SESSION['event_id'];
            else
                $data['type']=$_SESSION['type'];
        }
        $this->response($data);
    }
    function categoryevents_get($id){
        $this->load->model('event_model');
        $events = $this->event_model->get_category_events($id);
        $this->response($events);
    }
    function category_get($id = NULL){
        $this->load->model('category_model');
        $categories = $this->category_model->get_categories($id);
        $this->response($categories);
    }
    function category_post(){
        $this->load->model('category_model');
        $data['cat_name']=$this->post('cat_name');
        $data['username']=$this->post('username');
        $data['pswd']=$this->post('password');
        $status = $this->category_model->create($data);
        $this->response($data,$status);
    }
    function category_put(){
        $this->load->model('category_model');
        $id=$this->put('cat_id');
        $data['cat_name']=$this->put('cat_name');
        $data['username']=$this->put('username');
        $data['pswd']=$this->put('password');
        $status =  $this->category_model->modify($id,$data);
        $this->response($data,$status);
    }
    function category_delete( $id = NULL ){
        $this->load->model('category_model');
        $status =  $this->category_model->delete($id);
        $this->response($id,$status);
    }

    // function upload_post(){
        // $config['upload_path']          = FCPATH . 'assets\uploads\\' ;
        // $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $config['detect_mime']           = TRUE;
        // $config['file_name']           = "poster.png";
    
        // $this->load->library('upload', $config);
    
        // if ( ! $this->upload->do_upload('userfile')){
        //     $error = array('error' => $this->upload->display_errors());
        //     $this->response($error);
        // }
        // else{
        //     $data = array('upload_data' => $this->upload->data());
        //     $this->response("success");
        // }
    // }
    function event_get($id = NULL){
        $this->load->model('event_model');
        $events = $this->event_model->get_event($id);
        $this->response($events);
    }


    function event_registrations_get($id=NULL){
        $this->load->model('registration_model');
        $events_reg = $this->registration_model->get_event_registrations($id);
        $this->response($events_reg);
    }


    function event_post(){
        $this->load->model('event_model');
        $data['title']=$this->post('title');
        $data['cat_id']=$this->post('cat_id');
        $data['short_desc']=$this->post('short_desc');
        $data['details']=$this->post('details');
        $data['min_memb']=$this->post('min_memb');
        $data['max_memb']=$this->post('max_memb');
        $data['venue']=$this->post('venue');
        $data['reg_fee']=$this->post('reg_fee');
        $data['fee_type']=$this->post('fee_type');
        $data['prize']=$this->post('prize');
        $data['file1']=$this->post('file1');
        $data['file2']=$this->post('file2');
        $data['file_last_date']=$this->post('file_last_date');
        $data['co1_name']=$this->post('co1_name');
        $data['co1_no']=$this->post('co1_no');
        $data['co2_name']=$this->post('co2_name');
        $data['co2_no']=$this->post('co2_no');
        $data['seats']=$this->post('seats');
        $data['reg_start']=$this->post('reg_start');
        $data['reg_end']=$this->post('reg_end');
        $data['username']=$this->post('username');
        $data['pswd']=$this->post('password');
        $data['link']=$this->post('link');
        $status = $this->event_model->create($data);
        $this->response($data,$status);
    }
    function event_put(){
        $this->load->model('event_model');
        $id=$this->put('event_id');
        $data['title']=$this->put('title');
        $data['cat_id']=$this->put('cat_id');
        $data['short_desc']=$this->put('short_desc');
        $data['details']=$this->put('details');
        $data['min_memb']=$this->put('min_memb');
        $data['max_memb']=$this->put('max_memb');
        $data['venue']=$this->put('venue');
        $data['reg_fee']=$this->put('reg_fee');
        $data['fee_type']=$this->put('fee_type');
        $data['prize']=$this->put('prize');
        $data['file1']=$this->put('file1');
        $data['file2']=$this->put('file2');
        $data['file_last_date']=$this->put('file_last_date');
        $data['co1_name']=$this->put('co1_name');
        $data['co1_no']=$this->put('co1_no');
        $data['co2_name']=$this->put('co2_name');
        $data['co2_no']=$this->put('co2_no');
        $data['seats']=$this->put('seats');
        $data['reg_start']=$this->put('reg_start');
        $data['reg_end']=$this->put('reg_end');
        $data['username']=$this->put('username');
        $data['pswd']=$this->put('password');
        $data['link']=$this->put('link');
        $status =  $this->event_model->modify($id,$data);
        $this->response($data,$status);
    }
    function enableCert_put() {
        $this->load->model('event_model');
        $id=$this->put('event_id');
        $status = $this->event_model->enable_certificate($id);
        
        $mail = file_get_contents('https://www.hestia.live/payment/mail/eventcertmail.php?eid='.$id);
        
        $this->response($id,$status);
    }
    function participation_put() {
        $this->load->model('registration_model');
        $id=$this->put('event_id');
        $reg_email=$this->put('reg_email');
        $participation=$this->put('participation');
        $status = $this->registration_model->set_participation($id, $reg_email, $participation);
        $this->response($id,$status);
    }
    function event_delete( $id = NULL ){
        $this->load->model('event_model');
        $status =  $this->event_model->delete($id);
        $this->response($id,$status);
    }

    function accommodation_get() {
        $this->load->model('user_model');
        $this->response($this->user_model->get_accommodations());
    }
}
