<?php 

/**
* 
*/
class Admin_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database('lasd2');
	}

/**
	G E T T E R S
*/
	function verificarKey($tabla, $indice, $key){
		$query = $this->db->get_where($tabla, array($indice => $key));

		$row = $query->num_rows();

		return $row;
		// echo '<pre>'; echo $row; echo '</pre>';

	}

/**
	S E T T E R S
*/
	function setInstitucion()
	{
		$data = array('rut' => $this->input->post('rut_institucion'),
		 				'nombre' => $this->input->post('nombre_institucion'),
		 				'rector' => $this->input->post('rector_institucion')
		 				);
		$verificacion = $this->verificarKey('Institucion','rut', $this->input->post('rut_institucion'));
		
		// indica que la clave primaria no está repetida
		if ($verificacion == 0) {
			$this->db->insert('Institucion', $data);
		}
		return $verificacion;
		
	}
}

?>