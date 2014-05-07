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
		$this->db->select('numero, codigo, Materia_id');
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

			$row = $this->getNotasUnEstudianteFromClase($numero_clase, $lista['Estudiante_identificacion']);

			$arrayNotasCurso['listaEstudiantes'][$key]['notas'] = $row;
		
		}

		//echo "<pre>"; print_r($arrayNotasCurso); echo "</pre>";

		return $arrayNotasCurso;
	}

	function getNotasUnEstudianteFromClase($numero_clase, $Estudiante_identificacion)
	{
			// $this->db->select('Calificacion_id, nota, tipo_evaluacion, concepto, ponderacion');
			// $this->db->where('Estudiante.identificacion = Agregar_notas.Estudiante_identificacion'); 
			// $this->db->where('Agregar_notas.Calificacion_id = Calificacion.id');
			// $this->db->where('Estudiante.identificacion = ' . $Estudiante_identificacion);
			// $this->db->where('Calificacion.Clase_numero = ' . $numero_clase);
			// $query = $this->db->get('Agregar_notas, Calificacion, Estudiante');

			$query = $this->db->query("SELECT Calificacion_id, Clase_indicador.id as id_indicador, periodo, nota, tipo_evaluacion, concepto, ponderacion FROM Calificacion
				join Agregar_notas
				on Agregar_notas.Calificacion_id = Calificacion.id
				join Estudiante
				on Estudiante.identificacion = Agregar_notas.Estudiante_identificacion
				join Clase_indicador
				on Calificacion.id_indicador = Clase_indicador.id
			where Estudiante.identificacion = '$Estudiante_identificacion'
			and Calificacion.Clase_numero = '$numero_clase'");

			if ($query) {
				return $query->result_array();
			}
	}

	function getCalificacionesFromClase2($numero_clase)
	{
		$query = $this->db->get_where('Calificacion', array('Clase_numero' => $numero_clase));
		$row = $query->result_array();
		return $row;
	}

	function getCalificacionesFromClase($numero_clase)
	{
		$query = $this->db->query("SELECT eval.id, tipo_evaluacion, concepto, ponderacion, eval.Clase_numero, contenido, periodo, estado, fecha_vencimiento 
			FROM lasd3.Calificacion as eval
			join lasd3.Clase_indicador as indicador
			on eval.id_indicador = indicador.id
		where eval.Clase_numero = '$numero_clase'");

		if ($query) {
			return $query->result_array();
		}
	}


	function getLogroFromId($Calificacion_id)
	{
		$query = $this->db->get_where('Calificacion', array('id' => $Calificacion_id));
		$row = $query->row_array();
		return $row;
	}


	/**
	S E T T E R S
	*/
	function setCalificacion($Clase_numero, $materia_id)
	{
		$id = time().rand(1345, 9999999);

		$data = array(	'id' => $id,
		 				'tipo_evaluacion' => $this->input->post('tipoeval'),
		 				'concepto' => $this->input->post('detalleNota'),
		 				'ponderacion' => $this->input->post('peso'),
		 				'Clase_numero' => $Clase_numero,
		 				'Clase_Materia_id' => $materia_id);

		$this->db->insert('Calificacion', $data);

		return $data;
	}

	function setRelacionLogrosConEstudiantes($Calificacion_id, $Clase_numero)
	{
		$array = $this->getEstudiantesFromClase($Clase_numero);
		
		foreach ($array['listaEstudiantes'] as $key => $Estudiante) {
			
			$data = array('Estudiante_identificacion' => $Estudiante['Estudiante_identificacion'],
							'Calificacion_id' =>  $Calificacion_id);

			$this->db->insert('Agregar_notas', $data); 
		}
		
	}



	/**
	U P D A T E S
	*/

	function ponderacionNota($calificaion_id)
	{
		$data = array(
               'ponderacion' => $this->input->post('ponderacion'));

		$this->db->where('id', $calificaion_id);
		$this->db->update('Calificacion', $data); 
	}

	function actNota($calificaion_id, $id_estudiante)
	{
		$data = array(
               'nota' => $this->input->post('nota'));

		$this->db->where('Calificacion_id', $calificaion_id);
		$this->db->where('Estudiante_identificacion', $id_estudiante);
		$this->db->update('Agregar_notas', $data); 
	}

	function actualizarCalificacion($calificaion_id)
	{
		$data = array(	'tipo_evaluacion' => $this->input->post('tipoeval'),
						'concepto' => $this->input->post('detalleNota'),
						'ponderacion' => $this->input->post('peso'));

		$this->db->where('id', $calificaion_id);
		$this->db->update('Calificacion', $data); 

		return $data;
	}

}
?>