<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends Base_Controller {

	public function __construct(){
		parent::__construct();

		// Carga de Modelo
		$this->load->model('empleados_model');
		$this->load->model('establecimientos_model');

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

	public function eliminar(){
		$id = $this->uri->segment(3);

		$establecimiento_empleado = $this->empleados_model->obtener($id);
		$establecimiento = $this->establecimientos_model->obtener_x_id($establecimiento_empleado->id_establecimiento);

		$datos_empleado = array(
			'estado' => 0
		);

		if($this->empleados_model->modifica_x_id($datos_empleado, $id))
		{
			// Historial tipo
			// 0- Empleado eliminado
			// 1- Empleado agregado
			// 2- Empleado suspendido
			$datos_historial = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'id_establecimiento'	=> $establecimiento_empleado->id_establecimiento,
				'id_usuario'			=> $id,
				'tipo'					=> 0,
				
				'estado'		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado'	=> date('Y-m-d H:i:s')
			);
			$this->empleados_model->alta_historial($datos_historial);

			$this->session->set_userdata(array('alerta' => 9));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 99));
		}

		redirect(base_url().'establecimientos/establecimiento/'.$establecimiento->codigo);
	}

	public function suspender(){
		$id = $this->uri->segment(3);

		$establecimiento_empleado = $this->empleados_model->obtener($id);
		$establecimiento = $this->establecimientos_model->obtener_x_id($establecimiento_empleado->id_establecimiento);

		$datos_empleado = array(
			'estado' => 2
		);

		if($this->empleados_model->modifica_x_id($datos_empleado, $id))
		{
			$datos_historial = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'id_establecimiento'	=> $establecimiento_empleado->id_establecimiento,
				'id_usuario'			=> $id,
				'tipo'					=> 2,
				
				'estado'		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado'	=> date('Y-m-d H:i:s')
			);
			$this->empleados_model->alta_historial($datos_historial);

			$this->session->set_userdata(array('alerta' => 3));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 3));
		}

		redirect(base_url().'establecimientos/establecimiento/'.$establecimiento->codigo);
	}

	public function activar(){
		$id = $this->uri->segment(3);

		$establecimiento_empleado = $this->empleados_model->obtener($id);
		$establecimiento = $this->establecimientos_model->obtener_x_id($establecimiento_empleado->id_establecimiento);

		$datos_empleado = array(
			'estado' 		=> 1
		);

		if($this->empleados_model->modifica_x_id($datos_empleado, $id))
		{
			$datos_historial = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'id_establecimiento'	=> $establecimiento_empleado->id_establecimiento,
				'id_usuario'			=> $id,
				'tipo'					=> 1,
				
				'estado'		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado'	=> date('Y-m-d H:i:s')
			);
			$this->empleados_model->alta_historial($datos_historial);

			$this->session->set_userdata(array('alerta' => 4));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 44));
		}

		redirect(base_url().'establecimientos/establecimiento/'.$establecimiento->codigo);
	}
}
