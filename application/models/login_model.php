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

		//echo "<pre>"; print_r($DB2); echo "</pre>";

	}

	/**
	G E T T E R S
	*/

	public function getUsuario()
	{
		$data = array(
			'usuario' => $this->input->post('usuario'), 
			'pass' => $this->input->post('pass'));
		
		$query = $this->db->get_where('Usuario', $data);
		return $query->row_array();	
	}

	function getUsuarioAutenticado()
	{
		
	}

	/**
	S E T T E R S
	*/

	public function setSesion($Usuario_id)
	{
		//$DB2 = $this->load->database('lasd', TRUE);

		$data = array(
			'session_id' => $this->session->userdata('session_id'),
			'ip_address' => $this->session->userdata('ip_address'),
			'user_agent' => $this->session->userdata('user_agent'),
			'Usuario_id' => $Usuario_id,
		);

		// $DB2->insert('Sesion', $data);
		$this->db->insert('Sesion', $data);
	}

}

 ?>