<?php
class Registration_model extends CI_Model {
    public function get_event_registrations($eid){
        $this->db->select('cat_id');
        $this->db->where('event_id',$eid);
        $cat_id=$this->db->get('events')->result_array()[0]['cat_id'];
        if( $this->session->type != 'super' && $this->session->type != 'monitor' && $this->session->event_id != $eid && $this->session->cat_id != $cat_id ){
            return 401;
        }
        if(!$eid){
            $eid=0;
        }
        $query=$this->db->query("SELECT event_id,reg_email,member_email,fullname,phone,college,file1,file2,participated FROM registration a left join users b on  a.member_email=b.email where a.event_id=".$eid." and if(a.member_email=a.reg_email,1,0)=1 order by a.timestamp");
        $data = array();
        foreach($query->result() as $row1)
        {
                $row = array();
                $row['reg_email'] = $row1->reg_email;
                $row['fullname'] = $row1->fullname;
                $row['college'] = $row1->college;
                $row['phone'] = $row1->phone;
                $row['file1'] = $row1->file1;
                $row['file2'] = $row1->file2;
                $row['participated'] = $row1->participated;
                $query_memb=$this->db->query("SELECT member_email,fullname,phone,college FROM registration a left join users b on  a.member_email=b.email where a.event_id=".$row1->event_id." and if(a.member_email=a.reg_email,1,0)=0 and a.reg_email='".$row1->reg_email."'  order by reg_id");
                $row['members']=$query_memb->result_array();
                $data[] = $row;
        }
        return  $data;
    }
    public function get_registrations($id){
        $this->db->select('reg_id, event_id, reg_email, member_email');
        if( $id != NULL ){
            $this->db->where('reg_id', $id );
        }
        $query = $this->db->get('registrations');
        return $query->result_array();
    }
    public function create($data){
        if( $this->session->type != 'super' OR $this->session->email != $data['reg_email'] ){
            return 401;
        }
        $this->db->insert('registrations', $data);
        return 201;
    }
    public function modify($id,$data){
        $reg_email= $this->db->query("SELECT reg_email FROM registations WHERE reg_id=='".$id."';")->result_array()['reg_email'];
        if( $this->session->type != 'super' && $this->session->email != $reg_email ){
            return 401;
        }
        foreach($data as $key => $value){
            if( $value != NULL ){
                $this->db->set($key, $value);
            }
        }
        $this->db->where('reg_id', $id);
        $this->db->update('registrations');
        return 200;
    }
    public function set_participation($eid, $reg_email, $participation) {
        if( $this->session->type != 'super' && $this->session->event_id != $eid){
            return 401;
        }
        $this->db->set('participated', $participation);
        $whr = array('event_id' => $eid, 'reg_email' => $reg_email);
        $this->db->where($whr);
        $this->db->update('registration');
        return 200;
    }
    public function delete($id){
        $reg_email= $this->db->query("SELECT reg_email FROM registations WHERE reg_id=='".$id."';")->result_array()['reg_email'];
        if( $this->session->type != 'super' && $this->session->email != $reg_email ){
            return 401;
        }
        $this->db->delete('registrations', array('reg_id' => $id));
        return 200;
    }
}
?>
