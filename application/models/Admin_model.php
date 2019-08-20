<?php


class Admin_model extends CI_Model {

    public function user_details($user_email)
    {
        $user_details=$this->db->select('*')
                           ->from('tbl_admin')
                           ->where('admin_email',$user_email)
                           ->get()
                           ->row();
        
                   return $user_details;
    }
}
