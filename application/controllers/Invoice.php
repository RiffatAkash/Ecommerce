<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function manage_invoice() {
        $data = array();
        $data['invoice_info'] = $this->invoice_model->select_invoice_info();
        $data['admin_maincontent'] = $this->load->view('admin/pages/manage_invoice', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }
    public function view_invoice($order_id)
    {
        $data = array();
        $order_info=$this->invoice_model->select_order_by_id($order_id);
        $data['order_info']=$this->invoice_model->select_order_by_id($order_id);
        $data['customer_info']=$this->invoice_model->select_customer_by_id($order_info->customer_id);
        $data['shipping_info']=$this->invoice_model->select_shipping_by_id($order_info->shipping_id);
        $data['order_details_info']=$this->invoice_model->select_order_details_by_id($order_info->order_id);
        
        $data['admin_maincontent'] = $this->load->view('admin/pages/view_invoice', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }
    public function delete_invoice($order_id)
    {
        $data = array();
        $order_info=$this->invoice_model->select_order_by_id($order_id);
        $shipping_id=$order_info->shipping_id;
        $payment_id=$order_info->payment_id;
        $order_id=$order_info->order_id;
        $this->invoice_model->delete_invoice($order_id,$shipping_id,$payment_id);
        redirect('Invoice/manage_invoice');
        
    }
    public function edit_invoice($order_details_id)
    {
        $data = array();
        $data['order_details_info']=$this->invoice_model->select_order_details_by_order_details_id($order_details_id);
        
        //$data['invoice_info'] = $this->invoice_model->select_invoice_info();
        $data['admin_maincontent'] = $this->load->view('admin/pages/edit_invoice', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }
    public function update_invoice()
    {
        $data=array();
        $order_details_id=$this->input->post('order_details_id',TRUE);
        $product_sales_quantity=$this->input->post('product_sales_quantity',TRUE);
        $this->invoice_model->update_order_details_by_id($order_details_id,$product_sales_quantity);
        $data['order_details_info']=$this->invoice_model->select_order_details_by_order_details_id($order_details_id);
        //$data['invoice_info'] = $this->invoice_model->select_invoice_info();
        $data['admin_maincontent'] = $this->load->view('admin/pages/edit_invoice', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
        
    }

}
