<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {

    public function add_to_cart() {
        $qty = $this->input->post('product_quantity');
        $product_id = $this->input->post('product_id');
        $product_info = $this->Welcome_model->product_details_by_id($product_id);

        $data = array(
            'id' => $product_id,
            'qty' => $qty,
            'price' => $product_info->product_new_price,
            'name' => $product_info->product_name,
            'options' => array('image' => $product_info->product_image)
        );

        $this->cart->insert($data);
        redirect('Cart/cart_details');
    }

    public function cart_details() {
        $data = array();
        $data['title'] = "Product_Details";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $data['home_content'] = $this->load->view('pages/cart_details', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function update_cart() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );

        $this->cart->update($data);
        
        redirect('cart/cart_details');
    }
    public function delete_cart($rowid)
    {
       // $rowid = $this->input->post('rowid');
        //$qty = $this->input->post('qty');

        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);
        
        redirect('cart/cart_details');
    }
    public function checkout()
    {
         $data = array();
        $data['title'] = "checkout";
        $data['account'] = "";
        $data['category_manufacture_in_side_bar'] = 0;
        $data['slider'] = "";
        $data['home_content'] = $this->load->view('pages/checkout', $data, TRUE);
        $this->load->view('master', $data);
    }

}
