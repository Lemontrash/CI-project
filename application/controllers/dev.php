<?php

class Dev extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('background');
		$this->load->view('header');
	}

	public function index() 
	{
		$this->load->view('dev');
	}

}