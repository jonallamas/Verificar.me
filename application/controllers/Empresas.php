<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends Base_Controller {

	public function __construct(){
		parent::__construct();

		// Carga de Modelo
		$this->load->model('empresas_model');

		// Configurando el data_header
		$this->data_header['titulo'] = 'Empresas';
		$this->dataMenu["seccion"] = "empresas";
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
		$this->data_header['js_empresas']	= $this->load->view('empresas/_js/js_empresas', $this->data_header, true);

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('empresas/empresas');
		$this->load->view('template/version_1/footer');
	}

	public function editar()
	{
		$codigo	= $this->uri->segment(3);

		$this->data_header['empresa'] = $this->empresas_model->obtener($codigo);

		if($this->data_header['empresa'])
		{
			$this->load->view('template/version_1/header', $this->data_header);
			$this->load->view('empresas/editar');
			$this->load->view('template/version_1/footer');
		}
		else{
			redirect(base_url().'empresas');
		}
	}

	public function guardar()
	{
		$cuenta = $this->data_header['cuenta'];

		if(!$this->input->post()){
			redirect(base_url().'empresas');
			exit();
		}

		$empresa_codigo = $this->input->post('f_empresa_codigo');

		if($empresa_codigo)
		{
			$datos_empresa = array(
				'id_cuenta'	=> $this->session->userdata('cuenta_id'),

				'nombre'	=> $this->input->post('f_empresa_nombre'),
				'dni'		=> $this->input->post('f_empresa_dni'),
				'nif'		=> $this->input->post('f_empresa_nif'),
				
				'id_usuario'	=> $this->session->userdata('usuario_id')
			);

			if($this->empresas_model->modifica_x_codigo($datos_empresa, $empresa_codigo))
			{
				$this->session->set_userdata(array('alerta' => 2));
			}
			else
			{
				$this->session->set_userdata(array('alerta' => 22));
			}
		}else{
			if($cuenta->cant_empresas >= $cuenta->suscripcion_cant_empresas){
				redirect(base_url().'empresas');
				exit();
			}
			$datos_empresa = array(
				'id_cuenta'	=> $this->session->userdata('cuenta_id'),

				'nombre'	=> $this->input->post('f_empresa_nombre'),
				'dni'		=> $this->input->post('f_empresa_dni'),
				'nif'		=> $this->input->post('f_empresa_nif'),
				
				'id_usuario'	=> $this->session->userdata('usuario_id'),
				'fecha_registro'=> date('Y-m-d H:i:s'),
				'estado'		=> 1
			);

			if($this->empresas_model->alta($datos_empresa))
			{
				$empresa_id = $this->db->insert_id();
				$codigo = $this->generateRandomString(16, $empresa_id).$empresa_id;
				$datos_codigo = array(
					'codigo' 	=> $codigo
				);
				$this->empresas_model->modifica_x_id($datos_codigo, $empresa_id);
				$this->session->set_userdata(array('alerta' => 1));
			}
			else
			{
				$this->session->set_userdata(array('alerta' => 11));
			}
		}

		redirect(base_url().'empresas');
	}

	public function generateRandomString($length, $id)
	{
		$id = strlen($id);
	    $characters = '1A2B3C4D5E6F7G8H9I0J1K2L3M4N5O6P7Q8R9S0T1U2V3W4X5Y6Z7';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < ($length - $id); $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function eliminar(){
		$codigo = $this->uri->segment(3);

		$datos_empresa = array(
			'estado' => 0
		);

		if($this->empresas_model->modifica_x_codigo($datos_empresa, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 9));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 99));
		}

		redirect(base_url().'empresas');
	}

	public function suspender(){
		$codigo = $this->uri->segment(3);

		$datos_empresa = array(
			'estado' => 2
		);

		if($this->empresas_model->modifica_x_codigo($datos_empresa, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 3));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 33));
		}

		redirect(base_url().'empresas');
	}

	public function activar(){
		$codigo = $this->uri->segment(3);

		$datos_empresa = array(
			'estado' 		=> 1
		);

		if($this->empresas_model->modifica_x_codigo($datos_empresa, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 4));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 44));
		}

		redirect(base_url().'empresas');
	}

	public function lista(){
		$cuenta_id = $this->session->userdata('cuenta_id');

		$this->datatables->select('empresa.id as id,
			empresa.nombre as nombre,
			empresa.dni as dni,
			empresa.nif as nif,
			empresa.codigo as codigo,

			empresa.fecha_registro as fecha_registro,
			DATE_FORMAT(empresa.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado,

			empresa.estado as estado');
		$this->datatables->from('empresa');
		$this->datatables->where('empresa.id_cuenta', $cuenta_id);
		$this->datatables->where('empresa.estado !=', 0);

  		echo $this->datatables->generate();
	}
}
