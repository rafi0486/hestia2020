<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
	 function __construct() {
        parent::__construct();
		$this->load->library('google');
		$this->load->model('user_model');
    }

	public function index(){
		redirect(base_url());
	}

	public function login(){
		$data['google_login_url']=$this->google->loginURL();
		$this->load->view('pages/home',$data);
	}

	public function oauth2callback(){
                $test=$this->google->getAuthenticate();
                //var_dump($test);
		$google_data=$this->google->getUserInfo();
		$session_data=array(
			'name'=>$google_data['name'],
			'email'=>$google_data['email'],
			'source'=>'google',
			'profile_pic'=>$google_data['picture'],
			'link'=>$google_data['id'],
			'sess_logged_in'=>1
		);
                //var_dump($google_data);
		$this->session->set_userdata($session_data);
		redirect(base_url().'profile/complete');
	}

	public function logout(){
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array(
			'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
}
