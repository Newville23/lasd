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

			$data['error'] = validation_errors();

			$this->load->view('login/header', $data);
			$this->load->view('login/index', $data);
			$this->load->view('templates/footer', $data);//
		}
        
	}

	private function validacion_atributos()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|xss_clean|htmlspecialchars');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
	}

	public function cerrar()
    {
        $this->sesion->destroy();
        $this->session->sess_destroy();

       	redirect('login');
    }

    
    // Accede a la cuenta por medio de Ajax en el caso de escritorio
    function loginajax()
    {
    	if ($this->input->is_ajax_request()) {
    		
			$this->validacion_atributos();

			if ($this->form_validation->run()) {

				$row = $this->login_model->getUsuario();

				if (!$row) 
				{
					$data['estado'] = 0;
	                $data['msj'] = 'Datos incorrectos';

	                echo json_encode($data);
				
	            }
	            elseif ($row['estado'] != 1) 
	            {
	            	$data['estado'] = 0;
	                $data['msj'] = 'Usuario deshabilitado';

	                echo json_encode($data);
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
			        
			        $data['estado'] = 1;
			        $data['msj'] = site_url('estudiante');
			        echo json_encode($data);
		    	}
			}
			else{
				$data['estado'] = 0;
				$data['msj'] = validation_errors();
				echo json_encode($data);
			}
		}
    	else{
    		redirect('login');
    	}

    }

}


 ?>