<?php 

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');


		$this->load->model('user/user_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
	}

	function index()
	{

	}

	function actPonderacionNota($calificaion_id)
	{
		if ($this->input->is_ajax_request()) {
			$this->user_model->ponderacionNota($calificaion_id);
		}
		
	}

	function agregarNota($calificaion_id, $id_estudiante)
	{

	}

	function actualizarNota($calificaion_id, $id_estudiante)
	{
		if ($this->input->is_ajax_request()) {
			$this->user_model->actNota($calificaion_id, $id_estudiante);
		}
		
	}

	function setLogro($Clase_numero, $Materia_id)
	{
		if ($this->input->is_ajax_request()) {
			
			$this->form_validation->set_rules('tipoeval', 'tipoeval', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('detalleNota', 'Concepto de la nota', 'trim|required|xss_clean|htmlspecialchars');
			$this->form_validation->set_rules('peso', 'tipoeval', 'trim|xss_clean|htmlspecialchars');
			
			if ($this->form_validation->run()) {

				$data['logro'] = $this->user_model->setCalificacion($Clase_numero, $Materia_id);

				$data['mensaje'] = "¡Registrado!";
				$data['clase'] = 'alert-success';
				$data['estado'] = 1;
				echo "<pre>"; print_r($data); echo "</pre>";
				$this->load->view('profesor/includes/alerta', $data);
			}
			else{
				$data['mensaje'] = validation_errors(); 
				$data['clase'] = 'alert-error';
				$data['estado'] = 0;
				$this->load->view('profesor/includes/alerta', $data); 
			}
		}
		
	}

	function actLogro($Clase_numero = false, $materia_id = false)
	{
		if ($this->input->is_ajax_request()) {
			
			$data['Clase_numero'] = $Clase_numero;
			$data['materia_id'] = $materia_id;

			$this->load->view('profesor/includes/form-logros', $data);
		}
	}
}

 ?>