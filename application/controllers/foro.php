<?php 

/**
* 
*/
class Foro extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
		$this->load->model('estudiantes/estudiante_model');
		$this->load->model('user/user_model');
		$this->load->model('user/foro_model');

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->library('tiempo');
	}

	function foroModal($Materia_id = FALSE, $Clase_numero = FALSE, $id_time = FALSE){

		if ($this->input->is_ajax_request()) {

			$arrayForo = $this->estudiante_model->getForo($id_time);

			$arrayForo['Comentario'] = $this->estudiante_model->getComentarios($id_time);

			foreach ($arrayForo['Comentario'] as $key => $value) {

				$arrayForo['Comentario'][$key]['SubComentario'] = 
					$this->estudiante_model->getSubComentarios($id_time, $Clase_numero, $Materia_id, $value['id_time']);
			}

			$this->load->view('estudiante/foro', $arrayForo);
			//echo "<pre>"; print_r($arrayForo); echo "</pre>";

		}
	}

	/**
	Corregir los modelos
	*/
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
	}

}

?>