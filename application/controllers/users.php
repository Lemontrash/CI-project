<?php

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		$data['users'] = $this->users_model->get_news();
		$this->load->view('users',$data);
	}
	public function view($visits = 0)
	{
		$data['users'] = $this->users_model->get_news($visits);
		$this->load->view('users',$data);

	}


}

