<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->view('background');
		$this->load->model('products_model');
		$this->set_cookie();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->view('header');
	}
	
	 public function index() 
    {
		$this->load->database();
		$data['events'] = $this->products_model->get_events();
		$this->load->view('main', $data);
    }

	public function pagination()
	{
		
		$params = array();
		$limit_per_page = 5;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->products_model->get_total();

		if ($total_records > 0) 
		{
			$params["results"] = $this->products_model->get_current_page_records($limit_per_page, $start_index);

			$config['base_url'] = 'http://localhost/ci/welcome/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$params["links"] = $this->pagination->create_links();
		}

		$this->load->view('pagination', $params);
		
	}
	public function set_cookie()
	{
		$this->load->model('users_model');
		$this->load->helper('url');

		if(!$this->input->cookie('hash'))
		{
			$this->load->helper('cookie');
			$cookie = array(
					 'name'   => 'hash',
					 'value'  => md5(uniqid()),
					 'expire' => time()+86500,
					 'domain' => 'localhost',
					 'path'=> '/',
					 );
			$this->input->set_cookie($cookie);
			//setcookie('hash',$cookie['value'],$cookie['expire']); //для фикса бага IE

			//redirect('http://localhost/ci', 'refresh'); //Должен быть отключён для работы на IE
		}else
		{	
			$this->users_model->check_user($this->input->cookie('hash'));
		}
	}

	

}
