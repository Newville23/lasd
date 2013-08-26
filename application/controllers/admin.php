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
		//$this->sesion->acceso('admin');

		$this->load->model('admin/admin_model');
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

	function agregarInstitucion()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		
		$this->load->view('templates/header', $data);
		$this->load->view('admin/agregarInstitucion');
		$this->load->view('templates/footer', $data);
		
	}

	function institucion()
	{

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
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			$data['mensaje'] = validation_errors(); 
			$data['clase'] = 'alert-error';
			$this->load->view('templates/alerta', $data);
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

	function estudiante()
	{
		$this->validarUsuario();

		$this->form_validation->set_rules('identificacion', 'Numero de identificacion', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('tipo_identificacion', 'Tipo de identificacion', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('tipo_sangre', 'tipo_sangre', 'trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('rh', 'Factor RH', 'trim|xss_clean|htmlspecialchars');
	
		if ($this->form_validation->run()) {
			
			$usuario = $this->input->post('usuario');
			$email = $this->input->post('email');
			$identificacion = $this->input->post('identificacion');

			//verificar usuario, si el usuario existe...
			if ($this->admin_model->verificarKey('Usuario', 'usuario', $usuario)){
				
				$data['mensaje'] = "El nombre usuario " . $usuario . " ya está en uso";
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
				return;
			}
			// vericar Email
			if ($this->admin_model->verificarKey('Usuario', 'email', $email)) {

				$data['mensaje'] = "El email " . $email . " ya está en uso";
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
				return;
			}
			// verificar numero identificacion
			if ($this->admin_model->verificarKey('Estudiante', 'identificacion', $identificacion)) {

				$data['mensaje'] = "Un estudiante ya se encuentra inscrito con el número de identificacion " . $identificacion;
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
				return;
			}

			$this->admin_model->setEstudiante();

			$data['mensaje'] = "¡Estudiante inscrito!";
			$data['clase'] = 'alert-success';
			$this->load->view('templates/alerta', $data);

		}else{
			$data['mensaje'] = validation_errors(); 
			$data['clase'] = 'alert-error';
			$this->load->view('templates/alerta', $data);
		}
	}

	function profesor()
	{
		$this->validarUsuario();

		$this->form_validation->set_rules('identificacion', 'Numero de identificacion', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('tipo_identificacion', 'Tipo de identificacion', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('profesion', 'Profesion', 'trim|xss_clean|htmlspecialchars');
	
		if ($this->form_validation->run()) {
			
			$usuario = $this->input->post('usuario');
			$email = $this->input->post('email');
			$identificacion = $this->input->post('identificacion');

			//verificar usuario, si el usuario existe...
			if ($this->admin_model->verificarKey('Usuario', 'usuario', $usuario)){
				
				$data['mensaje'] = "El nombre usuario " . $usuario . " ya está en uso";
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
				return;
			}
			// vericar Email
			if ($this->admin_model->verificarKey('Usuario', 'email', $email)) {

				$data['mensaje'] = "El email " . $email . " ya está en uso";
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
				return;
			}
			// verificar numero identificacion
			if ($this->admin_model->verificarKey('Profesor', 'identificacion', $identificacion)) {

				$data['mensaje'] = "Un docente ya se encuentra inscrito con el número de identificacion " . $identificacion;
				$data['clase'] = 'alert-error';
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
			$data['clase'] = 'alert-error';
			$this->load->view('templates/alerta', $data);
		}
	}




	function materia(){
		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nombre_materia', 'Nombre de la materia', 'trim|required|xss_clean|htmlspecialchars');
			
			if ($this->form_validation->run()) {

				// Verificar que el nombre de la materia no esté repetido
				$nombre_materia = $this->input->post('nombre_materia');

				if ($this->admin_model->verificarKey('Materia', 'nombre', $nombre_materia)){
				
					$data['mensaje'] = "El nombre de la Materia " . $nombre_materia . " ya está en uso";
					$data['clase'] = 'alert-error';
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
				$data['clase'] = 'alert-error';
				$this->load->view('templates/alerta', $data);
			}
		}
		else
		{
			redirect('admin');
		}
	}


	function curso(){

		$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run()) {
			# code...
		}
		else
		{
			$data['mensaje'] = validation_errors(); 
			$data['clase'] = 'alert-error';
			$this->load->view('templates/alerta', $data);
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
}

 ?>