<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $data=array();
                $data['title']="Home";
                $data['account']="";
                $data['category_manufacture_in_side_bar']=1;
                $data['all_published_product']=$this->Welcome_model->select_all_published_product();
                $data['feature_items']=$this->Welcome_model->select_all_feature_items();
                $data['home_content']=$this->load->view('pages/home_content',$data,TRUE);
                $data['slider']=$this->load->view('pages/slider',$data,TRUE);
                $this->load->view('master',$data);
	}
        public function Account()
        {
            $data=array();
            $data['title']="Account";
            $data['category_manufacture_in_side_bar']=1;
            $data['account']="<h1>THis is account page</h1>";
            $data['home_content']=$this->load->view('pages/home_content','',TRUE);
            $data['slider']="";
            $this->load->view('master',$data);
        }
        public function product_category($category_id)
        {
                $data=array();
                $data['title']="Product_category";
                $data['account']="";
                $data['category_manufacture_in_side_bar']=1;
                $data['slider']="";
                $data['all_published_product_by_category']=$this->Welcome_model->all_published_product_by_category($category_id);
                $data['home_content']=$this->load->view('pages/category_product',$data,TRUE);
                $this->load->view('master',$data);
        }
        public function product_manufacture($manufacture_id)
        {
             $data=array();
                $data['title']="Product_manufacture";
                $data['account']="";
                $data['category_manufacture_in_side_bar']=1;
                $data['slider']="";
                $data['all_published_product_by_manufacture']=$this->Welcome_model->all_published_product_by_manufacture($manufacture_id);
                $data['home_content']=$this->load->view('pages/category_manufacture',$data,TRUE);
                $this->load->view('master',$data);
        }
        public function product_details($product_id)
        {
               $data=array();
                $data['title']="Product_Details";
                $data['account']="";
                $data['category_manufacture_in_side_bar']=1;
                $data['slider']="";
                $data['product_details_by_id']=$this->Welcome_model->product_details_by_id($product_id);
                $data['home_content']=$this->load->view('pages/product_details',$data,TRUE);
                $this->load->view('master',$data);
        }
        public function cart()
        {
                $data=array();
                $data['title']="Product_Details";
                $data['account']="";
                $data['category_manufacture_in_side_bar']=0;
                $data['slider']="";
                $data['home_content']=$this->load->view('pages/cart_details',$data,TRUE);
                $this->load->view('master',$data);
       
        }
}
