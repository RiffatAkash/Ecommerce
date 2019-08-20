<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function save_customer_info() {
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name', TRUE);
        $data['customer_email'] = $this->input->post('customer_email', TRUE);
        $data['customer_password'] = $this->input->post('customer_password', TRUE);
        $data['customer_phone_number'] = $this->input->post('customer_phone_number', TRUE);
        $data['customer_location'] = $this->input->post('customer_location', TRUE);
        $this->checkout_model->save_customer_info($data);
        $sdata = array();
        $sdata['message'] = "Customer Information Set Successfully";
        $this->session->set_userdata($sdata);
        redirect('Cart/checkout');
    }

    public function check_customer_info() {
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email', TRUE);
        $data['customer_password'] = $this->input->post('customer_password', TRUE);
        $reuslt = $this->checkout_model->check_customer_info($data);
        if ($reuslt) {
            $customer_id = $reuslt->customer_id;
            $sdata = array();
            $sdata['customer_id'] = $customer_id;
            $this->session->set_userdata($sdata);
            redirect('Checkout/shipping');
        } else {
            $sdata = array();
            $sdata['wrong_message'] = "Email Or Password Invalid";
            $this->session->set_userdata($sdata);
            redirect('Cart/checkout');
        }
    }

    public function shipping() {
        $data = array();
        $data['title'] = "Product_Details";
        $data['account'] = "";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $data['home_content'] = $this->load->view('pages/shipping', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function save_shipping_info() {
        $data = array();
        $data['shipping_name'] = $this->input->post('shipping_name', TRUE);
        $data['shipping_email'] = $this->input->post('shipping_email', TRUE);
        $data['shipping_number'] = $this->input->post('shipping_phone_number', TRUE);
        $data['shipping_location'] = $this->input->post('shipping_location', TRUE);
        $shipping_id = $this->checkout_model->save_shipping_info($data);
        $sdata = array();
        $sdata['shipping_id'] = $shipping_id;
        $this->session->set_userdata($sdata);
        redirect('Checkout/payment');
    }
    public function payment()
    {
        $data = array();
        $data['title'] = "Product_Details";
        $data['account'] = "";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $data['home_content'] = $this->load->view('pages/payment', $data, TRUE);
        $this->load->view('master', $data);
    }
    public function save_payment_info()
    {
        $data=array();
        $data['payment_method']=$this->input->post('payment_info',TRUE);
        $payment_id = $this->checkout_model->save_payment_info($data);
         $sdata = array();
        $sdata['payment_id'] = $payment_id;
        $this->session->set_userdata($sdata);
        $odata=array();
        $odata['customer_id']=$this->session->userdata('customer_id');
        $odata['shipping_id']=$this->session->userdata('shipping_id');
        $odata['payment_id']=$this->session->userdata('payment_id');
        $odata['order_total']=$this->session->userdata('order_total');
        
        $order_id = $this->checkout_model->save_order_info($odata);
        
        $carts=$this->cart->contents();
        
        $oodata=array();
        foreach($carts as $v_carts)
        {
            $oodata['order_id']=$order_id;
            $oodata['product_id']=$v_carts['id'];
            $oodata['product_name']=$v_carts['name'];
            $oodata['product_price']=$v_carts['price'];
            $oodata['product_sales_quantity']=$v_carts['qty'];
            $order_details_id = $this->checkout_model->save_order_details_info($oodata);
        }
        
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('shipping_id');
        $this->session->unset_userdata('payment_id');
        $this->session->unset_userdata('order_total');
        
        $this->cart->destroy();
        
        redirect('Checkout/confirm');
        
    }
    public function confirm()
    {
        $data = array();
        $data['title'] = "Product_Details";
        $data['account'] = "";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $data['home_content'] = $this->load->view('pages/confirm', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function logout() {
        $data = array();
        $data['title'] = "Customer_Details";
        $data['account'] = "";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $this->session->unset_userdata('customer_id');
        redirect('Cart/checkout');
        //$data['home_content'] = $this->load->view('Cart/checkout', $data, TRUE);
        //$this->load->view('master', $data);
    }

}
