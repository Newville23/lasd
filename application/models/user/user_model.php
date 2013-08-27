<?php 

/**
* 
*/
class User_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

/**
	G E T T E R S
*/
	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'profesor'
	function getUserFromIdent($identificacion, $TablaUsuario)
	{
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$usuario = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $usuario['Usuario_id']));
		$usuario2 = $query2->row_array();

		$usuario['nombre'] = $usuario2['nombre'];
		$usuario['apellido'] = $usuario2['apellido'];

		return $usuario;
	}


	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'profesor'
	function getNombreFromIdent($identificacion, $TablaUsuario)
	{
		$this->db->select('Usuario_id');
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$usuario = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $usuario['Usuario_id']));
		$usuario = $query2->row_array();

		return $usuario;
	}




	/**
	S E T T E R S
	*/



}
?>