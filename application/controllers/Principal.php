<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Configurando el data_header
		$this->data_header['titulo'] = 'Verificar.me | Gestión de horas de trabajo';
	}

	public function index()
	{
		$this->load->model('principal_model');
		$this->data_header['planes'] = $this->principal_model->obtener_planes();

		$this->load->view('template/web_1/principal', $this->data_header);
	}
}
