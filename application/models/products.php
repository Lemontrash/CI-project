<?php
class Products_model extends CI_Model {

	public function __construct() {
        $this->load->database();
	}

	public function get_news($price = 0) {
		$query = $this->db->get_where('products', array('price >=' => $price));
		return $query->result_array();
	}
}
?>