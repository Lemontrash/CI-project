<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('cart_model');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->view('background');
		$this->load->view('header');

	}


	public function index($price = 0)
	{	
		
		$data['products'] = $this->products_model->get_news($price);
		$this->load->view('admin_view',$data);
		
	}

	public function edit() 
	{
		if(isset($_GET['id']))
		{

			$id = $_GET['id'];
			$data["products"] = $this->products_model->get_edit($id);
			$this->load->view('admin_edit',$data);

		}
	}
	public function add_prod()
	{
		$this->load->view('admin_add');
		//redirect('http://localhost/ci/admin', 'refresh');

	}
	public function delete()
	{
		if(isset($_GET['id']))
		{
			$id = $_GET["id"];
			$this->products_model->delete_prod($id);
		}
		redirect('http://localhost/ci/admin', 'refresh');
	}
	public function added() 
	{
		$data = array();
		$random = mt_rand(5555555,9999999999999);
		$random = md5($random);
		$pic_file = $_FILES["pic"];
		$pic_file_name = $random.$pic_file["name"];

		if ($this->input->post('submit')) 
		{
			$data = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'pic' => $pic_file_name
			);
			$this->products_model->add_prod($data);
			move_uploaded_file($pic_file['tmp_name'],'./style/img/'.$pic_file_name);
		}
		redirect('http://localhost/ci/admin', 'refresh');
	}
	public function edited() 
	{
		
		$random = mt_rand(5555555,9999999999999);
		$random = md5($random);

		$data = array();
		$id = $this->input->post('id');
		$pic_file = $_FILES["pic"];
		$pic_file_name = $random.$pic_file["name"];

		if ($this->input->post('submit')) {

			$config['upload_path']	= 'http://localhost/ci/style/img';
			$config['allowed_types']	= 'gif|jpg|png';
			$this->upload->initialize($config);

			$data = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'description' => $this->input->post('description')
			
			);
			$reload = $this->input->post('reload');
			
			if($reload == 'on')
			{
				$data['pic'] = $pic_file_name;
			}
			$this->products_model->get_edited2($id,$data);

			move_uploaded_file($pic_file['tmp_name'],'./style/img/'.$pic_file_name);

			redirect('http://localhost/ci/admin/edit?id='.$id, 'refresh');
		}

	}
	public function orders() 
	{
		$data['orders'] = $this->cart_model->get_orders();
		$this->load->view('admin_orders',$data);
	}

}