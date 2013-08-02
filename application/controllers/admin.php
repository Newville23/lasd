<?php 

/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('sesion');
		$this->sesion->acceso('admin');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';


		$this->load->view('templates/header', $data);
		$this->load->view('admin/index');
		$this->load->view('templates/footer', $data);
	}
}

 ?>