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

	function institucion(){

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
		
	}
}

 ?>