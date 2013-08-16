<?php 

/**
* 
*/
class Mensajes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('sesion');
		//$this->sesion->acceso('admin');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index($nombre_usuario = FALSE)
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';


		$this->load->view('templates/header', $data);
		$this->load->view('mensajes/index');
		$this->load->view('templates/footer', $data);
	}
}


 ?>