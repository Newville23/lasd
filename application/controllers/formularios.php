<?php
/**
*/
class Formularios extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dinamicForms/form_model'); // Carga el modelo
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('sesion');
		$this->sesion->acceso('admin');
	}

	public function index()
	{
		$data['title'] = 'Menú';
		$data['lasd'] = 'Lasd';

		$data['lista'] = $this->form_model->get_Form(false, 'formulariosDinamicos');

		$this->load->view('templates/header', $data);
		$this->load->view('dinamicForms/index', $data);
		$this->load->view('templates/footer', $data);

	}

	private function validacion_atributos()
	{
		$this->form_validation->set_rules('label', 'label', 'xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('type', 'type', 'required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('name', 'name', 'required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('class', 'class', 'htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('id_', 'id_', 'htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('value', 'value', 'htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('placeholder', 'placeholder', 'htmlspecialchars|xss_clean');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El campo %s no es un Email valido');
	}
	private function validacion_formulario()
	{
		$this->form_validation->set_rules('FormName', 'FormName', 'required|xss_clean|htmlspecialchars');
	}

	public function dform($id_form = false)
	{
		if ($id_form == false) {
			redirect('formularios');
		}
		else
		{
			$data['title'] = 'Formularios dinamicos';
			$data['lasd'] = 'Lasd';

			$data['form_data'] = $this->form_model->get_Form($id_form, 'formulariosDinamicos');
			$data['campo'] = $this->form_model->get_tabla_estatica($id_form);

			$data['form_class'] = array('class' => 'form-horizontal' );
		
			//echo "<pre>"; print_r($data['campo']); echo "</pre>";

			// Se ralizan las regas de validacion de los campos
			foreach ($data['campo'] as $value) {
				//echo "<pre>"; print_r($value); echo "</pre>";
				$this->form_validation->set_rules($value['name'], 'fieldlabel', 'trim|required|xss_clean');
			}
			
			if ($this->form_validation->run() === FALSE) {

				$this->load->view('templates/header', $data);
				$this->load->view('dinamicForms/dform', $data);
				$this->load->view('templates/footer', $data);
			}
			else
			{
				$this->form_model->update_atributos_DForm($data['campo']);
				redirect('formularios/dform/' . $id_form);
			}
			
		}
	}

	public function sform()
	{
		$data['title'] = 'Crear un campo';
		$data['lasd'] = 'Lasd';

		$this->validacion_formulario();

		$this->validacion_atributos();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('dinamicForms/sform', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			// inserta una fila en la tabla de formularios.
			$this->form_model->set_Form();
			// inserta una fila en la tabla de atributos.			
			$this->form_model->set_new_DForm();
			
			redirect('formularios/dform' . $id);
		}
	}

	public function edit($id_form)
	{
		$data['title'] = 'editar formulario';
		$data['lasd'] = 'Lasd';

		$data['campo'] = $this->form_model->get_tabla_estatica($id_form);
		$data['form_data'] = $this->form_model->get_Form($id_form, 'formulariosDinamicos');
		$data['id_form'] = $id_form;
			//echo "<pre>"; print_r($data['campo']); echo "</pre>";
		$this->load->view('templates/header', $data);
		$this->load->view('dinamicForms/editar', $data);
		$this->load->view('templates/footer', $data);
	}
	public function edit_cambiar($id)
	{
		$data['title'] = 'editar campo';
		$data['lasd'] = 'Lasd';
		$data['encabezado'] = 'Actualizar campo';

		$data['campo'] = $this->form_model->get_Form($id);

		$this->validacion_atributos();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('dinamicForms/edit_cambiar', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//cambia los atributos de un campo especifico
			$this->form_model->update_Form($id);
			redirect('formularios/edit/' . $data['campo']['id_form']);
		}

	}

	public function edit_eliminar($id)
	{
		$data = $this->form_model->get_Form($id); // estrae la informacion del campo

		$this->form_model->eliminar_Campo($id);

		redirect('formularios/edit/' . $data['id_form']); // redirige a la pagina de edicion del formulario
	}

	public function edit_add_campo($id_form)
	{
		$data['title'] = 'editar campo';
		$data['lasd'] = 'Lasd';
		$data['encabezado'] = 'Agregar campo';

		$this->validacion_atributos();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('dinamicForms/edit_cambiar', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->form_model->set_DForm($id_form);
			redirect('formularios/edit/' . $id_form);
		}
	}

	public function eliminar($id_form)
	{
		$this->form_model->eliminar_Form($id_form, 'formulariosDinamicos');
		$this->form_model->eliminar_Campo_desde_form($id_form);
		redirect('formularios');
	}
}

?>