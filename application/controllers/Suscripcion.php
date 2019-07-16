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

		$login_correo = $this->input->post('f_acceso_correo');
		$login_password = $this->input->post('f_acceso_pass');
		$login_password = md5($login_password);

		$datos_usuario = array(
			'apellido' 		=> $this->input->post('f_datos_apellido'),
			'nombre' 		=> $this->input->post('f_datos_nombre'),
			'telefono' 		=> $this->input->post('f_datos_telefono'),
			'correo' 		=> $this->input->post('f_datos_correo'),
			
			'log_correo' 	=> $login_correo,
			'log_password' 	=> $login_password,
			
			'validado' 		=> 0,
			'keymaster' 	=> NULL,
			'tipo' 			=> 1,
			
			'estado' 		=> 1,
			'creado' 		=> date('Y-m-d H:i:s'),
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->usuario_model->alta($datos_usuario)){
			$id_cliente = $this->db->insert_id();

			$this->load->model('cuentas_model');
			$fecha_actual = date("y-m-d H:i:s");

			$datos_cuenta = array(
				'id_cliente'			=> $id_cliente,

				'keymaster'				=> NULL,
				'id_suscripcion'		=> $this->input->post('f_suscripcion_plan'),
				'suscripcion_periodo'	=> $this->input->post('f_suscripcion_periodo'),
				'vencimiento_servicio'	=> date("Y-m-d H:i:s",strtotime($fecha_actual."+ 1 month")),
				
				'estado'		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado'	=> date('Y-m-d H:i:s')
			);

			$this->cuentas_model->alta($datos_cuenta);
			$id_cuenta = $this->db->insert_id();

			$usuario = $this->usuario_model->obtener($id_cliente);

			if($usuario){
				$data_session = array(
					'conectado' => 1, 
					'usuario_id' => $usuario->id, 
					'usuario_validado' => $usuario->validado, 
					'usuario_nombre' => $usuario->nombre, 
					'usuario_apellido' => $usuario->apellido, 
					'usuario_nombre_completo' => $usuario->apellido.' '.$usuario->nombre, 
					'usuario_correo' => $usuario->correo,
					'usuario_tipo' => $usuario->tipo,
					'cuenta_id' => $id_cuenta
				);

				$this->session->set_userdata($data_session);

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
	}
}
