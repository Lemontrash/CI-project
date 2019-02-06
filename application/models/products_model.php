<?php
class Products_model extends CI_Model {

	public function __construct() {
		parent::__construct();
        $this->load->database();
	}

	public function get_news() {
		$query = $this->db->get('products');
		return $query->result_array();
	}
 
    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("products");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("products");
    }
    public function get_edit($id) 
    {
    	$query = $this->db->get_where('products', array('id' => $id));
    	return $query->result_array();
    }
    public function get_edited($id)
    {	
    	
    	$this->db->select('*');
    	$this->db->from('products');
    	$this->db->where('id',$id );
    	$query = $this->db->get();
    	return $result = $query->row_array();
    }
    public function get_edited2($id,$data)
    {

    $this->db->where('id', $id);
    $this->db->update('products', $data);
    }
    public function add_prod($data)
    {   
        $this->db->insert('products', $data);
    }
     public function delete_prod($id)
    {   
       $this->db->delete('products', array('id' => $id));

    }
    public function get_events() 
    {
        $query = $this->db->get('events');
        
        return $data = $query->result_array();
    }
}

?>