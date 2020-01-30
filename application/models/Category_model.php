<?php
class Category_model extends CI_Model {
    public function get_categories($id){
        $this->db->select('cat_id, cat_name');
        if( $id != null ){
            $this->db->where('cat_id', $id );
        }
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    public function create($data){
        if( $this->session->type != 'super' ){
            return 401;
        }
        $data['pswd']=password_hash($data['pswd'],PASSWORD_BCRYPT);
        $this->db->insert('categories', $data);
        return 201;
    }
    public function modify($id,$data){
        if( $this->session->type != 'super' ){
            return 401;
        }
        foreach($data as $key => $value){
            if( $value != NULL ){ 
                if( $key == 'pswd' ){
                    $this->db->set($key,password_hash($value,PASSWORD_BCRYPT));
                }
                else{
                    $this->db->set($key, $value);
                }
            }
        }
        $this->db->where('cat_id', $id);
        $this->db->update('categories');
        return 200;
    }
    public function delete($id){
        if( $this->session->type != 'super' ){
            return 401;
        }
        $this->db->delete('categories', array('cat_id' => $id));
        return 200;
    }
    public function validate($username,$pswd){
        $query = $this->db->get_where('categories', array('username' => $username));
        if($query->num_rows() == 1){
            $row = $query->row();
            $hash = $row->pswd;
            if(password_verify($pswd,$hash)){
                $data = array(
                    'type' => 'category',
                    'cat_id' => $row->cat_id,
                    'cat_name' => $row->cat_name,
                    'username' => $row->username,
                    'validated' => TRUE
                );
                $this->session->set_userdata($data);
                return $data;
            }
        }
        $this->config->load('super');
        $username=$this->config->item('super_user');
        $hash=$this->config->item('super_pass');
        if(password_verify($pswd,$hash)){
            $data = array('type' => 'super', 'username' => $username , 'validated' => TRUE);
            $this->session->set_userdata($data);
            return $data;
        }
        $this->config->load('monitor');
        $username=$this->config->item('monitor_user');
        $hash=$this->config->item('monitor_pass');
        if(password_verify($pswd,$hash)){
            $data = array('type' => 'monitor', 'username' => $username , 'validated' => TRUE);
            $this->session->set_userdata($data);
            return $data;
        }
        $username=$this->config->item('accommodation_user');
        $hash=$this->config->item('accommodation_pass');
        if(password_verify($pswd,$hash)){
            $data = array('type' => 'accommodation', 'username' => $username , 'validated' => TRUE);
            $this->session->set_userdata($data);
            return $data;
        }
        $username=$this->config->item('volunteer_user');
        $hash=$this->config->item('volunteer_pass');
        if(password_verify($pswd,$hash)){
            $data = array('type' => 'volunteer', 'username' => $username , 'validated' => TRUE);
            $this->session->set_userdata($data);
            return $data;
        }
        return FALSE;
    }
}
?>