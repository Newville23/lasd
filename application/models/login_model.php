<?php 

/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	G E T T E R S
	*/

	public function getUsuario()
	{
		$data = array(
			'usuario' => $this->input->post('usuario'), 
			'pass' => $this->input->post('pass'));

		$query = $this->db->get_where('usuarios', $data); // 

		return $query->row_array();	

	}


}

 ?>