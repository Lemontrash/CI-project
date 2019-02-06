<?php

if ( ! defined('BASEPATH')) exit('Stop Its demostrate how to set cookie');

class Cw_cookies extends CI_Controller {
	public function __construct() {

			parent::__construct();
			$this->load->helper('cookie');
		}
	public function set() {
		
			$cookie= array(
				'name'   => 'Cloudways Cookie',
				'value'  => 'This is Demonstration of how to set cookie in CI',
				'expire' => '3600',
			);
			$this->input->set_cookie($cookie);
			echo "Congragulatio Cookie Set";
		}
	public function get() {
			echo $this->input->cookie('Cloudways Cookie',true);
		}
	}
