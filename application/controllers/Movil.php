<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Movil extends Base_Controller {



	public function __construct(){

		parent::__construct();



		//Carga de Modelo

		$this->load->model('modulo_usuario/usuario_model');

		// $this->load->model('establecimientosusuarios_model');

		// $this->load->model('establecimientos_model');

		// $this->load->model('registros_model');





	}



	public function login()

	{

  		// $login_correo = $this->input->post('f_login_correo');

		// $login_password = $this->input->post('f_login_password');

		

		//Prueba

		

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

    		return $usuario;

	}



	public function obtenerLocalesUsuario($idUsuario){

	

		$arrayLocales2 = array(); 

		

		$arrayLocales = $this->establecimientosusuarios_model->obtener_por_id_usuario($idUsuario);

		

		foreach ($arrayLocales as $row){

      	    $id=  $row->id_local;

      	    $local = $this->establecimientos_model->obtener($id);

      	    array_push($arrayLocales2, $local);

			

  		}



		return $arrayLocales2;



	}

	

	public function insertarHora(){

		

		$idUsuario = $this->input->post('idUsuario');

		$idLocal = $this->input->post('idUsuario');

		$tipo =  $this->input->post('tipo');

		$hora = $this->input->get('hora');

		

		$data = array(

        'id_persona' => $idUsuario,

        'id_local'  => $idLocal,

        'tipo'  => $tipo,

        'fecha'  => $hora,

        'fecha_serv'  => date("G:H:s")

		);

		$this->registros_model->alta($data);

	}

  

}

