<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    public function index()
    {

        if($this->session->userdata('user_type')=="D") {
            redirect('DocAdmin/home');
        }elseif($this->session->userdata('user_type')=="S" || $this->session->userdata('user_type')=="CS" ||  $this->session->userdata('user_type')=="J" ) {
            redirect('Spot/home');
        }

        $this->load->view('login');
    }

    public function process() {
        // Load the model
$this->load->model('report_model');
        $result = $this->report_model->login();

        if(! $result){
            // If user did not validate, then show them login page again
            $msg = 'Invalid username and/or password.';
            $data['msg'] = $msg;
            $this->load->view('login', $data);
        }
        else {
            if($this->session->userdata('user_type')=="D") {
            redirect('DocAdmin/home');
          }elseif($this->session->userdata('user_type')=="S" || $this->session->userdata('user_type')=="CS" || $this->session->userdata('user_type')=="J") {
                redirect('Spot/home');
            }

        }


    }
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');

        $this->load->view('login');
    }
}
