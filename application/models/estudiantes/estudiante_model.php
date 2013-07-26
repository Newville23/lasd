<?php 
/**
* 
*/
class Estudiante_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database('lasd');
	}

	/**
	G E T T E R S
	*/

	public function getEstudiante()
	{
		// Datos personales del estudiante
		// Salida: Array simple
		$query = $this->db->get_where('Estudiante', array('Usuario_id' => $_SESSION['id_usuario']));
		$row['datos'] = $query->row_array();

		// Datos del la matriculado en el año actual
		// Salida: Array Simple, 
		$data = array('Estudiante_identificacion' => $row['datos']['identificacion'],
					  'year' => date('Y'));
		$query2 = $this->db->get_where('Matricula', $data);
		$row['matricula'] = $query2->row_array();

		// // Datos del curso matriculado
		// Salida: Array Simple
		$query3 = $this->db->get_where('Curso', array('codigo' => $row['matricula']['Curso_codigo']));
		$row['curso'] = $query3->row_array(); //result_array();

		// Datos sobre las clases del estudiante.
		// Devuelve las clases que se dan en un determinado curso
		// Salida: Array Multiple
		$query4 = $this->db->get_where('Clase', array('Curso_codigo' => $row['curso']['codigo']));
		$row['clase'] = $query4->result_array();

		return $row;
	}

	public function getClases()
	{
		$query = $this->db->get_where('Clase', array('Usuario_id' => $_SESSION['id_usuario']));
		
		return $query->row_array();
	}

	public function getProfes()
	{
		$query = $this->db->get_where('Estudiante', array('Usuario_id' => $_SESSION['id_usuario']));
		
		return $query->row_array();
	}
}

?>