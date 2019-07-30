<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends Base_Controller {

	public function __construct(){
		parent::__construct();

		// Carga de Modelo
		$this->load->model('empleados_model');

		// Configurando el data_header
		$this->data_header['titulo'] = 'Empleados';
		$this->dataMenu["seccion"] = "empleados";
		$this->data_header['menu']   = $this->load->view('template/version_1/menu',$this->dataMenu,true);

		// Control de alertas
		$this->alerta = $this->session->userdata('alerta');
		$this->session->set_userdata(array('alerta' => ''));
		$this->data_header['alerta'] = $this->alerta;

		// Verificación si está conectado
		if($this->session->userdata('conectado') == 0){
			redirect(base_url().'panel/ingresar');
		}
	}

	public function index()
	{
		redirect(base_url().'panel');
	}

	public function buscar_usuario_x_dni()
	{
		$dni = $this->input->post('f_dni');

		$datos_usuario = $this->usuario_model->obtener_x_dni($dni);
 
		echo json_encode($datos_usuario);
	}
}
