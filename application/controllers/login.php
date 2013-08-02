<?php 

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('sesion');
		$this->load->library('session'); // Sesion nativa de codeIgniter

		$this->load->helper('url');
		$this->load->model('login_model'); // Carga el modelo
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->sesion->get('autenticado')) {
			redirect('formularios');
        }

        $data['title'] = 'Menú';
		$data['lasd'] = 'Lasd';	

		$this->validacion_atributos();

		if ($this->form_validation->run()) {

			$row = $this->login_model->getUsuario();

			if (!$row) 
			{
                $data['error'] = 'Datos incorrectos';
                
                $this->load->view('login/header', $data);
				$this->load->view('login/index', $data);
				$this->load->view('templates/footer', $data);
				
            }
            elseif ($row['estado'] != 1) 
            {
                $data['error'] = 'Usuario deshabilitado';

                $this->load->view('login/header', $data);
				$this->load->view('login/index', $data);
				$this->load->view('templates/footer', $data);
				
            }
            else
            {
				$this->sesion->set('autenticado', true);
		        $this->sesion->set('level', $row['rol']);
		        $this->sesion->set('usuario', $row['usuario']);
		        $this->sesion->set('id_usuario', $row['id']);
		        $this->sesion->set('tiempo', time());

		        // Se almacenan los datos de sesión
		        $this->login_model->setSesion($row['id']);
		        
	        	redirect('estudiante');
	    	}
		}
		else
		{
			$this->load->view('login/header', $data);
			$this->load->view('login/index', $data);
			$this->load->view('templates/footer', $data);//
		}

        
        
	}

	private function validacion_atributos()
	{
		$this->form_validation->set_rules('usuario', 'usuario', 'required|trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('pass', 'pass', 'required|trim|xss_clean|htmlspecialchars');
	}

	public function cerrar()
    {
        $this->sesion->destroy();
       	redirect('login');
    }

}


 ?>