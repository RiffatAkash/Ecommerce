<?php

class Super_admin_model extends CI_Model {
    
    public function save_category_info($data)
    {
        $this->db->insert('tbl_category',$data);
    }
    public function select_all_category()
    {
        $query_result=$this->db->select('*')
                     ->from('tbl_category')
                     ->get()
                     ->result();
             return $query_result;
    }
    public function unpublished_category_by_id($category_id)
    {
        $this->db->set('publication_status',2)
             ->where('category_id',$category_id)
             ->update('tbl_category');
    }
    public function published_category_by_id($category_id)
    {
        $this->db->set('publication_status',1)
                  ->where('category_id',$category_id)
                  ->update('tbl_category');
    }
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id)
                  ->delete('tbl_category');
    }
    public function select_category_by_id($category_id)
    {
     return $this->db->select('*')
                 ->from('tbl_category')
                 ->where('category_id',$category_id)
                 ->get()
                 ->row();
         
    }
    public function update_category_by_id($data,$category_id)
    {
        $this->db->where('category_id',$category_id)
                 ->update('tbl_category',$data);
    }
    public function save_manufacture_info($data)
    {
        $this->db->insert('tbl_manufacture',$data);
    }
    public function select_all_maufacture()
    {
      return  $this->db->select('*')
                 ->from('tbl_manufacture')
                 ->get()
                 ->result();
    }
      public function unpublished_manufacture_by_id($manufacture_id)
    {
        $this->db->set('publication_status',2)
             ->where('manufacture_id',$manufacture_id)
             ->update('tbl_manufacture');
    }
      public function published_manufacture_by_id($manufacture_id)
    {
        $this->db->set('publication_status',1)
             ->where('manufacture_id',$manufacture_id)
             ->update('tbl_manufacture');
    }
    public function delete_manufacture_by_id($manufacture_id)
    {
          $this->db->where('manufacture_id',$manufacture_id)
                  ->delete('tbl_manufacture');
    }
      public function select_manufacture_by_id($manufacture_id)
    {
     return $this->db->select('*')
                 ->from('tbl_manufacture')
                 ->where('manufacture_id',$manufacture_id)
                 ->get()
                 ->row();
         
    }
     public function update_manufacture_by_id($data,$manufacture_id)
    {
        $this->db->where('manufacture_id',$manufacture_id)
                 ->update('tbl_manufacture',$data);
    }
    public function select_all_published_category()
    {
        return $this->db->select('*')
                 ->from('tbl_category')
                 ->where('publication_status',1)
                 ->get()
                 ->result();
    }
    public function select_all_published_manufacture()
    {
        return $this->db->select('*')
                        ->from('tbl_manufacture')
                        ->where('publication_status',1)
                        ->get()
                        ->result();
    }
    public function add_product_info()
    {
        $data=array();
        $data['product_name']=$this->input->post('product_name',TRUE);
        $data['category_id']=$this->input->post('category_id',TRUE);
        $data['manufacture_id']=$this->input->post('manufacture_id',TRUE);
        $data['product_short_description']=$this->input->post('product_short_description',TRUE);
        $data['product_long_description']=$this->input->post('product_long_description',TRUE);
        $data['product_price']=$this->input->post('product_price',TRUE);
        $data['product_new_price']=$this->input->post('product_new_price',TRUE);
        $data['product_quantity']=$this->input->post('product_quantity',TRUE);
        //$data['is_feature']=$this->input->post('is_feature',TRUE);
        if($this->input->post('is_feature',TRUE)=='on')
        {
          $data['is_feature']=1;  
        }
        else{
            $data['is_feature']=2;
        }
                $sdata=array();
                $error="";
       
                $config['upload_path']          = 'product_images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 10024;
                $config['max_height']           = 7680;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('product_image'))
                {
                        $error = $this->upload->display_errors();

                        echo $error;
                        exit();
                       // $this->load->view('upload_form', $error);
                }
                else
                {
                        $sdata = $this->upload->data();

//                        echo '<pre>';
//                        print_r($sdata);
//                        exit();
                        
                $data['product_image']=$config['upload_path'].$sdata['file_name'];

                        //$this->load->view('upload_success', $data);
                } 
       
       // exit();
        $data['publication_status']=$this->input->post('publication_status',TRUE);
        
        $this->db->insert('tbl_product',$data);
    }
    public function select_all_product()
    {
        return $this->db->select('*')
                 ->from('tbl_product')
                 ->get()
                 ->result();
                 
    }
    public function unpublished_product_by_id($product_id)
    {
        return $this->db->set('publication_status',2)
             ->where('product_id',$product_id)
             ->update('tbl_product');  
    }
    public function published_product_by_id($product_id)
    {
        return $this->db->set('publication_status',1)
                        ->where('product_id',$product_id)
                        ->update('tbl_product');
    }
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id)
                 ->delete('tbl_product');
    }
    public function select_product_by_id($product_id)
    {
       return $this->db->select('*')
                 ->from('tbl_product')
                 ->where('product_id',$product_id)
                 ->get()
                 ->row();
    }
     public function update_product($product_image)
    {
        $data=array();
        $product_id=$this->input->post('product_id',true);
        $data['category_id']=$this->input->post('category_id',true);
        $data['manufacture_id']=$this->input->post('manufacture_id',true);
        $data['product_name']=$this->input->post('product_name',true);
        $data['product_price']=$this->input->post('product_price',true);
        $data['product_short_description']=$this->input->post('product_short_description',true);
        $data['product_long_description']=$this->input->post('product_long_description',true);
        $data['product_quantity']=$this->input->post('product_quantity',true);
        $data['product_image']=$product_image;
       
        
        //$top_product=$this->input->post('top_product',true);
        //echo $top_product;
        //exit();
//        if($top_product==NULL)
//        {
//            $data['top_product']=0;
//        }
//        if($top_product=='on')
//        {
//            $data['top_product']=1;
//        }
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
        
    }
   
}
