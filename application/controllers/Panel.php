<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de Modelo
		$this->load->model('modulo_usuario/usuario_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Panel de administración - Verifica.me';
		$this->dataMenu["seccion"] = "sitioweb";
		// $this->data_header['menu']   = $this->load->view('menu',$this->dataMenu,true);
	}

	public function index()
	{
		if($this->session->userdata('conectado')){
			$this->data_header['menu'] = $this->load->view('template/version_1/menu',$this->dataMenu,true);
			$this->load->view('template/version_1/header', $this->data_header);
			$this->load->view('panel');
			$this->load->view('template/version_1/footer');
		}else{
			redirect(base_url().'panel/ingresar');
		}

	}

	public function ingresar()
	{
		if($this->session->userdata('conectado')){
			redirect(base_url().'panel');
		}else{
			$this->load->view('template/version_1/login', $this->data_header);
		}
	}

	public function ingreso()
	{
		if($this->session->userdata('conectado'))
		{ 
			$return_data  = array(
				'conectado' => 1, 
				'error' => 1, 
				'error_tipo' => 2, 
				'error_text' => 'Sesión ya iniciada'
			);

			echo json_encode($return_data);
			exit();
		}

		$login_correo = $this->input->post('f_login_correo');
		$login_password = $this->input->post('f_login_password');
		$login_password = md5($login_password);
		
		$validacion = $this->usuario_model->login($login_correo, $login_password);

		// echo '<pre>';
		// print_r($validacion);
		// exit();

		if($validacion){
			$data_session = array(
				'conectado' => 1, 
				'usuario_id' => $validacion->id, 
				'usuario_validado' => $validacion->validado, 
				'usuario_nombre' => $validacion->nombre, 
				'usuario_apellido' => $validacion->apellido, 
				'usuario_nombre_completo' => $validacion->apellido.' '.$validacion->nombre, 
				'usuario_correo' => $validacion->correo
			);

			$this->session->set_userdata($data_session);

			// $data_login = array('conexion'    => date('Y-m-d H:i:s'));
			// $this->usuario_model->modifica($data_login, $validacion->id);

			$return_data  = array(
				'conectado' => 1, 
				'error' => 0, 
				'error_tipo' => 0, 
				'error_text' => NULL
			);

			echo json_encode($return_data);
			exit();	

		}else{
			$return_data  = array(
				'conectado' => 0, 
				'error' => 1, 
				'error_tipo' => 1, 
				'error_text' => 'Información de logueo incorrecta'
			);

			echo json_encode($return_data);
			exit();	
		}
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect(base_url().'panel/ingresar');
	}
}
