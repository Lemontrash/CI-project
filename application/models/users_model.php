<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function check_user($hash)
	{
		$flag = true;
		$query = $this->db->query("SELECT * FROM users WHERE hash = '$hash'");
		foreach($query->result_array() as $row)
		{
			if($row["id"]) {
				$flag = false;
				$visits = $row["visits"]+1;
				$query = $this->db->query("UPDATE users SET visits='$visits' WHERE hash = '$hash'");
			}
		}
		if($flag)
		{
			$query = $this->db->query("INSERT INTO users (hash) VALUES ('$hash')");	
			return $query;
		}
	}
	



}
?>