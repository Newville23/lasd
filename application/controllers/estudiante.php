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
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['title'] = 'Inicio Estudiates';
		$data['lasd'] = 'Lasd';

		// leer tabla estudiantes con la id
		$row = $this->estudiante_model->getEstudiante();

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);
		//echo "<pre>"; print_r($row); echo "</pre>";


		$row['profesores'] = $this->estudiante_model->getProfes($row['clase']);

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

		// verifica que la clase escrita en la URI sea valida si no, redirecciona a error 404
		$verificacionDeClase = $this->estudiante_model->verificarClase($numeroClase, $row['curso']['codigo']);
		if (!$verificacionDeClase) {
			show_404();
			exit;
		}

		$row['clase'] = $this->estudiante_model->getClases($row['clase']);

		$row['ProfesorFromClase'] = $this->estudiante_model->getProfesorFromClase($row['curso']['codigo'], $numeroClase);

		$row['foros'] = $this->estudiante_model->getForoFromClase($row['ProfesorFromClase']['Materia_id'], $numeroClase);

		// echo "<pre>"; print_r($row); echo "</pre>";



		$this->form_validation->set_rules('tituloforo', 'Titulo del foro', 'trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('cuerpoforo', 'Cuerpo del foro', 'trim|xss_clean|htmlspecialchars');


		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('templates/header', $data);

			$this->load->view('estudiante/materia', $row, $data);

			$this->load->view('templates/footer', $data);
		}
		else
		{

			$this->estudiante_model->setForo($numeroClase, $row['ProfesorFromClase']['Materia_id']);

			redirect('estudiante/materia/' . $numeroClase);
		}


	}

	function foro($Materia_id = FALSE, $Clase_numero = FALSE, $id_time = FALSE){

		if ($this->input->is_ajax_request()) {

			$arrayForo = $this->estudiante_model->getForo($Materia_id, $Clase_numero, $id_time);

			$arrayForo['Comentario'] = $this->estudiante_model->getComentario($id_time, $Clase_numero, $Materia_id);

			foreach ($arrayForo['Comentario'] as $key => $value) {

				$arrayForo['Comentario'][$key]['SubComentario'] = 
					$this->estudiante_model->getSubComentario($id_time, $Clase_numero, $Materia_id, $value['id_time']);
			}

			$this->load->view('estudiante/foro', $arrayForo);
			//echo "<pre>"; print_r($arrayForo); echo "</pre>";

		}
		else{
			redirect('estudiante/materia/' . $Clase_numero);
			exit();
		}
	}

	function foroAjax($Materia_id = FALSE, $Clase_numero = FALSE, $id_time = FALSE)
	{
		if ($this->input->is_ajax_request()) {
			
			$this->form_validation->set_rules('lenninSuescun', 'Comentario', 'required|trim|xss_clean|htmlspecialchars');

			if ($this->form_validation->run()) {
				
				$this->estudiante_model->setComentar($Materia_id, $Clase_numero, $id_time);
			}
			else{
				echo validation_errors();
			}
			

		}
		else{
			redirect('estudiante/materia/' . $Clase_numero);
			exit();
		}
	}
}

?>