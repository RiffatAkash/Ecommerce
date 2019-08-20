<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('Admin_login');
        }
    }

    public function index() {
        $data = array();
        $data['admin_maincontent'] = $this->load->view('admin/pages/admin_maincontent', '', TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata = array();
        $sdata['message'] = 'YOU ARE SUCCESSFULLY LOGOUT';
        $this->session->set_userdata($sdata);
        redirect('admin_login');
    }

    public function add_category() {
        $data = array();
        $data['admin_maincontent'] = $this->load->view('admin/pages/add_category', '', TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {

        $data = array();
        $data['category_name'] = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status'] = $this->input->post('publication_status');
        $this->super_admin_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = "Save Category Information Successfully";
        $this->session->set_userdata($sdata);
        redirect('Admin/add_category');
    }

    public function manage_category() {
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_all_category();
        $data['admin_maincontent'] = $this->load->view('admin/pages/manage_category', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_category($category_id) {
        $this->super_admin_model->unpublished_category_by_id($category_id);
        redirect('admin/manage_category');
    }

    public function published_category($cateogry_id) {
        $this->super_admin_model->published_category_by_id($cateogry_id);
        redirect('admin/manage_category');
    }

    public function delete_category($category_id) {
        $this->super_admin_model->delete_category_by_id($category_id);
        redirect('admin/manage_category');
    }

    public function edit_category($category_id) {
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_category_by_id($category_id);
        $data['admin_maincontent'] = $this->load->view('admin/pages/edit_category', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $data = array();
        $category_id = $this->input->post('category_id', TRUE);
        $data['category_name'] = $this->input->post('category_name', TRUE);
        $data['category_description'] = $this->input->post('category_description', TRUE);
        $this->super_admin_model->update_category_by_id($data, $category_id);
        redirect('admin/manage_category');
    }

    public function add_manufacture() {
        $data = array();
        $data['admin_maincontent'] = $this->load->view('admin/pages/add_manufacture', '', TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_manufacture() {
        $this->form_validation->set_rules('manufacture_name', 'Manufacture Name', 'required');
        $this->form_validation->set_rules('manufacture_description', 'Manufacture Description', 'required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'required');

        if ($this->form_validation->run()) {
            $data = array(
                'manufacture_name' => $this->input->post('manufacture_name'),
                'manufacture_description' => $this->input->post('manufacture_description'),
                'publication_status' => $this->input->post('publication_status')
            );
            $this->super_admin_model->save_manufacture_info($data);
            $sdata = array();
            $sdata['message'] = "Save Manufacture Information Successfully";
            $this->session->set_userdata($sdata);
            $this->add_manufacture();
        } else {

            $this->add_manufacture();
        }
    }

    public function manufacture_manufacture() {
        $data = array();
        $data['manufacture_info'] = $this->super_admin_model->select_all_maufacture();
        $data['admin_maincontent'] = $this->load->view('admin/pages/manage_manufacture', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_manufacture($manufacture_id) {
        $this->super_admin_model->unpublished_manufacture_by_id($manufacture_id);
        redirect('admin/manufacture_manufacture');
    }

    public function published_manufacture($manufacture_id) {
        $this->super_admin_model->published_manufacture_by_id($manufacture_id);
        redirect('admin/manufacture_manufacture');
    }

    public function delete_manufacture($manufacture_id) {
        $this->super_admin_model->delete_manufacture_by_id($manufacture_id);
        redirect('admin/manufacture_manufacture');
    }

    public function edit_manufacture($manufacture_id) {
        $data = array();
        $data['manufacture_info'] = $this->super_admin_model->select_manufacture_by_id($manufacture_id);
        $data['admin_maincontent'] = $this->load->view('admin/pages/edit_manufacture', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_manufacture() {
        $data = array();
        $manufacture_id = $this->input->post('manufacture_id', TRUE);
        $data['manufacture_name'] = $this->input->post('manufacture_name', TRUE);
        $data['manufacture_description'] = $this->input->post('manufacture_description', TRUE);
        $this->super_admin_model->update_manufacture_by_id($data, $manufacture_id);
        redirect('admin/manufacture_manufacture');
    }

    public function add_product() {
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_all_published_category();
        $data['manufacture_info'] = $this->super_admin_model->select_all_published_manufacture();
        $data['admin_maincontent'] = $this->load->view('admin/pages/add_product', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_product() {
        $this->super_admin_model->add_product_info();
        $sdata = array();
        $sdata['message'] = "PRODUCT INFO SAVE SUCCESSFULLY";
        $this->session->set_userdata($sdata);
        redirect('admin/add_product');
    }

    public function manage_product() {
        $data = array();
        $data['product_info'] = $this->super_admin_model->select_all_product();
        $data['admin_maincontent'] = $this->load->view('admin/pages/manage_product', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_product($product_id) {
        $this->super_admin_model->unpublished_product_by_id($product_id);
        redirect('admin/manage_product');
    }

    public function published_product($product_id) {
        $this->super_admin_model->published_product_by_id($product_id);
        redirect('admin/manage_product');
    }

    public function delete_product($product_id) {
        $this->super_admin_model->delete_product_by_id($product_id);
        redirect('admin/manage_product');
    }

    public function edit_product($product_id) {
        $data = array();
        $data['product_info'] = $this->super_admin_model->select_product_by_id($product_id);
        $data['category_info'] = $this->super_admin_model->select_all_published_category();
        $data['manufacture_info'] = $this->super_admin_model->select_all_published_manufacture();
        $data['admin_maincontent'] = $this->load->view('admin/pages/edit_product', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }
    
      private function upload_product_image(){
        $config['upload_path']          = './product_images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;//kb
        $config['max_width']            = 102004;
        $config['max_height']           = 7680;
        
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('product_image')){
            
            $data = $this->upload->data();
            
            $image_path = "product_images/$data[file_name]";
            return $image_path;
        }else{
            $error = $this->upload->display_errors();
            print_r($error);
        }
    }

    public function update_product() {
        
        if ($_FILES['product_image']['name'] == '' || $_FILES['product_image']['size'] == 0) {
            $product_image = $this->input->post('product_old_image', true);
            $this->super_admin_model->update_product($product_image);
            $sdata = array();
            //$sdata['message'] = "Update Product Information Successfully !";
            //$this->session->set_userdata($sdata);
            $product_id = $this->input->post('product_id', true);
            redirect('Admin/manage_product');
           // redirect('product-edit/' . $product_id);
        } else {
            $product_image = $this->upload_product_image();
            $this->super_admin_model->update_product($product_image);
            unlink($this->input->post('product_old_image', true));
            $sdata = array();
            //$sdata['message'] = "Update Product Information Successfully !";
            //$this->session->set_userdata($sdata);
            $product_id = $this->input->post('product_id', true);
            redirect('Admin/manage_product');
           // redirect('product-edit/' . $product_id);
        }
    }
    public function invoice()
    {
        $data = array();
        $data['invoice_info'] =$this->invoice_model->select_invoice_info();
       
        $data['admin_maincontent'] = $this->load->view('admin/pages/manage_invoice', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

}
