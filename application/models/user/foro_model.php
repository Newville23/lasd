<?php 

/**
* 
*/
class Foro_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	G E T T E R S
	*/

	// Entrega de la tabla Foro, los foros de una clase en particular
	public function getForoFromClase($Clase_numero)
	{
		$data = array('Clase_numero' => $Clase_numero);

		$this->db->join('Usuario', 'Usuario.id = Foro.Usuario_id');
		$this->db->order_by('fecha_creacion_foro', 'desc');
		$query = $this->db->get_where('Foro', $data);
		$row = $query->result_array();

		return $row;
	}


	/**
	S E T T E R S
	*/

	public function setForo($Clase_numero, $Materia_id)
	{
		$filtro = array(" ", ".");

		$data = array('Usuario_id' => $_SESSION['id_usuario'],
						'id_time' => str_replace($filtro, '', microtime()),
						'titulo' => $this->input->post('tituloforo'),
						'cuerpo' => $this->input->post('cuerpoforo'),
						'Clase_numero' => $Clase_numero,
						'Materia_id' => $Materia_id);

		$this->db->insert('Foro', $data);
	}
}

 ?>