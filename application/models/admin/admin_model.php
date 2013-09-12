<?php 

/**
* 
*/
class Admin_model extends CI_model
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
	// $indiceYkey =  array('campo' => $usuario )

	function verificarKey($tabla, $indiceYkey)
	{	
		$query = $this->db->get_where($tabla, $indiceYkey);

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

	function setUsuario($rol, $id)
	{

		$data = array(	'id' => $id,
						'usuario' => $this->input->post('usuario'),
						'pass' => sha1($this->input->post('pass')),
						'rol' => $rol,
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellido'),
						'email' => $this->input->post('email'),
						'facebook' => $this->input->post('facebook'),
						'twiter' => $this->input->post('twiter')
					 );
		$this->db->insert('Usuario', $data);
	}

	function setEstudiante()
	{
		if (isset($_SESSION['Institucion_rut'])) {

			$id = time().rand(1345, 9999999);
			$this->setUsuario('estudiante', $id);

			$data = array(	'identificacion' => $this->input->post('identificacion'),
							'tipo_identificacion' => $this->input->post('tipo_identificacion'),
							'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
							'tipo_sangre' => $this->input->post('tipo_sangre'). " " . $this->input->post('rh'),
							'Institucion_rut' => $_SESSION['Institucion_rut'],
							'Usuario_id' => $id
						 );
			$this->db->insert('Estudiante', $data);

		}

	}

	function setProfesor()
	{
		if (isset($_SESSION['Institucion_rut'])) {
			
			$id = time().rand(1345, 9999999);
			$this->setUsuario('profesor', $id);

			$data = array(	'identificacion' => $this->input->post('identificacion'),
							'tipo_identificacion' => $this->input->post('tipo_identificacion'),
							'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
							'profesion' => $this->input->post('profesion'),
							'Institucion_rut' => $_SESSION['Institucion_rut'],
							'Usuario_id' => $id
						 );
			$this->db->insert('Profesor', $data);
		}

	}

	function setMateria()
	{
		if (isset($_SESSION['Institucion_rut'])) {
			
			$id = time().rand(1345, 9999999);
			
			$data = array(	'nombre' => $this->input->post('nombre_materia'),
							'Institucion_rut' => $_SESSION['Institucion_rut'],
							'id' => $id
					 );
			$this->db->insert('Materia', $data);
		}
	}

	function setCurso()
	{
		if (isset($_SESSION['Institucion_rut'])) {

			$codigo = time().rand(1345, 9999999);

			$data = array(	'codigo' => $codigo,
							'nombre' => $this->input->post('nombre_curso'),
							'indice' => $this->input->post('nombre_indice'),
							'Profesor_director_grupo_identificacion' => $this->input->post('director_grupo'),
							'Institucion_rut' =>  $_SESSION['Institucion_rut']);

			$this->db->insert('Curso', $data);

		}
	}

	function setClase()
	{
		if (isset($_SESSION['Institucion_rut'])) {

			$numero = time().rand(1345, 9999999);

			// nota: se podria filtrar validando al numero de al codigo de la materia de un colegio en particular 
			$data = array(	'numero' => $numero,
							'Materia_id' => $this->input->post('materia_identificacion'),
							'Profesor_identificacion' => $this->input->post('Profesor_identificacion'),
							'Curso_codigo' => $this->input->post('Curso_codigo'),
							'Institucion_rut' =>  $_SESSION['Institucion_rut']);

			$this->db->insert('Clase', $data);

		}
	}
}

?>