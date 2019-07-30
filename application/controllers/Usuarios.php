<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends Base_Controller {

	public function __construct(){
		parent::__construct();

		// Carga de Modelo
		$this->load->model('modulo_usuario/usuario_model');

		// Configurando el data_header
		$this->data_header['titulo'] = 'Usuarios';
		$this->dataMenu["seccion"] = "usuarios";
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
}
