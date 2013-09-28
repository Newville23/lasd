<?php 

/**
* 
*/
class Box extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('sesion');
		// $this->sesion->acceso('admin');

		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'box/box';
		
		$this->load->view('templates/header', $data);
		$this->load->view('box/index', $data);
		$this->load->view('templates/footer', $data);

	}

	function praticar($materia = 'matematicas' )
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'box/box';
		
		$this->load->view('templates/header', $data);
		$this->load->view('box/practicar', $data);
		$this->load->view('templates/footer', $data);
	}
}

 ?>