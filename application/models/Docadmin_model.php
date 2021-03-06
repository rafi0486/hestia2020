<?php
class DocAdmin_model extends CI_Model {

    public function saveEvent(){
        //$data['event_id']=$this->input->post('event_id');
        $data['cat_id']=$this->input->post('cat_id');
        $data['title']=$this->input->post('title');
        $data['short_title']=$this->input->post('short_title');
        if(!$data['short_title']){
             $data['short_title']=$this->input->post('title');
        }
        $data['short_desc']=$this->input->post('short_desc');
        $data['details']=$this->input->post('details');
        $data['min_memb']=$this->input->post('min_memb');
        $data['max_memb']=$this->input->post('max_memb');
        $data['venue']=$this->input->post('venue');
        $data['reg_fee']=$this->input->post('reg_fee');
        $data['fee_type']=$this->input->post('fee_type');
        $data['prize']=$this->input->post('prize');
        $data['file1']=$this->input->post('file1');
        $data['file2']=$this->input->post('file2');
        if($this->input->post('file_last_date')){
                    $data['file_last_date']=$this->input->post('file_last_date');

        }
        $data['co1_name']=$this->input->post('co1_name');
        $data['co1_no']=$this->input->post('co1_no');
        $data['co2_name']=$this->input->post('co2_name');
        $data['co2_no']=$this->input->post('co2_no');
        $data['seats']=$this->input->post('seats');
        $data['reg_start']=$this->input->post('reg_start');
        $data['reg_end']=$this->input->post('reg_end');
        $data['syllabus_link']=$this->input->post('syllabus_link');
        $data['username']=$this->input->post('username');
        $data['pswd'] = password_hash($this->input->post('username'), PASSWORD_BCRYPT);
        $configss['allowed_types'] = '*';
        $configss['max_filename'] = '255';
        $configss['overwrite'] = TRUE;
        $configss['max_size'] = '1024';

        $configss['upload_path'] = 'assets/uploads/event_images/';
        if (isset($_FILES['photo']['name'])) {
            echo "here";
            if (0 < $_FILES['photo']['error']) {
                echo 'Error during file upload' . $_FILES['photo']['error'];
            } else {
                $this->load->library('upload', $configss);
                $this->upload->initialize($configss);
                if (!$this->upload->do_upload('photo')) {
                    echo $this->upload->display_errors();
                } else {
                    $data1 = $this->upload->data();
                    $data['image_name'] = $data1['raw_name'].$data1['file_ext'];
                    $data['link']=$this->input->post('link');
                    return $this->db->insert('events', $data);
                }
            }
        }

        //$data['pswd']=$this->input->post('pswd');
    }

    public function updateEvent(){

    //$data['cat_id']=$this->input->post('cat_id');
    $data['title']=$this->input->post('title');
    $data['short_title']=$this->input->post('short_title');

    $data['short_desc']=$this->input->post('short_desc');
    $data['details']=$this->input->post('details');
    $data['min_memb']=$this->input->post('min_memb');
    $data['max_memb']=$this->input->post('max_memb');
    $data['venue']=$this->input->post('venue');
    $data['reg_fee']=$this->input->post('reg_fee');
   // $data['fee_type']=$this->input->post('fee_type');
    $data['prize']=$this->input->post('prize');
    $data['file1']=$this->input->post('file1');
    $data['file2']=$this->input->post('file2');
    if($this->input->post('file_last_date')){
        $data['file_last_date']=$this->input->post('file_last_date');

    }
    $data['co1_name']=$this->input->post('co1_name');
    $data['co1_no']=$this->input->post('co1_no');
    $data['co2_name']=$this->input->post('co2_name');
    $data['co2_no']=$this->input->post('co2_no');
    $data['seats']=$this->input->post('seats');
    $data['reg_start']=$this->input->post('reg_start');
    $data['reg_end']=$this->input->post('reg_end');
    $data['syllabus_link']=$this->input->post('syllabus_link');
    $data['username']=$this->input->post('username');
    $configss['allowed_types'] = '*';
    $configss['max_filename'] = '255';
    $configss['overwrite'] = TRUE;
    $configss['max_size'] = '1024';

    $configss['upload_path'] = 'assets/uploads/event_images/';
    if (isset($_FILES['photo']['name']) && $_FILES['photo']['error']!=4) {

        if (0 < $_FILES['photo']['error'] ) {
            echo 'Error during file upload' . $_FILES['photo']['error'];
        } else {
            $this->load->library('upload', $configss);
            $this->upload->initialize($configss);
            if (!$this->upload->do_upload('photo')) {
                echo $this->upload->display_errors();
            } else {
                $data1 = $this->upload->data();
                $data['image_name'] = $data1['raw_name'].$data1['file_ext'];
                $data['link']=$this->input->post('link');

            }
        }
    }
    $this->db->where ( 'event_id',$this->input->post('event_id'));
    return $this->db->update('events', $data);
    //$data['pswd']=$this->input->post('pswd');
}

    public function get_winners($eid){
      $query = $this->db->query("SELECT events.is_certificate_pub,registration.reg_email,events.title,registration.member_email,registration.participated,registration.event_id,users.fullname,users.phone,users.college FROM registration LEFT JOIN users ON registration.member_email = users.email left JOIN events ON
registration.event_id = events.event_id WHERE registration.event_id=".$eid." AND registration.participated != 1 AND registration.participated !=0 ORDER BY registration.reg_email ASC " );
      return $query->result_array();
    }

    public function publish_cert($eid){
      $query = $this->db->query("UPDATE events SET is_certificate_pub = 1 WHERE event_id = ".$eid);
      // echo "flag1";exit;

    }

}
?>
