<?php
class User_model extends CI_Model {
    public function get_users($email){
        $this->db->select('fullname, email, client_id, phone, college, verified, banned');
        if( $email != NULL ){
            $this->db->where('email', $email );
        }
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function get_user_single($email){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query=$this->db->get();
        return $query->result_array()[0];


    }
    public function create($data){

        $this->db->insert('users', $data);
    

        return 201;
    }
    public function modify($email,$data){
        if( $this->session->type != 'super' && $this->session->email != $email ){
            return 401;
        }
        foreach($data as $key => $value){
            if( $value != NULL ){ 
                $this->db->set($key, $value);
            }
        }
        $this->db->where('email', $email);

        $this->db->update('users');
        return 200;
    }
    public function modify_w($email,$data){

        foreach($data as $key => $value){
            if($key=="accommodation"){


                if( $value != NULL ){
                    $query=$this->db->query("select accommodation from users where email='".$email."'");
                    $acc_cur=$query->row()->accommodation;
                    if($acc_cur){
                        $splitted_cur = str_split($acc_cur);
                        $splitted_in = str_split($value);

                        foreach ($splitted_in as $single_day_in){
                            if (in_array($single_day_in, $splitted_cur))
                            {

                            }
                            else
                            {
                                array_push($splitted_cur,$single_day_in);

                            }
                        }

                        $this->db->set('accommodation', implode($splitted_cur));
                    }else{
                        $this->db->set('accommodation', $value);

                    }
                }

            }else{
                if( $value != NULL ){
                    $this->db->set($key, $value);
                }
            }

        }
        $this->db->where('email', $email);
        return $this->db->update('users');

    }

    public function delete($email){
        if( $this->session->type != 'super' && $this->session->email != $email ){
            return 401;
        }
        $this->db->delete('users', array('email' => $email));
        return 200;
    }
    public function is_registered($email,$isnotnull="Y"){
        if($isnotnull=="Y"){
            $query = $this->db->get_where('users',"email='$email' and (phone is not null and college is not null)" );

        }else{
            $query = $this->db->get_where('users',"email='$email'" );

        }
        if( $query->num_rows() == 1 ){
            return TRUE;
        }
        return FALSE;
    }

    public function complete_signin($data){

        $this->load->library('encryption');
        $data['fullname'] = $this->session->name;
        if($this->is_registered($this->session->email,"N")==FALSE){
            $data['email'] = $this->session->email;

            $data['hashcode'] =password_hash($data['email'],PASSWORD_BCRYPT);
            $this->create($data);
                $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://www.hestia.live/payment/mail/usermail.php?email='.$data['email'].'',
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0"
            ]);
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            //echo $resp;
            // Close request to clear up some resources
            curl_close($curl);
            
           
        }else{
            $this->modify($this->session->email,$data);
        }

    }
    public function update_profile($email,$data){

        $fromser="";
        if(isset($data['accommodation'])){
            $fromser=$data['accommodation'];
        
            $acc_cnt=$this->get_user_single($this->session->email)['accommodation'];

            if(strlen($acc_cnt)==strlen($fromser)){

            $this->db->where('email', $email);
            return $this->db->update('users',$data);
            }
        }
        else
        {
            $this->db->where('email', $email);
            return $this->db->update('users',$data);
        }

    }

    public function get_us_rh_sh($email) {
        $this->db->select('hashcode');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query=$this->db->get();
        return $query->result_array()[0];
    }

    public function get_accommodations() {
        if( $this->session->type != 'super' && $this->session->type != 'accommodation' ){
            return 401;
        }
        $this->db->select('fullname, phone, email, college, accommodation');
        $this->db->from('users');
        $this->db->where('accommodation!=', NULL);
        $this->db->order_by("timestamp", "asc");
        $query=$this->db->get();
        return $query->result_array();
    }
}
?>