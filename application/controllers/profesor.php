<?php 

/**
* 
*/
class Profesor extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('sesion');
		//$this->sesion->acceso('profesor');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio profesores';
		$data['lasd'] = 'Lasd';

		$this->load->view('templates/header', $data);
		$this->load->view('profesor/index');
		$this->load->view('templates/footer', $data);
	}

	function curso()
	{
		$data['title'] = 'Inicio profesores';
		$data['lasd'] = 'Lasd';

		$this->load->view('templates/header', $data);
		$this->load->view('profesor/curso');
		$this->load->view('templates/footer', $data);
	}
}

 ?>