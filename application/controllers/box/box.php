<?php 

/**
* 
*/
class Box extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('sesion');
		// $this->sesion->acceso('admin');

		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'box/box';
		
		$this->load->view('templates/header', $data);
		$this->load->view('box/index', $data);
		$this->load->view('templates/footer', $data);

	}

	function praticar($materia = 'matematicas' )
	{
		$data['title'] = 'Inicio administradores';
		$data['lasd'] = 'Lasd';
		$data['linkIndex'] = 'box/box';
		
		$this->load->view('templates/header', $data);
		$this->load->view('box/practicar', $data);
		$this->load->view('templates/footer', $data);
	}

	function curso($id){

		$arreglo = array('description' => 'traido desde php con la id = ' . $id,
						'status' => 'incomplete');
		$result = json_encode($arreglo);

		//echo '<pre>'; print_r($arreglo); echo '</pre>';
		echo $result;

		//echo $this->put('description');


	}

	function popul(){

		$arreglo = array();

		for ($i=0; $i < 10; $i++) { 

			$arreglo[$i] = array('description' => 'traido desde php con la id = ' . $i,
						'status' => 'incomplete',
						'id' => $i);
		
		}

		$result = json_encode($arreglo);
		echo $result;

	}

	function todos(){

		//header('Content-type: application/json');

		$Data = json_decode(file_get_contents('php://input'), true);

		echo "<pre>"; print_r($Data); echo "</pre>";

		echo $Data['description'] . " Porque?";

		//echo file_get_contents('php://input');

		//print_r($this->input->post());

		// $this->form_validation->set_rules('description', 'Cuerpo del foro', 'trim|xss_clean|htmlspecialchars');

		// if ($this->form_validation->run()) {
		// 	echo "<pre>"; print_r($this->input->post()); echo "</pre>";
		// }else{
		// 	echo "no se validó nada";
		// }
	}
}

 ?>