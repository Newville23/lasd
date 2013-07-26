<?php 

class Estudiante extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('sesion');
		$this->sesion->acceso('estudiante');
		$this->load->model('estudiantes/estudiante_model');
	}

	public function index()
	{
		$data['title'] = 'Inicio Estudiates';
		$data['lasd'] = 'Lasd';

		// leer tabla estudiantes con la id
		$row = $this->estudiante_model->getEstudiante();

		//echo "<pre>"; print_r($row); echo "</pre>";

		//leer sus clases y profesores.

		$this->load->view('templates/header', $data);

		$this->load->view('estudiante/index', $row);

		$this->load->view('templates/footer', $data);
	}
}

 ?>