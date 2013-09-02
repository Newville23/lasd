<?php 

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		$this->load->model('user/user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{

	}

	function actPonderacionNota($calificaion_id)
	{
		$this->user_model->ponderacionNota($calificaion_id);
	}

	function agregarNota($calificaion_id, $id_estudiante)
	{

	}

	function actualizarNota($calificaion_id, $id_estudiante)
	{
		$this->user_model->actNota($calificaion_id, $id_estudiante);
	}

	function agregarLogro($Clase_numero)
	{

	}

	function actLogro($calificaion_id)
	{

	}
}

 ?>