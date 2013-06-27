<?php
/**
* 
*/
class Form_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
/**
	G E T T E R S
*/
	public function get_Form($id = FALSE, $modelo = 'campos')
	{
		if ($id === FALSE)
		{
			$query = $this->db->get($modelo);
			return $query->result_array(); // Devuelve toda la tabla
		}
		$query = $this->db->get_where($modelo, array('id' => $id)); // 

		return $query->row_array();		
	}

	// Extrae los campos de un formulario especifico.
	public function get_tabla_estatica($id_form)
	{
		$query = $this->db->get_where('campos', array('id_form' => $id_form)); // 
		return $query->result_array();		
	}
/**
	U P D A T E S
*/
	public function update_Form($id)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'class' => $this->input->post('class'),
			'id_' => $this->input->post('id'),
			'value' => $this->input->post('value'),
			'placeholder' => $this->input->post('placeholder')
		);

		$this->db->where('id', $id);
		$this->db->update('campos', $data);
	}

	public function update_atributos_DForm($data)
	{
		foreach ($data as $value) {
			$valor = array('value' => $this->input->post($value['name']));

			$this->db->where('id', $value['id']);
			$this->db->update('campos', $valor);
		}
	}
/**
	S E T T E R S
*/
	// Inserta los atributos en la tabla.
	public function set_DForm($id_form)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'id_form' => $id_form,
			'class' => $this->input->post('class'),
			'id_' => $this->input->post('id'),
			'value' => $this->input->post('value'),
			'placeholder' => $this->input->post('placeholder')
		);

		return $this->db->insert('campos', $data);
	}

	// Inserta los atributos en la tabla campos, pero con el id_form del formulario recien creado
	public function set_new_DForm()
	{
		// recoleta la 'id' del formulario a la que pertenecen los atributos del campo.
		$query = $this->db->get_where('formulariosDinamicos', array('name' => $this->input->post('FormName')));
		$id_form = $query->row_array();

		$data = array(
			'name' => $this->input->post('name'),
			'id_form' => $id_form['id'],
			'class' => $this->input->post('class'),
			'id_' => $this->input->post('id'),
			'value' => $this->input->post('value'),
			'placeholder' => $this->input->post('placeholder')
		);

		return $this->db->insert('campos', $data);
	}

	// Interta los datos de la lista de formularios
	public function set_Form()
	{
		$data = array(
			'name' => $this->input->post('FormName'),
			'class' => 'none',
			'id_name' => 'none'
		);

		return $this->db->insert('formulariosDinamicos', $data);
	}
/**
	E L I M I N A R
*/
	public function eliminar_Form($id, $modelo = 'campos')
	{
		$data = array('id' => $id);
		$this->db->delete($modelo, $data); 
	}

	public function eliminar_Campo_desde_form($id_form)
	{
		$data = array('id_form' => $id_form);
		$this->db->delete('campos', $data); 
	}

	public function eliminar_Campo($id)
	{
		$data = array('id' => $id, );
		$this->db->delete('campos', $data);
	}

}

?>