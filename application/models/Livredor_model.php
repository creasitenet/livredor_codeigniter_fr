<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Livredor_model extends MY_Model {
	
	protected $table = 'livredors';
		
	public function get_list($nb = 10, $start = 0)
	{
		if(!is_integer($nb) OR $nb < 1 OR !is_integer($start) OR $start < 0)
		{
			return false;
		}
		return $this->db->select('*')
				->from($this->table)
				->limit($nb, $start)
				->order_by('id', 'desc')
				->get()
				->result();
	}
	
}

/* End of file livredors_model.php */
/* Location: ./application/models/livredors_model.php */