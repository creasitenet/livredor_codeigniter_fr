<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table = '';
		
	// Create
	public function create($values) 
	{
		if ($this->db->set($values)->insert($this->table)) return $this->db->insert_id();
		return null;
	}
	
	// Count
	public function count($where = array(), $value = null) 
	{
		// Si $where est un array, la variable $valeur sera ignorée par la méthode where()
		return (int) $this->db->where($where, $value)
	                          ->from($this->table)
	                          ->count_all_results();
	}
	
	// Delete
	public function delete($where) 
	{
		if(is_integer($where)) { $where = array('id', $where); }
		return (bool) $this->db->where($where)
	                           ->delete($this->table);
	}

	// Find
	public function find($where = array()) 
	{
		if(is_integer($where)) { $where = array('id', $where); }
		$req = $this->db->get_where($this->table, $where);
		if ($req->num_rows()==1) { return $req->row(); }
		return $req->result();
	}
	
	// Get
	public function get($select = '*', $nb = null, $debut = null) 
	{
		return $this->db->select($select)
	    	            ->from($this->table)
	            	    ->limit($nb, $debut)
	                	->get()
	                	->result();
	}
	
	// Get where
	public function get_where($select = '*', $where = array(), $nb = null, $debut = null) 
	{
		return $this->db->select($select)
	    	            ->from($this->table)
	        	        ->where($where)
	            	    ->limit($nb, $debut)
	                	->get()
	                	->result();
	}
	
	// Get All
	public function get_all() 
	{
		return $this->db->select('*')->from($this->table)->get()->result();
	}	
	
	
  	// Get ID
	function get_id($id) {
		$req=$this->db->get_where($this->table, array('id' => $id));
		if ($req->num_rows()==1) { return $req->row(); }
		return null;
	}
	
	// Insert
	public function insert($echappe = array(), $noechappe = array()) 
	{
		//	Vérification des données à insérer
		if(empty($echappe) AND empty($noechappe)) { return false; }
		return (bool) $this->db->set($echappe)
	    					   ->set($noechappe, null, false)
	                    	   ->insert($this->table);
	}
	
	// Update
	public function update($where, $echappe = array(), $noechappe = array()) {		
		if(empty($echappe) AND empty($noechappe)) { return false; }
		if(is_integer($where)) { $where = array('id', $where); }
		return (bool) $this->db->set($echappe)
                               ->set($noechappe, null, false)
                               ->where($where)
                               ->update($this->table);
	}
	
}
