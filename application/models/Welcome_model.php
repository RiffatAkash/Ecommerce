<?php

class Welcome_model extends CI_Model {

    public function select_all_published_product() {
        return $this->db->select('*')
                        ->from('tbl_product')
                        ->where('publication_status', 1)
                        ->get()
                        ->result();
    }

    public function select_all_feature_items() {
        return $this->db->select('*')
                        ->from('tbl_product')
                        ->where('is_feature', 1)
                        ->get()
                        ->result();
    }

    public function all_published_product_by_category($category_id) {
        return $this->db->select('*')
                        ->from('tbl_product')
                        ->where('category_id', $category_id)
                        ->get()
                        ->result();
    }

    public function all_published_product_by_manufacture($manufacture_id) {
        return $this->db->select('*')
                        ->from('tbl_product')
                        ->where('manufacture_id', $manufacture_id)
                        ->get()
                        ->result();
    }

    public function product_details_by_id($product_id) {
        
        return $this->db->select('tbl_product.*,tbl_manufacture.manufacture_name')
             ->from('tbl_product')
             ->join('tbl_manufacture', 'tbl_manufacture.manufacture_id = tbl_product.manufacture_id')
             ->where('product_id',$product_id)
              ->get()
             ->row();
    }

}
