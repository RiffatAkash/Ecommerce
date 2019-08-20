<?php

class Checkout_model extends CI_Model {
    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer',$data);
        $customer_id=$this->db->insert_id();
        return $customer_id;
    }
    public function check_customer_info($data)
    {
      
        return $this->db->select('*')
                 ->from('tbl_customer')
                 ->where('customer_email',$data['customer_email'])
                 ->where('customer_password',$data['customer_password'])
                 ->get()
                 ->row();
         
    }
    public function save_shipping_info($data)
    {
         $this->db->insert('tbl_shipping',$data);
        $shipping_id=$this->db->insert_id();
        return $shipping_id;
    }
    public function save_payment_info($data)
    {
         $this->db->insert('tbl_payment',$data);
        $payment_id=$this->db->insert_id();
        return $payment_id;
    }
    public function save_order_info($data)
    {
         $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        return $order_id;
    }
    public function save_order_details_info($data)
    {
        $this->db->insert('tbl_order_details',$data);
        $order_id_details=$this->db->insert_id();
        return $order_id_details;
    }
}
