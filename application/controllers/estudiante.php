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
		$this->load->model('user/user_model');
		$this->load->model('user/foro_model');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['title'] = 'Inicio Estudiates';
		$data['lasd'] = 'Lasd';
		// Link de la pagina de inicio
		$data['linkIndex'] = 'estudiante';

		// leer tabla estudiantes con la id
		$row = $this->estudiante_model->getEstudiante();

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);
		//echo "<pre>"; print_r($row); echo "</pre>";


		$row['profesores'] = $this->estudiante_model->getProfes($row['clase']);
		//echo "<pre>"; print_r($row); echo "</pre>";

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

		// leer tabla estudiantes con la id
		$row = $this->estudiante_model->getEstudiante();

		// verifica que la clase escrita en la URI sea valida si no, redirecciona a error 404
		$verificacionDeClase = $this->estudiante_model->verificarClase($numeroClase, $row['curso']['codigo']);
		if (!$verificacionDeClase) {
			show_404();
			exit;
		}

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);

		$row['ProfesorFromClase'] = $this->estudiante_model->getProfesorFromClase($row['curso']['codigo'], $numeroClase);

		$row['foros'] = $this->estudiante_model->getForoFromClase($row['ProfesorFromClase']['Materia_id'], $numeroClase);

		$row['notas'] = $this->user_model->getNotasUnEstudianteFromClase($numeroClase, $row['datos']['identificacion']);
		//echo "<pre>"; print_r($row); echo "</pre>";

		$this->form_validation->set_rules('tituloforo', 'Titulo del foro', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('cuerpoforo', 'Cuerpo del foro', 'trim|xss_clean|htmlspecialchars');

		$data['title'] = 'Materias';
		$data['lasd'] = 'Lasd';
		$data['numeroClase'] = $numeroClase;
		$data['linkIndex'] = 'estudiante';

		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('templates/header', $data);

			$this->load->view('estudiante/materia', $row, $data);

			$this->load->view('templates/footer', $data);
		}
		else
		{

			$this->foro_model->setForo($numeroClase, $row['ProfesorFromClase']['Materia_id']);

			redirect('estudiante/materia/' . $numeroClase);
		}


	}

	function foroAjax($Materia_id = FALSE, $Clase_numero = FALSE, $id_time = FALSE)
	{
		if ($this->input->is_ajax_request()) {
			
			$this->form_validation->set_rules('comentarForo', 'Comentario', 'required|trim|xss_clean|htmlspecialchars');

			if ($this->form_validation->run()) {
				
				$data = $this->estudiante_model->setComentar($Materia_id, $Clase_numero, $id_time);

				$data = $this->estudiante_model->getComentario($data['id_time']);
				//echo "<pre>"; print_r($data); echo "</pre>";
				$this->load->view('estudiante/comentario', $data);
				
			}
			else{
				echo "textAreaVacio";
			}
			

		}
		else{
			redirect('estudiante/materia/' . $Clase_numero);
			exit();
		}
	}

	function comentarioAjax($Materia_id = FALSE, $Clase_numero = FALSE, $Foro_id_time = FALSE, $Comentario_id_time = FALSE)
	{
		if ($this->input->is_ajax_request()) {
			
			$this->form_validation->set_rules('comentarComentario', 'SubComentario', 'required|trim|xss_clean|htmlspecialchars');

			if ($this->form_validation->run()) {
				
				$data = $this->estudiante_model->setSubComentar($Materia_id, $Clase_numero, $Foro_id_time, $Comentario_id_time);
				
				$data = $this->estudiante_model->getSubComentario($data['id_time_Sub']);

				//echo "<pre>"; print_r($data); echo "</pre>";

				$this->load->view('estudiante/subcomentario', $data);

				
			}
			else{
				echo "textAreaVacio";
			}
			

		}
		else{
			redirect('estudiante/materia/' . $Clase_numero);
			exit();
		}
	}

}

?>