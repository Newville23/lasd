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

		$this->sesion->acceso('profesor');

		$this->load->model('user/user_model');
		$this->load->model('profesor/profesor_model');
		$this->load->model('user/foro_model');

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->library('tiempo');
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

		$row['listaAlumnos'] = $this->user_model->getEstudiantesNotasFromClase($numeroClase);

		// Obtiene la lista de alumnos con sus notas, de una determinada clase
		$row['listaCalificaciones'] = $this->user_model->getCalificacionesFromClase($numeroClase);

		$row['foros'] = $this->foro_model->getForoFromClase($numeroClase);
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

		$this->form_validation->set_rules('tituloforo', 'Titulo del foro', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('cuerpoforo', 'Cuerpo del foro', 'trim|xss_clean|htmlspecialchars');

		
		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('profesor/clase', $row);
			$this->load->view('templates/footer', $data);
		}
		else
		{

			$this->foro_model->setForo($numeroClase, $row['listaAlumnos']['Materia_id']);
			redirect('profesor/clase/' . $numeroClase);
		}

		
	}

	function getAsistenciaController($numeroClase = null, $fecha = 0)
	{
		if ($fecha == 0) {
			$fecha = date('Y-m-d');
		}
		if ($numeroClase == null) {
			return;
		}

		$data['asistencia'] = $this->profesor_model->getAsistencia($numeroClase, $fecha);
		//echo json_encode($data['asistencia']);
		$this->load->view('profesor/includes/asistencia', $data);
		//echo "<pre>"; print_r($data); echo "</pre>";
		//$row['asistencia'] = $this->profesor_model->setAsistencia($numeroClase);
	}
}

 ?>