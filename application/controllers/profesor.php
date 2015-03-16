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

		//error_reporting(0);

		$this->load->model('user/user_model');
		$this->load->model('profesor/profesor_model');
		$this->load->model('user/foro_model');

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->library('tiempo');

		date_default_timezone_set('America/Bogota');
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
		//echo "<pre>"; print_r($row['datos']); echo "</pre>";
		$row['clasesDelProfe'] = $this->profesor_model->getClasesFromProfesor($row['datos']['identificacion']);
		
		$row['listaAlumnos'] = $this->user_model->getEstudiantesNotasFromClase($numeroClase);
		echo "<pre>"; print_r($row['listaAlumnos']); echo "</pre>";
		// Obtiene la lista de alumnos con sus notas, de una determinada clase
		$row['listaCalificaciones'] = $this->user_model->getCalificacionesFromClase($numeroClase);

		$row['foros'] = $this->foro_model->getForoFromClase($numeroClase);
		//echo "<pre>"; print_r($row); echo "</pre>";

		// LLAMADA SIMPLE A LA TABLA Clase_indicador
		$row['contenido_indicadores'] = $this->profesor_model->getIndicadoresModel($numeroClase);
		//echo "<pre>"; print_r($row['contenido_indicadores']); echo "</pre>";
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

		if ($numeroClase == null) {
			return;
		}

		if ($fecha > date('Y-m-d')) {
			$data['mensaje'] = "Escoge una fecha válida, has seleccionado una día futuro."; 
			$data['clase'] = 'alert-warning';
			$this->load->view('templates/alerta-no-time', $data); 
			return;
		}

		if ($fecha == 0) {
			$fecha = date('Y-m-d');
		}

		$data['asistencia'] = $this->profesor_model->getAsistencia($numeroClase, $fecha);
		//echo json_encode($data['asistencia']);
		$this->load->view('profesor/includes/asistencia', $data);
		//echo "<pre>"; print_r($data); echo "</pre>";
		//$row['asistencia'] = $this->profesor_model->setAsistencia($numeroClase);
	}

	function getIndicador($numeroClase)
	{
		if ($this->input->is_ajax_request()) {
			
			$data['contenido_indicadores'] = $this->profesor_model->getIndicadoresModel($numeroClase);
			$data['numeroClase'] = $numeroClase;

			$this->load->view('profesor/includes/contenido-programatico/indicadores-lista', $data);

			//echo "<pre>"; print_r($data); echo "</pre>";
		}
	}

	function setIndicador($numeroClase)
	{
		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('contenido', 'Descripción del indicador', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');

			if ($this->form_validation->run()) {
				$query = $this->profesor_model->setIndicadoresModel($numeroClase);
				if ($query) {
					$data['mensaje'] = 'Ingreso Exitoso'; 
					$data['clase'] = 'alert-success';
					$data['id'] = 'setIndicador';

					$this->load->view('templates/alerta', $data);
				}else{
					$data['mensaje'] = 'Ups! hubo un problema intenta de nuevo'; 
					$data['clase'] = 'alert-warning';
					$this->load->view('templates/alerta-no-time', $data);
				}

			}else{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta-no-time', $data);
			}
		}
	}



	//Reorganiza el array serialize, verifica si el registro existe para insertar o actualizar.
	function setAsistenciaController($numeroClase = null, $fecha = null, $numeroEstudiantes=null)
	{
		if ($fecha > date('Y-m-d') || $fecha == null) {
			$data['mensaje'] = "Escoge una fecha valida."; 
			$data['clase'] = 'alert-danger';
			$this->load->view('templates/alerta-no-time', $data); 
			return;
		}

		if ($numeroClase == null || $numeroEstudiantes == null) {
			return;
		}

		// validacion de que la lista este completa
		$data = $this->input->post();

		if ($numeroEstudiantes*2 != count($data)) {
			$data['mensaje'] = "No has termininado la lista de asistencia."; 
			$data['clase'] = 'alert-danger';
			$this->load->view('templates/alerta-no-time', $data);
			return;
		}
		// === Validacion de no editar la lista de asistencia========
		$dataValidacionAsistencia = array('Clase_numero' => $numeroClase,
			                     'fecha' => $fecha);

		$filaEstudiantesAsistencia = $this->profesor_model->verificarKey('Asistencia', $dataValidacionAsistencia);
		
		if ($numeroEstudiantes == $filaEstudiantesAsistencia) {
			$data['mensaje'] = "¡Ya realizaste esta lista de asistencia!"; 
			$data['clase'] = 'alert-danger';
			$this->load->view('templates/alerta-no-time', $data);
			return;

		}elseif ($filaEstudiantesAsistencia == 0) {

			$i = 0;
			$contadorDeQuerys = 0;

			foreach ($data as $key => $value) {
				$data2[$i] = $value;
				$i = $i + 1;
			}

			for ($i=0; $i < count($data2); $i=$i+2) { 

				$indiceYkey = array('Clase_numero' => $numeroClase,
									'Estudiante_identificacion' => $data2[$i],
				                     'fecha' => $fecha);

					$filas = $this->profesor_model->verificarKey('Asistencia', $indiceYkey);
				
				if ($filas == 0) {

					$indiceYkey['Asistencia'] = $data2[$i + 1];

					$query = $this->profesor_model->setAsistenciaModel($indiceYkey);
					//echo "insertado ";

				}
				//elseif ($filas == 1) {
				//	//echo "actualizar ";
				//	$query = $this->profesor_model->upd8AsistenciaModel($indiceYkey, array('Asistencia' => $data2[$i + 1]));				
				//}

				$contadorDeQuerys = $contadorDeQuerys + 1;
			}
		}
		// ==========================================================
		
		if ($contadorDeQuerys == $numeroEstudiantes) {
			$data['mensaje'] = "Lista de asistencia guardada correctamente"; 
			$data['clase'] = 'alert-success';
			$this->load->view('templates/alerta', $data);
		}elseif ($contadorDeQuerys == 0) {

			$data['mensaje'] = "La Lista de asistencia no se gruardó correctamente"; 
			$data['clase'] = 'alert-danger';
			$this->load->view('templates/alerta', $data);
		
		}elseif ($contadorDeQuerys < $numeroEstudiantes) {
			$data['mensaje'] = "La Lista de asistencia no se gruardó correctamente"; 
			$data['clase'] = 'alert-danger';
			$this->load->view('templates/alerta', $data);
		}
	}
}

?>