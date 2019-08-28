<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class API extends Base_Controller {

	public function __construct(){

		parent::__construct();

		//Carga de Modelo
		$this->load->model('modulo_usuario/usuario_model');
		$this->load->model('establecimientosusuarios_model');
		$this->load->model('establecimientos_model');
		$this->load->model('registrohorarios_model');
	}

	public function login()
	{

		$login_correo = "demo@verificar.me";
		$login_password = "c514c91e4ed341f263e458d44b3bb0a7";
		
		$validacion = $this->usuario_model->login($login_correo, $login_password);

		if($validacion){
			$usuario = array(
				'conectado' => 1, 
				'usuario_id' => $validacion->id, 
				'usuario_validado' => $validacion->validado, 
				'usuario_nombre' => $validacion->nombre, 
				'usuario_apellido' => $validacion->apellido, 
				'usuario_nombre_completo' => $validacion->apellido.' '.$validacion->nombre, 
				'usuario_correo' => $validacion->correo
			);
		}else{
			$usuario = array();
		}
		echo json_encode($usuario);
	}

	public function obtenerLocalesUsuario($idUsuario)
	{
		$establecimientos = $this->establecimientosusuarios_model->obtener_establecimiento_x_usuario($idUsuario);
		echo json_encode($establecimientos);
	}

	public function insertarHora()
	{
		$idUsuario 			= $this->input->post('idUsuario');
		$idEstablecimiento 	= $this->input->post('idEstablecimiento');
		$horaEntrada		= $this->input->get('horaEntrada');
		$horaSalida			= $this->input->get('horaSalida');

		$data = array(
	        'id_usuario' 			=> $idUsuario,
	        'id_establecimiento'  	=> $idEstablecimiento,
	        'horaEntrada'			=> $horaEntrada,
	        'horaSalida'			=> $horaSalida,

	        'estado'				=> 1,
	        'creado'  				=> date('Y-m-d H:i:s')
		);

		if($this->registrohorarios_model->alta($data)){
			echo 1;
		}else{
			echo 0;
		}
	}

}
