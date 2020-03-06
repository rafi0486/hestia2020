<?php
echo "Error";exit;
class AddUser extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('add_model');
    }

    public function add_user(){
      $users=$this->add_model->get_user();
      foreach ($users as $row ) {
        $data['phone_no'] = $row['phone'];
        $data['username'] = $row['email'];
        $data['name'] = $row['name'];
        $data['user_type'] = "CS";
        $phone = substr($row['phone'], -3);
        $user = strstr($row['email'], '@', true);
        $passwd = $phone.$user."#$";
        $data['password']=password_hash($passwd, PASSWORD_BCRYPT);
        if($this->add_model->is_available($row['email'])!=TRUE){
          $this->add_model->add_single_user($data);
        }else{
          echo "Duplicate<br>";
        }
      }
    }
    public function send_email(){
      require("./payment/mail//sendgrid-php/vendor/autoload.php");
      $users=$this->add_model->get_user_mail();
      foreach ($users as $row ) {
        $phone = substr($row['phone_no'], -3);
        $user = strstr($row['username'], '@', true);
        $passwd = $phone.$user."#$";
      $message = 	"<html><head><title>Login credentials - Spot Registration</title>
                          </head>
                          <body>
                            <h2>Login credentials - Spot Registration</h2>
                            <p>Your account details: </p>
                            <p>Link : https://www.hestia.live/Login </p>
                            <p>Username: ".$row['username']."</p>
                            <p>Password: ".$passwd."</p>
                            <p>!!!!! Do not share your credentials !!!!!</p>
                          </body>
                          </html>
                          ";
                      // echo $message;exit;
                      $email = new \SendGrid\Mail\Mail();
                      $email->setFrom("webadmin@hestia.live", "Web Team - Hestia20");
                      $email->setSubject("Login credentials - Spot Registration");
                      $email->addTo($row['username'],$row['name']);
                      $email->addContent(
                        "text/html", $message
                      );
                      $sendgrid = new \SendGrid('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');

                      try {
                          $response = $sendgrid->send($email);
                          $status = $response->statusCode();
                          print $response->statusCode() . "\n";
                         // print_r($response->headers());
                         // print $response->body() . "\n";
                      } catch (Exception $e) {
                          echo 'Caught exception: ',  $e->getMessage(), "\n";
                      }

            }

    }

}
