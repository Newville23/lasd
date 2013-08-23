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
	function verificarKey($tabla, $indice, $key)
	{	
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

	function setUsuario($rol, $id)
	{

		$data = array(	'id' => $id,
						'usuario' => $this->input->post('usuario'),
						'pass' => $this->input->post('pass'),
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
		$id = time();	//time().rand(1345, 9999999)
		$this->setUsuario('estudiante', $id);

		$data = array(	'identificacion' => $this->input->post('identificacion'),
						'tipo_identificacion' => $this->input->post('tipo_identificacion'),
						'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
						'tipo_sangre' => $this->input->post('tipo_sangre'). " " . $this->input->post('rh'),
						'Institucion_rut' => $this->input->post('Institucion_rut'),
						'Usuario_id' => $id
					 );
		$this->db->insert('Estudiante', $data);
	}

	function setProfesor()
	{
		$id = time();	//time().rand(1345, 9999999)
		$this->setUsuario('profesor', $id);

		$data = array(	'identificacion' => $this->input->post('identificacion'),
						'tipo_identificacion' => $this->input->post('tipo_identificacion'),
						'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
						'profesion' => $this->input->post('profesion'),
						'Institucion_rut' => $this->input->post('Institucion_rut'),
						'Usuario_id' => $id
					 );
		$this->db->insert('Profesor', $data);
	}
}

?>