<?php 

/**
* 
*/
class User_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

/**
	G E T T E R S
*/

	// Entradas:
	// $tabla = La tabla de la BD.
	// $indiceYkey
	function verificarKey($tabla, $indiceYkey)
	{	
		$query = $this->db->get_where($tabla, $indiceYkey);

		$row = $query->num_rows();

		return $row;
		// echo '<pre>'; echo $row; echo '</pre>';

	}


	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'profesor'
	function getUserFromIdent($identificacion, $TablaUsuario)
	{
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$usuario = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $usuario['Usuario_id']));
		$usuario2 = $query2->row_array();

		$usuario['nombre'] = $usuario2['nombre'];
		$usuario['apellido'] = $usuario2['apellido'];

		return $usuario;
	}


	// $identificacion = cedula dèl usuario
	// $TablaUsuario = si es 'Estudiante' o 'profesor'
	function getNombreFromIdent($identificacion, $TablaUsuario)
	{
		$this->db->select('Usuario_id');
		$query1 = $this->db->get_where($TablaUsuario, array('identificacion' => $identificacion));
		$usuario = $query1->row_array();

		$this->db->select('nombre, apellido');
		$query2 = $this->db->get_where('Usuario', array('id' => $usuario['Usuario_id']));
		$usuario = $query2->row_array();

		return $usuario;
	}


	// $TablaUsuario = si es 'Estudiante' o 'profesor'
	public function getDatosUsuario($TablaUsuario)
	{
		$string = 'Usuario.id = '. $TablaUsuario . '.Usuario_id';
		//echo $_SESSION['id_usuario'];
		$this->db->join('Usuario', $string);
		$query = $this->db->get_where($TablaUsuario, array('Usuario_id' => $_SESSION['id_usuario']));
		return $query->row_array();
	}

	// Obtiene una lista de estudiantes de una clase especifica.
	function getEstudiantesFromClase($numero_clase)
	{
		$this->db->select('numero, codigo');
		$this->db->join('Curso', 'Curso.codigo = Clase.Curso_codigo');
		$query = $this->db->get_where('Clase', array('numero' => $numero_clase));
		$arrayCurso = $query->row_array();
							

		$this->db->select('Estudiante_identificacion, tipo_identificacion, nombre, apellido');
		$this->db->join('Estudiante', 'Estudiante.identificacion = Matricula.Estudiante_identificacion');
		$this->db->join('Usuario', 'Usuario.id = Estudiante.Usuario_id');
		$this->db->order_by("apellido", "asc"); 
		$query2 = $this->db->get_where('Matricula', array('Curso_codigo' => $arrayCurso['codigo']));
		$arrayCurso['listaEstudiantes'] = $query2->result_array();
		return $arrayCurso;
	}

	// Obtiene una lista de estudiantes de un curso especifico
	function getEstudiantesFromCurso($codigo_Curso)
	{

	}

	// Obtiene una lista de estudiantes y los datos de sus notas de una clase especifica
	function getEstudiantesNotasFromClase($numero_clase)
	{
		//Obtiene la lista de estudiates de la clase
		$arrayNotasCurso = $this->getEstudiantesFromClase($numero_clase);
		
		//para cada estudiante obtiene sus notas en la clase
		foreach ($arrayNotasCurso['listaEstudiantes'] as $key => $lista) {

			// $this->db->select('nota, tipo_evaluacion, concepto, ponderacion');
			// $this->db->where('Estudiante.identificacion = Agregar_notas.Estudiante_identificacion'); 
			// $this->db->where('Agregar_notas.Calificacion_id = Calificacion.id');
			// $this->db->where('Estudiante.identificacion = ' . $lista['Estudiante_identificacion']);
			// $this->db->where('Calificacion.Clase_numero = ' . $numero_clase);
			// $query = $this->db->get('Agregar_notas, Calificacion, Estudiante');

			// $row = $query->result_array();

			$row = $this->getNotasUnEstudianteFromClase($numero_clase, $lista['Estudiante_identificacion']);

			$arrayNotasCurso['listaEstudiantes'][$key]['notas'] = $row;
		
		}

		//echo "<pre>"; print_r($arrayNotasCurso); echo "</pre>";

		return $arrayNotasCurso;
	}

	function getNotasUnEstudianteFromClase($numero_clase, $Estudiante_identificacion)
	{
			$this->db->select('nota, tipo_evaluacion, concepto, ponderacion');
			$this->db->where('Estudiante.identificacion = Agregar_notas.Estudiante_identificacion'); 
			$this->db->where('Agregar_notas.Calificacion_id = Calificacion.id');
			$this->db->where('Estudiante.identificacion = ' . $Estudiante_identificacion);
			$this->db->where('Calificacion.Clase_numero = ' . $numero_clase);
			$query = $this->db->get('Agregar_notas, Calificacion, Estudiante');

			$row = $query->result_array();

			return $row;
	}

	function getCalificacionesFromClase($numero_clase)
	{
		$query = $this->db->get_where('Calificacion', array('Clase_numero' => $numero_clase));
		$row = $query->result_array();
		return $row;
	}


	/**
	S E T T E R S
	*/



}
?>