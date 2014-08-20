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

		//error_reporting(0);

		$this->load->model('admin/admin_model');
		$this->load->model('user/user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 3;

		$data['datos'] = $this->user_model->getDatosUsuario('Profesor');
		//echo "<pre>"; print_r($data); echo "</pre>";
		
		$this->load->view('templates/header', $data);
		//$this->load->view('admin/index', $data);
		$this->load->view('admin/adminEstudiantes', $data);
		$this->load->view('templates/footer', $data);

		
	}

	function index2()
	{
		$data['title'] = 'Administrar Estudiantes';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 3;

		$data['datos'] = $this->user_model->getDatosUsuario('Profesor');
		

		$dataJSON = json_encode($data, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		echo "<pre>"; echo $dataJSON; echo "</pre>";

		$this->load->view('templates/header', $data);
		//$this->load->view('admin/adminEstudiantes', $data);
		$this->load->view('templates/footer', $data);
	}

	function agregarInstitucion()
	{
		$data['title'] = 'Agregar Institucion';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 1;
		
		$this->load->view('templates/header', $data);
		$this->load->view('admin/agregarInstitucion', $data);
		$this->load->view('templates/footer', $data);
		
	}

	function adminEstudiantes()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 3;

		$data['datos'] = $this->user_model->getDatosUsuario('Profesor');
		//echo "<pre>"; print_r($data); echo "</pre>";
		
		$this->load->view('templates/header', $data);
		//$this->load->view('admin/index', $data);
		$this->load->view('admin/adminEstudiantes', $data);
		$this->load->view('templates/footer', $data);

	}

	function adminDocentes()
	{
		$data['title'] = 'Administrar Docentes';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 4;

		$data['datos'] = $this->user_model->getDatosUsuario('Profesor');
		//echo "<pre>"; print_r($data); echo "</pre>";

		$this->load->view('templates/header', $data);
		$this->load->view('admin/adminDocentes', $data);
		$this->load->view('templates/footer', $data);

	}

	function Estadisticas()
	{
		$data['title'] = 'Administrar Docentes';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'admin';
		$data['active'] = 6;

		$this->load->view('templates/header', $data);
		$this->load->view('admin/estadisticas', $data);
		$this->load->view('templates/footer', $data);

	}

	function institucion()
	{
		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('rut_institucion', 'Rut de la institucion', 'trim|required|max_length[11]|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('nombre_institucion', 'Nombre de la institucion', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('rector_institucion', 'Nombre del rector', 'trim|required|xss_clean|htmlspecialchars');

			if ($this->form_validation->run()) {
				$data['alerta'] = $this->admin_model->setInstitucion();

				if ($data['alerta'] == 0) {
					$data['mensaje'] = "Formulario guardado satisfactoriamente";
					$data['clase'] = 'alert-success';
					$this->load->view('templates/alerta', $data);
				}
				elseif ($data['alerta'] == 1) {
					$data['mensaje'] = "Institucion ya existe";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
				}
			}
			else
			{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
		
	}

	private function validarUsuario()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|htmlspecialchars|valid_email');
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('twiter', 'Twiter', 'trim|xss_clean|htmlspecialchars');
	}
	function mensajesValidacion()
	{
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El campo %s no es un Email valido');

	}


	function estudiante()
	{
		if ($this->input->is_ajax_request()) {

			$this->validarUsuario();
			$this->mensajesValidacion();

			$this->form_validation->set_rules('identificacion', 'Numero de identificacion', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('tipo_identificacion', 'Tipo de identificacion', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'trim|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('tipo_sangre', 'tipo_sangre', 'trim|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('rh', 'Factor RH', 'trim|xss_clean|htmlspecialchars');
		
			if ($this->form_validation->run()) {
				
				$usuario = $this->input->post('usuario');
				$email = $this->input->post('email');
				$identificacion = $this->input->post('identificacion');

				//verificar usuario, si el usuario existe... array($indice => $key) 
				if ($this->admin_model->verificarKey('Usuario', array('usuario' => $usuario )))
				{
					
					$data['mensaje'] = "El nombre usuario " . $usuario . " ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}
				// vericar Email
				if ($this->admin_model->verificarKey('Usuario', array('email' => $email ))) {

					$data['mensaje'] = "El email " . $email . " ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}
				// verificar numero identificacion
				if ($this->admin_model->verificarKey('Estudiante', array('identificacion' => $identificacion))) {

					$data['mensaje'] = "Un estudiante ya se encuentra inscrito con el número de identificacion " . $identificacion;
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}

				$this->admin_model->setEstudiante();

				$data['mensaje'] = "¡Estudiante inscrito!";
				$data['clase'] = 'alert-success';
				$this->load->view('templates/alerta', $data);

			}else{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}

	function profesor()
	{
		if ($this->input->is_ajax_request()) {

			$this->validarUsuario();
			$this->mensajesValidacion();

			$this->form_validation->set_rules('identificacion', 'Numero de identificacion', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('tipo_identificacion', 'Tipo de identificacion', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'trim|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('profesion', 'Profesion', 'trim|xss_clean|htmlspecialchars');
		
			if ($this->form_validation->run()) {
				
				$usuario = $this->input->post('usuario');
				$email = $this->input->post('email');
				$identificacion = $this->input->post('identificacion');

				//verificar usuario, si el usuario existe...
				if ($this->admin_model->verificarKey('Usuario', array('usuario' => $usuario ))){
					
					$data['mensaje'] = "El nombre usuario " . $usuario . " ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}
				// vericar Email
				if ($this->admin_model->verificarKey('Usuario', array('email' => $email ))) {

					$data['mensaje'] = "El email " . $email . " ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}
				// verificar numero identificacion
				if ($this->admin_model->verificarKey('Profesor', array('identificacion' => $identificacion))) {

					$data['mensaje'] = "Un docente ya se encuentra inscrito con el número de identificacion " . $identificacion;
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}

				$this->admin_model->setProfesor();

				$data['mensaje'] = "¡Docente Registrado!";
				$data['clase'] = 'alert-success';
				$this->load->view('templates/alerta', $data);
			}
			else
			{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}




	function materia(){
		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nombre_materia', 'Nombre de la materia', 'trim|required|xss_clean|htmlspecialchars');
			
			if ($this->form_validation->run()) {

				// Verificar que el nombre de la materia no esté repetido
				$nombre_materia = $this->input->post('nombre_materia');

				if ($this->admin_model->verificarKey('Materia', array('nombre' => $nombre_materia))) {
				
					$data['mensaje'] = "El nombre de la Materia " . $nombre_materia . " ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}

				$this->admin_model->setMateria();

				$data['mensaje'] = "¡Materia Registrada!";
				$data['clase'] = 'alert-success';
				$this->load->view('templates/alerta', $data);
			}
			else
			{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}


	function curso(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nombre_curso', 'Nombre del curso', 'trim|required|htmlspecialchars|xss_clean');
			$this->form_validation->set_rules('nombre_indice', 'indice', 'trim|max_length[3]|required|htmlspecialchars|xss_clean');
			$this->form_validation->set_rules('director_grupo', 'Docente director de grupo', 'trim|htmlspecialchars|xss_clean');

			if ($this->form_validation->run()) {
				
				$nombre_curso = $this->input->post('nombre_curso');
				$indice = $this->input->post('nombre_indice');

				$arreglo = array('nombre' => $nombre_curso,
								'indice' => $indice);

				if ($this->admin_model->verificarKey('Curso', $arreglo))
				{
					$data['mensaje'] = "El Curso (" . $nombre_curso . " " . $indice. ") ya está en uso";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}
				$this->admin_model->setCurso();

				$data['mensaje'] = "¡Curso Registrado!";
				$data['clase'] = 'alert-success';
				$this->load->view('templates/alerta', $data);
			}
			else
			{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}


	function clase(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('materia_identificacion', 'Materia', 'trim|required|htmlspecialchars|xss_clean');
			$this->form_validation->set_rules('Curso_codigo', 'Curso', 'trim|required|htmlspecialchars|xss_clean');
			$this->form_validation->set_rules('Profesor_identificacion', 'Docente', 'trim|required|htmlspecialchars|xss_clean');

			if ($this->form_validation->run()) {
				
				$materia = $this->input->post('materia_identificacion');
				$curso = $this->input->post('Curso_codigo');

				$arreglo = array('Materia_id' => $materia,
									'Curso_codigo' => $curso);

				if ($this->admin_model->verificarKey('Clase', $arreglo))
				{
					$data['mensaje'] = "¡La clase ya existe!";
					$data['clase'] = 'alert-danger';
					$this->load->view('templates/alerta', $data);
					return;
				}

				$this->admin_model->setClase();

				$data['mensaje'] = "¡Clase Registrada!";
				$data['clase'] = 'alert-success';
				$this->load->view('templates/alerta', $data);

			}
			else
			{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-danger';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}




	function selectinstitucion(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('Institucion_rut', 'RUT de Institucion', 'trim|required|xss_clean|htmlspecialchars');

			if ($this->form_validation->run()) {

				$rut = $this->input->post('Institucion_rut');

				Sesion::set('Institucion_rut', $rut);

				echo Sesion::get('Institucion_rut');

			}
			else
			{
				// Elimina la variable de sesion
				Sesion::destroy('Institucion_rut');
				echo 0;
			}

		}
		else
		{
			redirect('admin');
		}
	}

	function verificarinstitucion(){

		if ($this->input->is_ajax_request()) {

			if (isset($_SESSION['Institucion_rut'])){

				echo Sesion::get('Institucion_rut');
			}
			else
			{
				echo 0;
			}
		}
		else
		{
			redirect('admin');
		}
	}

	function estudianteLista($rut)
	{
		// necesaria para calcular edad
		$this->load->library('tiempo');

		$data['listaEstudiante'] = $this->user_model->getEstudianteByPost($rut);
		$this->load->view('admin/includes-estudiante/lista-estudiantes', $data);
		//echo "<pre>"; print_r($data); echo "</pre>";
	}

	function docentesLista($rut)
	{
		$this->load->library('tiempo');

		$data['listaDocentes'] = $this->user_model->getDocentesByPostJSON($rut);
		$this->load->view('admin/includes-docente/lista-docentes', $data);
		//echo "<pre>"; 
		//print_r($data['listaDocentes']); 
		//echo "</pre>";
	}

	function testFunciones($usuario)
	{
		// $TablaUsuario = si es 'Estudiante' o 'profesor'
		$data = $this->user_model->getDatosUsuario($usuario);
		echo "<pre>"; print_r($data); echo "</pre>";
	}
}

 ?>