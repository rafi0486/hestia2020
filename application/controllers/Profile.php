<?php
class Profile extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('user_model');
		        $this->load->library('Google');
    }


    public function update(){
        
        if(isset($_SESSION['email'])){
      //htodo  $data['myevents']=$this->report_model->get_user_events($_SESSION['email']);
        $data['title'] = ucfirst('Update Profile');
        $data['userinfo']=$this->user_model->get_user_single($this->session->email);
       if($data['userinfo']['profile_completed']==0){
           $this->load->view('dashboard/updateprofile',$data);
       }else{
           redirect(base_url());
       }

        //$data['userinfo']=$this->user_model->get_user_single($this->session->email);


    }else{
                // set the expiration date to one hour ago
                setcookie("redir", "myprofile", time() + 3600);
               $data['google_login_url']=$this->google->get_login_url();
header('Location: '.$data['google_login_url']);
       exit('');//htodo
//        if($this->user_model->is_registered($this->session->email,"Y") == TRUE OR $this->session->email == NULL) {
//            redirect(base_url());
//        }
        

    }
    }

    public function complete(){
        if($this->user_model->is_registered($this->session->email,"Y") == TRUE OR $this->session->email == NULL) {
            redirect(base_url());
        }
        $data['title'] = ucfirst('Complete Profile');
        $this->load->view('dashboard/complete',$data);
        if( $this->input->post('college') != NULL && $this->input->post('phone') != NULL ){
            $user['college'] = $this->input->post('college');
            $user['phone'] = $this->input->post('phone');
            $this->user_model->complete_signin($user);
            if(isset($_SESSION['back_url']) && strpos($_SESSION['back_url'], 'ico') == false){
                $link=$_SESSION['back_url'];
                unset($_SESSION['back_url']);
                redirect($link);
            }else{
                redirect(base_url("myevents"));
            }
            
        }
    }
    public function updateprofile(){


        if( $this->input->post('college') != NULL && $this->input->post('phone') != NULL ){
            $user['college'] = $this->input->post('college');
            $user['phone'] = $this->input->post('phone');
            $user['fullname'] = $this->input->post('fullname');
            $user['profile_completed'] = 1;
            if($this->input->post('acc')){
                $acc=substr(implode('', $this->input->post('acc')), 0);
                $user['accommodation'] = $acc;
            }


             $this->user_model->update_profile($this->session->email,$user);

            redirect(base_url());


        }
    }
}