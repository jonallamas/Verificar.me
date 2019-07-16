<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de Modelo
		$this->load->model('empresas_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Empresas';
		$this->dataMenu["seccion"] = "empresas";
		$this->data_header['menu']   = $this->load->view('template/version_1/menu',$this->dataMenu,true);

		if($this->session->userdata('conectado') == 0){
			redirect(base_url().'panel/ingresar');
		}
	}

	public function index()
	{
		// $this->data_header['js_comercios']	= $this->load->view('comercios/js_comercios', $this->data_header, true);
		// $this->data_header['provincias'] = $this->establecimientos_model->obtener_provincias();

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('empresas/empresas');
		$this->load->view('template/version_1/footer');
	}

	public function guardar()
	{
		if(!$this->input->post()){
			redirect(base_url().'empresas');
			exit();
		}

		$empresa_codigo = $this->input->post('f_empresa_codigo');

		if($empresa_codigo)
		{
			$datos_empresa = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				''		=> $this->input->post(''),
				
				'id_usuario'	=> $this->session->userdata('usuario_id'),
				'fecha_registro'=> date('Y-m-d H:i:s')
			);

			if($this->empresas_model->modifica_x_codigo($datos_empresa, $empresa_codigo))
			{
				// Alerta - Se pudo crear
			}
			else
			{
				// Alerta - No se pudo crear
			}
		}else{
			$datos_empresa = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				''		=> $this->input->post(''),
				
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
				// Alerta - Se pudo crear
				$this->session->set_userdata(array('alerta' => 3));
			}
			else
			{
				// Alerta - No se pudo crear
			}
		}

		redirect(base_url().'empresas');
	}

	public function lista(){
		$cuenta_id = $this->session->userdata('cuenta_id');

		$this->datatables->select('empresa.id as id,
			empresa.nombre as nombre,
			empresa.dni as dni,
			empresa.nif as nif,

			empresa.fecha_registro as fecha_registro,
			DATE_FORMAT(empresa.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado,

			empresa.estado as estado');
		$this->datatables->from('empresa');
		$this->datatables->where('empresa.id_cuenta', $cuenta_id);
		$this->datatables->where('empresa.estado !=', 0);

  		echo $this->datatables->generate();
	}
}
