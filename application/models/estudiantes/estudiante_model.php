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
		
		foreach ($listaProfesores as $key => $value) {

			$query1 = $this->db->get_where('Profesor', array('identificacion' => $value));
			$profesor = $query1->row_array();

			$arrayDeProfesoresNoRepetidos[$key] = $profesor;
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

	public function getProfesorFromClase($codigoCurso, $numeroClase)
	{
		$data = array('numero' => $numeroClase, 
					'Curso_codigo' => $codigoCurso);

		$this->db->select('numero, Materia_id, nombre, profesion');
		$this->db->from('Clase');
		$this->db->join('Profesor', 'Profesor.identificacion = Clase.Profesor_identificacion');
		$this->db->where($data);

		$query = $this->db->get();
		$row = $query->row_array();

		//echo "<pre>"; print_r($row); echo "</pre>";
		return $row;
	}

	// Entrega los foros de una clase en particular
	public function getForoFromClase($Materia_id, $Clase_numero)
	{
		$data = array('Clase_numero' => $Clase_numero, 
					'Materia_id' => $Materia_id);

		//$this->db->join('Profesor', 'Profesor.Usuario_id = Foro.Usuario_id');
		$this->db->order_by('fecha_creacion', 'desc');
		$query1 = $this->db->get_where('Foro', $data);
		$row1 = $query1->result_array();


		// $this->db->join('Estudiante', 'Estudiante.Usuario_id = Foro.Usuario_id');

		// $query2 = $this->db->get_where('Foro', $data);
		// $row2 = $query2->result_array();

		// echo "<pre>"; print_r($row1); echo "</pre>";
		// echo "<pre>"; print_r($row2); echo "</pre>";

		// echo "<pre>"; echo count($row1); echo "</pre>";
		// echo "<pre>"; echo count($row2); echo "</pre>";
		return $row1;
	}

	/**
	S E T T E R S
	*/

	public function setForo($Clase_numero, $Materia_id)
	{
		$data = array('Usuario_id' => $_SESSION['id_usuario'],
						'id_time' => microtime(),
						'titulo' => $this->input->post('tituloforo'),
						'cuerpo' => $this->input->post('cuerpoforo'),
						'Clase_numero' => $Clase_numero,
						'Materia_id' => $Materia_id);

		$this->db->insert('Foro', $data);
	}
	public function votarForo()
	{

	}

	public function setComentar()
	{

	}
	public function votarComentario()
	{

	}

	public function setSubComentar()
	{

	}
	public function votarSubComentario()
	{

	}


}

?>