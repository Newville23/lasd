<?php 

class Profesor_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getClasesFromProfesor($Profesor_Identificacion)
	{
		$this->db->join('Materia', 'Materia.id = Clase.Materia_id');
		$this->db->join('Curso', 'Curso.codigo = Clase.Curso_codigo');

		$data = array('Profesor_Identificacion' => $Profesor_Identificacion );
		$query = $this->db->get_where('Clase', $data);
		$row = $query->result_array();
		return $row;
	}


}

 ?>