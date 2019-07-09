<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establecimientos extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de Modelo
		$this->load->model('establecimientos_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Establecimientos';
		$this->dataMenu["seccion"] = "establecimientos";
		$this->data_header['menu']   = $this->load->view('template/version_1/menu',$this->dataMenu,true);

		if($this->session->userdata('conectado') == 0){
			redirect(base_url().'panel/ingresar');
		}
	}

	public function index()
	{
		// $this->data_header['js_comercios']	= $this->load->view('comercios/js_comercios', $this->data_header, true);

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('establecimientos/establecimientos');
		$this->load->view('template/version_1/footer');
	}

	public function guardar()
	{
		$establecimiento_id = $this->input->post('f_establecimiento_id');

		if($establecimiento_id)
		{
			$datos_establecimiento = array(
				''		=> $this->input->post('')
			);

			if($this->establecimientos_model->modifica($datos_establecimiento, $establecimiento_id))
			{
				// Alerta - Se pudo crear
			}
			else
			{
				// Alerta - No se pudo crear
			}
		}else{
			$datos_establecimiento = array(
				''		=> $this->input->post('')
			);

			if($this->establecimientos_model->alta($datos_establecimiento))
			{
				// Alerta - Se pudo crear
			}
			else
			{
				// Alerta - No se pudo crear
			}
		}

		redirect(base_url().'establecimientos');
	}

	public function lista(){
		$this->datatables->select('dubi_comercios.id as id,
			dubi_comercios.*,

			dubi_provincias.nombre as provincia_nombre, 
			dubi_localidades.nombre as localidad_nombre,

			dubi_comercios_tipos.nombre as tipo_nombre,
			dubi_comercios_categorias.nombre as categoria_nombre,

			dubi_comercios.creado as creado,
			DATE_FORMAT(dubi_comercios.creado, "%d/%m/%Y") as creado_formateado,

			dubi_comercios.estado as estado');
		$this->datatables->from('dubi_comercios');
		$this->datatables->join('dubi_provincias', 'dubi_comercios.provincia_id = dubi_provincias.id');
		$this->datatables->join('dubi_localidades', 'dubi_comercios.localidad_id = dubi_localidades.id');
		$this->datatables->join('dubi_comercios_tipos', 'dubi_comercios.tipo_id = dubi_comercios_tipos.id');
		$this->datatables->join('dubi_comercios_categorias', 'dubi_comercios.categoria_id = dubi_comercios_categorias.id');
		$this->datatables->where('dubi_comercios.estado !=', 2);

  		echo $this->datatables->generate();
	}
}
