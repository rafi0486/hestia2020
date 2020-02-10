<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Mapp_api extends REST_Controller {
	 function __construct() {
        parent::__construct();
			$this->load->model('appapi_Model');
    }

		function login_post(){
			$r = $this->appapi_Model->login_check($this->post('email'));
			$this->response($r);

		}
		function currenteventstatus_get($eid, $email=NULL){
			$r = $this->appapi_Model->GetEventCurrentStatus($eid, $email);
			$this->response($r);

		}
		function event_schedule_get($eid) {
			$this->load->model('Report_model');
			$s = $this->Report_model->get_event_schedule($eid);
			$this->response($s);
		}
		function member_info_full_post() {

			$s = $this->appapi_Model->get_user_full_info($this->post('hash'));
			$this->response($s);
		}
		function event_count_get($cat_name=NULL) {
	      if($cat_name!=NULL){
             $s = $this->appapi_Model->get_event_count($cat_name);
             $this->response($s);
         }
		}
		function event_result_get($cat_name=NULL) {
	      if($cat_name!=NULL){
						$this->load->model('report_model');
             $s = $this->report_model->get_event_status_result($cat_name,"AR");
             $this->response($s);
         }
		}
		function ha_sh_post() {
			$email = $this->post('email');
			$this->load->model('User_model');
         $s = $this->User_model->get_us_rh_sh($email);
         $this->response($s);
		}
	
}
