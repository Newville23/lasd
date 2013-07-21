<?php 

class Generic_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	G E T T E R S
	*/
	//-------------------------------------------------------------------------
	/*
	* Obtiene los campos de una tabla determinada
	* 
	*/
	public function get($id = FALSE, $modelo)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get($modelo);
			return $query->result_array(); // Devuelve toda la tabla
		}
		$query = $this->db->get_where($modelo, array('id' => $id)); // 

		return $query->row_array();		
	}


}

 ?>