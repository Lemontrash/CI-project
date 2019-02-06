<?php

class Cookies extends CI_Controller {

	public function __construct()
	{
		$this->load->model('users_model');
		$hash = $this->input->cookie('hash');
		if(!$hash)
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
			var_dump($hash);
			$this->users_model->create_user($hash);
			
			
		}else
		{

		}
	}
}