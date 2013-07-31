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

	// Obtiene toda la informacion relacionada con clada clase.
	public function getClases($clase)
	{
		for ($i=0; $i < count($clase) ; $i++) {

			$query1 = $this->db->get_where('Profesor', array('identificacion' => $clase[$i]['Profesor_identificacion']));
			$profesor = $query1->row_array();

			$query2 = $this->db->get_where('Materia',  array('id' => $clase[$i]['Materia_id'] ));
			$materia = $query2->row_array();

			$clase[$i]['profesor'] = $profesor['nombre'];

			$clase[$i]['materia'] = $materia['nombre'];
		 }
		
		return $clase;
	}

	// Crea un array (multiD) con los datos no repetidos de los profesores que dictan las clases
	public function getProfes($clase)
	{
		for ($i=0; $i < count($clase) ; $i++) {
			$listaProfesores[$i] = $clase[$i]['Profesor_identificacion']; 
		}

		$listaProfesores = array_unique($listaProfesores);

		for ($i=0; $i < count($listaProfesores); $i++) { 
			$query1 = $this->db->get_where('Profesor', array('identificacion' => $listaProfesores[$i]));
			$profesor = $query1->row_array();

			$arrayDeProfesoresNoRepetidos[$i] = $profesor;
		}
		
		//echo "<pre>"; print_r($arrayDeProfesoresNoRepetidos); echo "</pre>";

		return $arrayDeProfesoresNoRepetidos;
	}

	public function verificarClase($numeroClase, $cursoCodigo)
	{
		$data = array('numero' => $numeroClase,
						'Curso_codigo' => $cursoCodigo );

		$query = $this->db->get_where('Clase', $data);
		$consulta = $query->row_array();

		return $consulta;
	}
}

?>