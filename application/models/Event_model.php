<?php
class Event_model extends CI_Model {
    public function get_category_events($id){
        $this->db->select('event_id, cat_id, title, short_desc, details, min_memb, max_memb,
                    venue, reg_fee, fee_type, prize, file1, file2, co1_name,
                    co1_no, co2_name, co2_no, seats, reg_start, reg_end, link, is_certificate_pub');

        $this->db->where('cat_id', $id );

        $query = $this->db->get('events');
        return $query->result_array();
    }
    public function get_event($id){
        $this->db->select('event_id, cat_id, title, short_desc, details, min_memb, max_memb,
                    venue, reg_fee, fee_type, prize, file1, file2, file_last_date, co1_name,
                    co1_no, co2_name, co2_no, seats, reg_start, reg_end, username, link, is_certificate_pub');
        if( $id != NULL ){
            $this->db->where('event_id', $id );
        }
        $query = $this->db->get('events');
        return $query->result_array();
    }
    public function enable_certificate($eid) {
        if( $this->session->type != 'super' && $this->session->event_id != $eid){
            return 401;
        }
        $this->db->set('is_certificate_pub', 1);
        $this->db->where('event_id', $eid);
        $this->db->update('events');
        return 200;
    }
    
    public function get_event_by_link($link){
        $this->db->select('event_id, cat_id, title, short_desc, details, min_memb, max_memb,
                    venue, reg_fee, fee_type, prize, file1, file2, co1_name,
                    co1_no, co2_name, co2_no, seats, reg_start, reg_end, link');
        if( $id != NULL ){
            $this->db->where('link', $link );
        }
        $query = $this->db->get('events');
        return $query->result_array();
    }
    public function create($data){
        if( $this->session->type != 'super' && $this->session->cat_id != $data['cat_id'] ){
            return 401;
        }
        $data['pswd']=password_hash($data['pswd'],PASSWORD_BCRYPT);
        $this->db->insert('events', $data);
        $insertID=$this->db->insert_id();
        $config['upload_path']          = FCPATH . 'assets\uploads\\' ;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['detect_mime']           = TRUE;
        $config['file_name']           = $insertID.".jpg";
    
        $this->load->library('upload', $config);
    
        if ( ! $this->upload->do_upload('event_img')){
            // $error = array('error' => $this->upload->display_errors());
            return 500;
        }
        // $data = array('upload_data' => $this->upload->data());
        
        return 201;
    }
    public function modify($id,$data){
        $this->db->select('cat_id');
        $this->db->where('event_id',$id);
        $cat_id=$this->db->get('events')->result_array()[0]['cat_id'];
        if( $this->session->type != 'super' && $this->session->event_id != $id && $this->session->cat_id != $cat_id ){
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
        $this->db->where('event_id', $id);
        $this->db->update('events');
        return 200;
    }
    public function delete($id){
        $cat_id= $this->db->query("SELECT cat_id FROM events WHERE event_id=='".$id."';")->result_array()['cat_id'];
        if( $this->session->type != 'super' && $this->session->event_id != $id && $this->session->cat_id != $cat_id ){
            return 401;
        }
        $this->db->delete('events', array('event_id' => $id));
        return 200;
    }
    public function validate($username,$pswd){
        $query = $this->db->get_where('events', array('username' => $username));
        if($query->num_rows() == 1){
            $row = $query->row();
            $hash = $row->pswd;
            if(password_verify($pswd,$hash)){
                $data = array(
                    'type' => 'event',
                    'event_id' => $row->event_id,
                    'title' => $row->title,
                    'username' => $row->username,
                    'validated' => TRUE
                );
                $this->session->set_userdata($data);
                return $data;
            }
        }
        return FALSE;
    }
}
?>
