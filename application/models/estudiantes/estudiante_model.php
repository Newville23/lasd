<?php 
/**
* 
*/
class Estudiante_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	G E T T E R S
	*/

	public function getEstudiante()
	{
		// Datos personales del estudiante
		// Salida: Array simple
		// $this->db->select('nombre, apellido');
		$this->db->join('Usuario', 'Usuario.id = Estudiante.Usuario_id');
		$query = $this->db->get_where('Estudiante', array('Usuario_id' => $_SESSION['id_usuario']));
		$row['datos'] = $query->row_array();


		// Datos del la matriculado en el año actual
		// Salida: Array Simple, 
		// tener cuidado en el year
		$data = array('Estudiante_identificacion' => $row['datos']['identificacion'],
					  'year' => date('Y'));
		
		$query2 = $this->db->get_where('Matricula', $data);
		$row['matricula'] = $query2->row_array();
		//echo "<pre>"; print_r($row); echo "</pre>";
		
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

			$profesor = $this->getNombreFromIdent($clase[$i]['Profesor_identificacion'], 'Profesor');

			$this->db->select('nombre');
			$query2 = $this->db->get_where('Materia',  array('id' => $clase[$i]['Materia_id'] ));
			$materia = $query2->row_array();


			$clase[$i]['profesor'] = $profesor['nombre'] . ' ' . $profesor['apellido'];

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

			$profesor = $this->getUserFromIdent($value, 'Profesor');

			$arrayDeProfesoresNoRepetidos[$key] = $profesor;
		}
	
		//echo "<pre>"; print_r($arrayDeProfesoresNoRepetidos); echo "</pre>";
		return $arrayDeProfesoresNoRepetidos;
	}




	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'Profesor'
	function getUserFromIdent($identificacion, $TablaUsuario)
	{
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$profesor = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $profesor['Usuario_id']));
		$profesor2 = $query2->row_array();

		$profesor['nombre'] = $profesor2['nombre'];
		$profesor['apellido'] = $profesor2['apellido'];

		return $profesor;
	}


	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'Profesor'
	function getNombreFromIdent($identificacion, $TablaUsuario)
	{
		$this->db->select('Usuario_id');
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$profesor = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $profesor['Usuario_id']));
		$profesor = $query2->row_array();

		return $profesor;
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

		$this->db->select('numero, Materia_id, profesion, Usuario_id');
		$this->db->from('Clase');
		$this->db->join('Profesor', 'Profesor.identificacion = Clase.Profesor_identificacion');
		$this->db->where($data);

		$query = $this->db->get();
		$row = $query->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $row['Usuario_id']));
		$row['nombre_profesor'] = $query2->row_array();

		//echo "<pre>"; print_r($row); echo "</pre>";
		return $row;
	}

	// Entrega de la tabla Foro, los foros de una clase en particular
	public function getForoFromClase($Materia_id, $Clase_numero)
	{
		$data = array('Clase_numero' => $Clase_numero, 
					'Materia_id' => $Materia_id);

		$this->db->join('Usuario', 'Usuario.id = Foro.Usuario_id');
		$this->db->order_by('fecha_creacion_foro', 'desc');
		$query1 = $this->db->get_where('Foro', $data);
		$row1 = $query1->result_array();

		return $row1;
	}

	function getForo($id_time)
	{
		$this->db->join('Usuario', 'Usuario.id = Foro.Usuario_id');
		$query = $this->db->get_where('Foro', array('id_time' => $id_time));
		$row = $query->row_array();
		return $row;

	}

	function getComentario($Comentario_id_time)
	{
		$this->db->join('Usuario', 'Usuario.id = Comentario.Usuario_id');
		$query = $this->db->get_where('Comentario', array('id_time' => $Comentario_id_time));
		$row = $query->row_array();
		return $row;
	}

	function getComentarios($Foro_id_time)
	{
		
		$data = array('Foro_id_time' => $Foro_id_time);

		$this->db->select('id_time, fecha_creacion_comentario, cuerpo, puntos, Usuario_id, Foro_id_time, Clase_numero, Materia_id, usuario, nombre, apellido');
		$this->db->join('Usuario', 'Usuario.id = Comentario.Usuario_id');
		$this->db->order_by('fecha_creacion_comentario', 'desc');
		$query = $this->db->get_where('Comentario', $data);
		$row = $query->result_array();
		return $row;
	}

	function getSubComentarios($Foro_id_time, $Clase_numero, $Materia_id, $Comentario_id_time)
	{
		$data = array('Foro_id_time' => $Foro_id_time,
						'Clase_numero' => $Clase_numero,
						'Materia_id' => $Materia_id,
						'Comentario_id_time' => $Comentario_id_time);
		
		$this->db->join('Usuario', 'Usuario.id = SubComentario.Usuario_id');
		$this->db->order_by('fecha_creacion_sub', 'desc');
		$query = $this->db->get_where('SubComentario', $data);
		$row = $query->result_array();

		return $row;
	}

	function getSubComentario($Subcomentario_id_time)
	{
		$this->db->join('Usuario', 'Usuario.id = SubComentario.Usuario_id');
		$query = $this->db->get_where('SubComentario', array('id_time_Sub' => $Subcomentario_id_time));
		$row = $query->row_array();
		return $row;
	}

	/**
	S E T T E R S
	*/

	public function votarForo()
	{

	}

	public function setComentar($Materia_id, $Clase_numero, $Foro_id_time) 
	{
		$filtro = array(" ", ".");

		$data = array('id_time' => str_replace($filtro, '', microtime()),
						'cuerpo' => $this->input->post('comentarForo'),
						'Usuario_id' => $_SESSION['id_usuario'],
						'Foro_id_time' => $Foro_id_time,
						'Clase_numero' => $Clase_numero,
						'Materia_id' => $Materia_id);

		$this->db->insert('Comentario', $data);

		return $data;
	}
	public function votarComentario()
	{

	}

	public function setSubComentar($Materia_id, $Clase_numero, $Foro_id_time, $Comentario_id_time)
	{
		$filtro = array(" ", ".");

		$data = array('id_time_Sub' => str_replace($filtro, '', microtime()),
						'cuerpo' => $this->input->post('comentarComentario'),
						'Usuario_id' => $_SESSION['id_usuario'],
						'Comentario_id_time' => $Comentario_id_time,
						'Foro_id_time' => $Foro_id_time,
						'Clase_numero' => $Clase_numero,
						'Materia_id' => $Materia_id);

		$this->db->insert('SubComentario', $data);
		return $data;
	}
	public function votarSubComentario()
	{

	}


}

?>