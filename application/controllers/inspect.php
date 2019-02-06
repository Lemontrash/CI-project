<?php

class Inspect extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('inspect_model');
		$this->load->helper('url');
		$this->load->view('background');
		$this->load->view('header');
	}

	public function index() 
	{
		if(isset($_GET["act"]) && isset($_GET["id"]))
			{
				$act = $_GET["act"];
				$id = $_GET["id"];
				$data['product'] = $this->inspect_model->get_prod($id);
				$data['reviews'] = $this->inspect_model->get_comments($id);
				$this->load->view('inspect',$data);
			}
	}
	public function add_review()
	{	
		$data = array();

		$t=time();
			$time =array(
				date("Y-m-d",$t).'(',
				date('h:i:sa').')'
			);
		$time =  implode($time);
		$id = $this->input->post('prod_id');
		if ($this->input->post('submit')) 
		{
			$data = array(
				'name' => $this->input->post('username'),
				'comment' => $this->input->post('review'),
				'rating' => $this->input->post('rating'),
				'time' => $time,
				'prod_id' => $id
			);
			$this->inspect_model->send_comment($data);
		}
		redirect('http://localhost/ci/inspect?act=inspect&id='.$id, 'refresh');
	}

}
