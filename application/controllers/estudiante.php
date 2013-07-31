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

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);

		$row['profesores'] = $this->estudiante_model->getProfes($row['clase']);

		// echo "<pre>"; print_r($row); echo "</pre>";

		$this->load->view('templates/header', $data);

		$this->load->view('estudiante/index', $row);

		$this->load->view('templates/footer', $data);
	}

	public function materia($numeroClase = false)
	{
		if ($numeroClase == false) {
			show_404();
			exit;
		}

		$data['title'] = 'Materias';
		$data['lasd'] = 'Lasd';
		$data['numeroClase'] = $numeroClase;

		// leer tabla estudiantes con la id
		$row = $this->estudiante_model->getEstudiante();

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);

		// verifica que la clase escrita en la URI sea valida si no, redirecciona a error 404
		$verificacionDeClase = $this->estudiante_model->verificarClase($numeroClase, $row['curso']['codigo']);
		if (!$verificacionDeClase) {
			show_404();
			exit;
		}

		$this->load->view('templates/header', $data);

		$this->load->view('estudiante/materia', $row, $data);

		$this->load->view('templates/footer', $data);
	}
}
// cuando se digite un numero incorrecto redireccione
 ?>