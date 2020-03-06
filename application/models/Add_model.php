<?php
// echo "Error";exit;
class Add_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function get_user(){
      $query = $this->db->get('users_2');
      return $query->result_array();
    }

    public function add_single_user($data){
      $this->db->insert('login_users', $data);
    }

    public function get_user_mail(){
      $this->db->where("lid BETWEEN 275 AND 281");
      $query = $this->db->get('login_users');

      return $query->result_array();
    }

    public function is_available($email){
       $query = $this->db->get_where('login_users',"username='$email'" );
       if ( $query->num_rows() == 1) {
         return TRUE;
       }
         return FALSE;
    }

}
?>
