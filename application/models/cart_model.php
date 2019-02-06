<?php

class Cart_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function addtocart($hash,$prod_id) 
	{
		$flag = true;

		$query = $this->db->query("SELECT * FROM users WHERE hash='$hash'");
		foreach($query->result_array() as $row)
		{
			$user_id = $row["id"];
		}

		$query = $this->db->query("SELECT * FROM cart WHERE user_id = '$user_id' AND products_id = '$prod_id'");
		foreach($query->result_array() as $row)
		{
			$q = $row['quantity']+1;
			$query = $this->db->query("UPDATE cart  SET quantity='$q' WHERE user_id = '$user_id' AND products_id = '$prod_id'");

			$flag = false;
		}

		if($flag)
		{
			$query = $this->db->query("INSERT INTO cart (user_id,products_id,quantity) VALUES('$user_id','$prod_id',1)");
		}
	}

	public function get_cart($hash)
	{
		$query = $this->db->query("SELECT * FROM users WHERE hash='$hash'");
		foreach($query->result_array() as $row)
		{
			$user_id = $row["id"];
		}

		$query = $this->db->query(
			"SELECT p.id,p.name,p.pic,p.price,p.description,c.quantity
			FROM products as p 
			JOIN cart as c ON c.products_id = p.id 
			JOIN users as u ON u.id = c.user_id 
			WHERE u.hash = '$hash'");
		return $query->result_array();
	}

	public function delete($hash,$prod_id)
	{	
		$query = $this->db->query("SELECT * FROM users WHERE hash='$hash'");
		foreach($query->result_array() as $row)
		{
			$user_id = $row["id"];
		}

		$query = $this->db->query("DELETE FROM cart WHERE user_id = '$user_id' AND products_id = '$prod_id'");
	}

	public function get_order($hash) 
	{
		$query = $this->db->query("SELECT * FROM users WHERE hash='$hash'");
		foreach($query->result_array() as $row)
		{
			$user_id = $row["id"];
		}
		$query = $this->db->query("SELECT * FROM cart WHERE user_id = '$user_id'");
		return $query->result_array();
	}
	public function send_order($data)
	{
		$this->db->insert('orders',$data);

		$this->db->where('hash',$data['hash']);
		$user_update = array(
			'hash' => $data['hash'],
			'username'=>$data['username']
		);
		$this->db->update('users',$user_update);
	}
	public function get_orders()
	{
		
		$order = array();

		$user_info = $this->db->query("SELECT o.username,o.adress,o.phone,o.comment,o.hash,o.time,p.name,c.products_id,c.quantity FROM orders as o
			JOIN users as u ON u.hash = o.hash
			JOIN cart as c ON c.user_id = u.id
			JOIN products as p ON  p.id = c.products_id
			");
		
		$user_o = $user_info->result_array();
		array_push($order,$user_o);
		
		return $order;
	}
	public function remove_one($hash,$prod_id)
	{
		$query = $this->db->query("SELECT * FROM users WHERE hash='$hash'");
		foreach($query->result_array() as $row)
		{
			$user_id = $row["id"];
		}
		$query = $this->db->query("SELECT * FROM cart WHERE user_id = '$user_id' AND products_id = '$prod_id'");
		foreach($query->result_array() as $row)
		{
			$q = $row['quantity']-1;
			if($q <= 0){
				$query = $this->db->query("DELETE FROM cart WHERE user_id = '$user_id' AND products_id = '$prod_id'");
			}else {
				$query = $this->db->query("UPDATE cart  SET quantity='$q' WHERE user_id = '$user_id' AND products_id = '$prod_id'");
			}
			
		}
	}
}