<?php

class Inspect_model extends CI_Model {

	public function __construct()
	{
        $this->load->database();
	}

	public function get_prod($id)
	{
		$query = $this->db->get_where('products', array('id' => $id));
		return $query->result_array();
	}
	public function get_comments($id) 
	{
		$query = $this->db->query("SELECT * FROM reviews WHERE prod_id = '$id' ORDER BY id DESC ");
		return $query->result_array();
	}
	public function send_comment($data) 
	{
        $this->db->insert('reviews',$data);
	}
}