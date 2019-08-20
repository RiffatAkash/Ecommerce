<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id!=NULL)
        {
            redirect('Admin');
        }
    }

    public function index()
    {
        $this->load->view('admin/admin_login');
    }
    public function check_admin_login()
    {
        $email=$this->input->post('email',TRUE);
        $password=$this->input->post('password',TRUE);
        $user_details=$this->admin_model->user_details($email);
        //$encrypt_password=md5($password);
        
        $sdata=array();
        if($user_details)
        {
            $sdata['admin_id']=$user_details->admin_id;
            $sdata['admin_name']=$user_details->admin_name;
            
            $this->session->set_userdata($sdata);
            redirect('Admin/index');
        }
        else {
            $sdata['exception']="User Id or Password Invalid";
            $this->session->set_userdata($sdata);
            redirect('admin_login');
            //$this->load->view('admin/admin_login');
        }
        
       
        
    }
}
