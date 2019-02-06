<?php

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->view('background');
	}


	 public function index() 
    {
    	$this->load->view('header');
        $this->load->database();
        $this->load->model('products_model');

        // if(isset($_GET['o']))
        // {
        // 	$order = $_GET['o'];
        // }else
        // {
        // 	$order = 'id';
        // }
        // if(isset($_GET['desc']))
        // {
        // 	$desc = $_GET["desc"];
        // }else {
        // 	$desc = 'ASC';
        // }
        $params = array();
        $limit_per_page = 20;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->products_model->get_total();
 
        if ($total_records > 0) 
        {
            $params["results"] = $this->products_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = 'http://localhost/ci/products/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            $params["links"] = $this->pagination->create_links();
        }
         
        $this->load->view('pagination', $params);
    }

	public function custom()
	{
		$this->load->database();
		$this->load->model('products_model');

		$params = array();
		$limit_per_page = 2;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = $this->products_model->get_total();

		if ($total_records > 0)
		{
			$params["results"] = $this->products_model->get_current_page_records($limit_per_page, $page*$limit_per_page);
			 
			$config['base_url'] = 'http://localhost/ci/products/custom';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;

			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';

			$config['first_link'] = 'First Page';
			$config['first_tag_open'] = '<span class="firstlink">';
			$config['first_tag_close'] = '</span>';

			$config['last_link'] = 'Last Page';
			$config['last_tag_open'] = '<span class="lastlink">';
			$config['last_tag_close'] = '</span>';

			$config['next_link'] = 'Next Page';
			$config['next_tag_open'] = '<span class="nextlink">';
			$config['next_tag_close'] = '</span>';

			$config['prev_link'] = 'Prev Page';
			$config['prev_tag_open'] = '<span class="prevlink">';
			$config['prev_tag_close'] = '</span>';

			$config['cur_tag_open'] = '<span class="curlink">';
			$config['cur_tag_close'] = '</span>';

			$config['num_tag_open'] = '<span class="numlink">';
			$config['num_tag_close'] = '</span>';

			$this->pagination->initialize($config);
			
			$params["links"] = $this->pagination->create_links();
		}

		$this->load->view('pagination', $params);
	}

}

