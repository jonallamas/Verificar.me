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
// TOOD: Crear controlador para estos
	//esta iria verificar.me/contacto
	public function contacto()
	{
		$this->load->model('principal_model');
		$this->load->view('template/web_1/contacto', $this->data_header);
	}
	//esta iria verificar.me/faq
	public function faq()
	{
		$this->load->model('principal_model');
		$this->load->view('template/web_1/faq', $this->data_header);
	}

	//esta iria verificar.me/terminos-condiciones.php   !!!!!
	public function terminos()
	{
		$this->load->model('principal_model');
		$this->load->view('template/web_1/terminos-condiciones', $this->data_header);
	}

	//esta iria verificar.me/politica-privacidad.php   !!!!!
	public function privacidad()
	{
		$this->load->model('principal_model');
		$this->load->view('template/web_1/politica-privacidad', $this->data_header);
	}

	//esta iria verificar.me/politica-cookies.php   !!!!!
	public function cookies()
	{
		$this->load->model('principal_model');
		$this->load->view('template/web_1/politica-cookies', $this->data_header);
	}
}
