<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Configurando el data_header
		$this->data_header['titulo'] = 'Verifica.me';
	}

	public function index()
	{
		$this->load->view('template/web_1/principal', $this->data_header);
	}
}
