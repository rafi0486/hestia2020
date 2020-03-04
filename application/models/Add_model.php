<?php
class Add_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function get_user(){
      $query = $this->db->get('spot');
      return $query->result_array();
    }

    public function add_single_user($data){
      $this->db->insert('login_users', $data);
    }

    public function get_user_mail(){
      $query = $this->db->get('login_users');
      return $query->result_array();
    }

}
?>
