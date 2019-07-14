<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscripcion extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de Modelo
		$this->load->model('modulo_usuario/usuario_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Suscripción - Verificar.me';
	}

	public function index()
	{
		redirect(base_url());
	}

	public function registro()
	{
		$this->data_header['plan_suscripcion'] = $this->uri->segment(3);

		$this->load->view('template/version_1/registro', $this->data_header);
	}

	public function registrarse()
	{
		if(!$this->input->post()){
			redirect(base_url());
			exit();
		}

		// $datos_cuenta = array(
		// 	'id_cuenta'		=> $this->session->userdata('cuenta_id'),

		// 	'nombre'		=> $this->input->post('f_establecimiento_nombre'),
		// 	'direccion'		=> $this->input->post('f_establecimiento_direccion'),
		// 	'id_ciudad'		=> $this->input->post('f_establecimiento_provincia'),
		// 	'id_provincia'	=> $this->input->post('f_establecimiento_poblacion'),
		// 	'id_cp'			=> $this->input->post('f_establecimiento_cod_postal'),
			
		// 	'id_usuario'	=> $this->session->userdata('usuario_id'),
		// 	'fecha_registro'=> date('Y-m-d H:i:s'),
		// 	'estado'		=> 1
		// );
	}

}
