<?php

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->view('background');
		$this->load->view('header');
	}

	public function index() 
	{	
		$this->load->helper('url');
		$hash = $this->input->cookie('hash');

		if(isset($_GET["act"]) && isset($_GET["id"]))
		{
			$act = $_GET["act"];
			$prod_id = $_GET["id"];

			if($act == 'addtocart')
			{
				$this->cart_model->addtocart($hash,$prod_id);
				
				//redirect('http://localhost/ci', 'refresh');
			}
			if($act == 'delete')
			{
				$this->cart_model->delete($hash,$prod_id);
			//	redirect('http://localhost/ci/cart', 'refresh');
			}
			if($act == 'remove_one')
			{
				$this->cart_model->remove_one($hash,$prod_id);
				//redirect('http://localhost/ci/cart', 'refresh');
			}
		}else
		{

			$data["cart"] = $this->cart_model->get_cart($hash);
			$this->load->view('cart',$data);
		}

		

		


		

		

	}


}