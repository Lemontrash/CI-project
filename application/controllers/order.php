<?php

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->view('background');
		$this->load->view('header');

	}

	public function index() 
	{
		$hash = $_COOKIE["hash"];
		$this->load->model('cart_model');
		$data['order'] = $this->cart_model->get_order($hash);

		

		$this->load->view('order',$data);
	}
	public function send_order() 
	{
		$hash = $_COOKIE["hash"];
		$this->load->model('cart_model');

		$data = array();

		if($this->input->post('submit'))
		{
			$t=time();
			$time =array(
				date("Y-m-d",$t).'(',
				date('h:i:s').')'
			);
			$time =  implode($time);

			$data = array(
				'username' => $this->input->post('username'),
				'comment' => $this->input->post('comment'),
				'phone' => $this->input->post('phone'),
				'adress' => $this->input->post('adress'),
				'hash' => $hash,
				'time'=> $time
			);
			$this->cart_model->send_order($data);
		}
		$this->load->view('sended_order');

	}
}