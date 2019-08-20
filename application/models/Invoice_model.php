<?php

class Invoice_model extends CI_Model {

    public function select_invoice_info() {
        return $this->db->select('*')
                        ->from('tbl_order')
                        ->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id')
                        ->join('tbl_shipping', 'tbl_shipping.shipping_id = tbl_order.shipping_id')
                        ->get()
                        ->result();
    }
    public function select_order_by_id($order_id)
    {
           return $this->db->select('*')
                 ->from('tbl_order')
                 ->where('order_id',$order_id)
                 ->get()
                 ->row();
    }
    public function select_customer_by_id($customer_id)
    {
         return $this->db->select('*')
                 ->from('tbl_customer')
                 ->where('customer_id',$customer_id)
                 ->get()
                 ->row();
    }
    public function select_shipping_by_id($shipping_id)
    {
        return $this->db->select('*')
                 ->from('tbl_shipping')
                 ->where('shipping_id',$shipping_id)
                 ->get()
                 ->row();
    }
    public function select_order_details_by_id($order_id)
    {
        
         return $this->db->select('*')
                 ->from('tbl_order_details')
                 ->where('order_id',$order_id)
                 ->get()
                 ->result();
    }
    public function delete_invoice($order_id,$shipping_id,$payment_id)
    {
          $this->db->where('order_id',$order_id)
                  ->delete('tbl_order_details');
          
          $this->db->where('order_id',$order_id)
                  ->delete('tbl_order');
          
          $this->db->where('shipping_id',$shipping_id)
                  ->delete('tbl_shipping');
          
          $this->db->where('payment_id',$payment_id)
                  ->delete('tbl_payment');
    }
    public function select_order_details_by_order_details_id($order_details_id)
    {
         return $this->db->select('*')
                 ->from('tbl_order_details')
                 ->where('order_details_id',$order_details_id)
                 ->get()
                 ->row();
    }
    public function update_order_details_by_id($order_details_id,$product_sales_quantity)
    {
        $this->db->set('product_sales_quantity',$product_sales_quantity)
             ->where('order_details_id',$order_details_id)
             ->update('tbl_order_details');
    }
   

}
