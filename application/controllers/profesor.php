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
		$this->load->model('user/user_model');
		$this->load->model('profesor/profesor_model');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio profesores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'profesor';

		$row['datos'] = $this->user_model->getDatosUsuario('Profesor');
		$row['clase'] = $this->profesor_model->getClasesFromProfesor($row['datos']['identificacion']);
		//echo "<pre>"; print_r($row); echo "</pre>";

		$this->load->view('templates/header', $data);
		$this->load->view('profesor/index', $row);
		$this->load->view('templates/footer', $data);
	}

	function clase($numeroClase = false)
	{
		if ($numeroClase == false) {
			show_404();
			exit;
		}
		$row['datos'] = $this->user_model->getDatosUsuario('Profesor');
		$row['clasesDelProfe'] = $this->profesor_model->getClasesFromProfesor($row['datos']['identificacion']);

		$row['listaAlumnos'] = $this->user_model->getEstudianteNotasFromClase($numeroClase);
		//echo "<pre>"; print_r($row); echo "</pre>";

		// ----------------------------------------------------------------
		// Se verifica que el numero de clase corresponda con el profesor.
		$array = array('numero' => $numeroClase,
						'Profesor_identificacion' => $row['datos']['identificacion']);

		$numerosDeTablas = $this->user_model->verificarKey('Clase', $array);
		if ($numerosDeTablas != 1) {
			show_404();
			exit;
		}
		//-----------------------------------------------------------------

		$data['title'] = 'Inicio profesores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'profesor';
		$data['numeroClase'] = $numeroClase;
		

		$this->load->view('templates/header', $data);
		$this->load->view('profesor/curso', $row);
		$this->load->view('templates/footer', $data);
	}
}

 ?>