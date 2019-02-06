<?php

class Sum extends CI_Controller {

		public function equal($n1 = 'home',$n2 = 'home'){
			$sum = $n1 + $n2 ;
			$data['sum'] = $sum;
			$this->load->view('main',$data);
		}
		public function index() {
			echo 'try again';
		}
}



?>