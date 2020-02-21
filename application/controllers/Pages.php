<?php
class Pages extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->library('Google');
        $this->load->model('user_model');
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];


        if(isset($_SESSION['name']) && $this->user_model->is_registered($_SESSION['email'],"Y")==FALSE){
            $_SESSION['back_url']=$link;

            //redirect("Profile/complete");
        }
    }
    function index(){
        $data['google_login_url']=$this->google->loginURL();
        $this->load->view('static/home',$data);
    }
    function main_events(){
        $data['google_login_url']=$this->google->loginURL();
        $data['technical']=$this->report_model->get_categorieslike("technical");
        $data['cultural']=$this->report_model->get_categorieslike("cultural");
        $data['workshops']=$this->report_model->get_categorieseventlike("workshops");
        $data['general']=$this->report_model->get_categorieseventlike("general");
        $data['lectures']=$this->report_model->get_categorieseventlike("lectures");


        $this->load->view('static/main_events',$data);
    }

    function workshops(){
      // $num = $this->db->query('SELECT * FROM registration WHERE event_id=2');
      // $data['remaining'] = $num->num_rows();
      $data['google_login_url']=$this->google->loginURL();
      $data['events']=$this->report_model->get_events_detail('workshops');
      $data['title']= 'Workshops';
      $this->load->view('static/workshops',$data);
    }

    function view($page){

        if ( ! file_exists(APPPATH.'views/static/'.$page.'.php')){
            show_404();
        }
        $data['google_login_url']=$this->google->loginURL();
        $this->load->view('static/'.$page,$data);
    }
    function Test($cat){
        $cat_name=$this->security->xss_clean($cat);
        $data['title']=ucfirst($cat_name);
        $data['google_login_url']=$this->google->loginURL();
        //$data['title']=$this->report_model->get_events_detail($cat_name);
        $data['events']=$this->report_model->get_events_detail($cat_name);
        $this->load->view('static/user_event',$data);
    }
    function Event($cat){
        $cat_name=$this->security->xss_clean($cat);
        $data['title']=ucfirst($cat_name);
        $data['google_login_url']=$this->google->loginURL();
        //$data['title']=$this->report_model->get_events_detail($cat_name);
        $data['events']=$this->report_model->get_events_detail($cat_name);
        $this->load->view('static/event_listing',$data);
    }
    function UserEvents(){

    if(isset($_SESSION['email'])){
      //htodo  $data['myevents']=$this->report_model->get_user_events($_SESSION['email']);
        $data['myevents']=$this->report_model->get_user_events($_SESSION['email']);

    }else{
                // set the expiration date to one hour ago
                setcookie("redir", "myevents", time() + 3600);
               $data['google_login_url']=$this->google->loginURL();
header('Location: '.$data['google_login_url']);
       exit('');//htodo

    }

        $data['certificate']="";
        $this->load->view('static/user_event',$data);
    // $this->load->view('static/user_events',$data);

    // var_dump($data);//htodo
    // $data['myevents']=[$row];
    }

    function BookTicket(){
      echo $this->input->post('event_id');
      echo $this->input->post('txt_emails');



    }
    function url_submitted(){
        $f1= $this->input->post('f1');
        $f2= $this->input->post('f2');
        $elink= $this->input->post('link');

        $f1=$this->security->xss_clean($f1);
        $f2=$this->security->xss_clean($f2);
        $elink=$this->security->xss_clean($elink);

        //$data['event']=$this->report_model->get_single_event($elink);
        $eid=$this->report_model->get_eid_by_link($elink);
        if($this->report_model->check_files_submit($eid))
        {
            if(strlen($f2)!=0)
            {
                $this->report_model->set_file_urls($f1,$eid,$f2);
            }
            else{
                $this->report_model->set_file_urls($f1,$eid);
            }
        }
        else
        {
            exit("File links cant be uploaded");
        }


        redirect(base_url()."myevents");

      }
    function SingleEvent($elink){
        $elink1=$this->security->xss_clean($elink);
       $data['event']=$this->report_model->get_single_event($elink1);
       $data['google_login_url']=$this->google->loginURL();
        if($data['event']==""){
            show_404();
            return;
        }



        $data['schedule']=$this->report_model->get_event_schedule($eid);

        $eid=$data['event']->event_id;
        $isbooked=$this->report_model->get_book_status($eid);
        $data['parent']=$this->report_model->get_event_cat_details($eid)->cat_name;
        $today = date('Y-m-d');
        $startdate=date('Y-m-d', strtotime($data['event']->reg_start));
        $enddate = date('Y-m-d', strtotime($data['event']->reg_end));
        $cnt=$this->report_model->get_event_reg_count($eid);
        $reg_fee=$data['event']->reg_fee;
        $reg_end = '';
        $resulthtml="";
        $results=$this->report_model->get_event_status_result($eid);
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
                    $btn="<a href='#' class='btn btn-warning btn-custom disabled'>Booked &nbsp;<i class='fas fa-ticket-alt'></i></a>";
                } else {
                    if (($today >= $startdate) && ($today <= $enddate)){

                        if($cnt<$data['event']->seats || $data['event']->seats == 0){
                            $btn="<a href='#' class='btn btn-custom btn-primary'>BUY TICKET&nbsp;<i class='fas fa-shopping-cart'></i></a>";
                            $reg_end = date('d-m-Y', strtotime($data['event']->reg_end));
                        }else{
                            $btn="<a href='#' class='btn btn-custom btn-danger disabled'>Sold Out&nbsp;<i class='fas fa-shopping-cart'></i></a>";
                        }
                    }else{
                        if(($startdate  > $today)){
                            $dtstart = date_create($startdate);
                            $btn="<a href='#' class='btn btn-warning btn-custom disabled'>Registration Starts on ".date_format($dtstart, 'd-m-Y')."&nbsp;<i class='fas fa-clock'></i></a>";

                        }
                        if(($today > $enddate)){
                            $btn="<a href='#' class='btn btn-danger btn-custom disabled'>Registration Closed&nbsp;<i class='fas fa-shopping-cart'></i></a>";

                        }
                    }
                }
            }else{

            }

        }

        //$data['islogged']=false; //#TODO
        $data['result']=$resulthtml;
        $data['certificate']="";
       $data['btn']=$btn;
       $data['reg_end']=$reg_end;

        $this->load->view('static/single_event',$data);
    }
    function ProcessUserRequest($eid){
        $islogged=false;
        if(isset($_SESSION['email'])){
            $islogged=true;
        }

        if($islogged==true){
                $team_size=$this->report_model->get_team_size($eid);

                if($team_size->min_memb==1  && $team_size->max_memb==1){
                    $acc=$this->report_model->get_user_accomodations($_SESSION['email']);
                    echo '[200,"Success","'.$acc.'"]';
                }else{
                    echo "[201,$team_size->min_memb,$team_size->max_memb]";
                }


        }else{
            echo '[505,"Login Required","Please Login to continue"]';
        }

    }


    function ProcessBooking(){
        echo $this->input->post('json_data');
    }

//    public function view($page = 'home'){
//        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
//            // Whoops, we don't have a page for that!
//            show_404();
//        }
//        $data['google_login_url']=$this->google->get_login_url();
//        $data['title'] = ucfirst($page); // Capitalize the first letter
//        $db = $this->load->database();
//        $this->load->view('templates/header', $data);
//        $this->load->view('pages/'.$page, $data);
//        $this->load->view('templates/footer', $data);
//    }
}
