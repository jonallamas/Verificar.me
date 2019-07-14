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
		$this->data_header['provincias'] = $this->establecimientos_model->obtener_provincias();

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('establecimientos/establecimientos');
		$this->load->view('template/version_1/footer');
	}

	public function obtener_poblaciones()
	{
		$provincia_id = $this->input->post('provincia_id');
		$poblaciones = $this->establecimientos_model->obtener_poblaciones_id($provincia_id);
    	echo json_encode($poblaciones);
	}

	public function guardar()
	{
		if(!$this->input->post()){
			redirect(base_url().'establecimientos');
			exit();
		}

		$establecimiento_id = $this->input->post('f_establecimiento_id');

		if($establecimiento_id)
		{
			$datos_establecimiento = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'nombre'		=> $this->input->post('f_establecimiento_nombre'),
				'direccion'		=> $this->input->post('f_establecimiento_direccion'),
				'id_ciudad'		=> $this->input->post('f_establecimiento_provincia'),
				'id_provincia'	=> $this->input->post('f_establecimiento_poblacion'),
				'id_cp'			=> $this->input->post('f_establecimiento_cod_postal'),
				
				'id_usuario'	=> $this->session->userdata('usuario_id'),
				'fecha_registro'=> date('Y-m-d H:i:s')
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
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'nombre'		=> $this->input->post('f_establecimiento_nombre'),
				'direccion'		=> $this->input->post('f_establecimiento_direccion'),
				'id_ciudad'		=> $this->input->post('f_establecimiento_provincia'),
				'id_provincia'	=> $this->input->post('f_establecimiento_poblacion'),
				'id_cp'			=> $this->input->post('f_establecimiento_cod_postal'),
				
				'id_usuario'	=> $this->session->userdata('usuario_id'),
				'fecha_registro'=> date('Y-m-d H:i:s'),
				'estado'		=> 1
			);

			if($this->establecimientos_model->alta($datos_establecimiento))
			{
				$establecimiento_id = $this->db->insert_id();
				$codigo = $this->generateRandomString(16, $establecimiento_id).$establecimiento_id;
				$datos_codigo = array(
					'codigo' 	=> $codigo
				);
				$this->establecimientos_model->modifica($datos_codigo, $establecimiento_id);
				// Alerta - Se pudo crear
				$this->session->set_userdata(array('alerta' => 3));
			}
			else
			{
				// Alerta - No se pudo crear
			}
		}

		redirect(base_url().'establecimientos');
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

	public function lista(){
		$cuenta_id = $this->session->userdata('cuenta_id');

		$this->datatables->select('local.id as id,
			local.nombre as nombre,
			local.id_ciudad as id_ciudad,
			local.id_provincia as id_provincia,
			local.id_cp as id_cp,
			local.codigo as codigo,

			local.id_ciudad as id_ciudad,
			poblacion.poblacionid as poblacion_id,

			provincia.provincia as provincia_nombre,
			poblacion.poblacion as poblacion_nombre,

			local.fecha_registro as fecha_registro,
			DATE_FORMAT(local.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado,

			local.estado as estado');
		$this->datatables->from('local');
		$this->datatables->join('provincia', 'provincia.provinciaid = local.id_provincia');
		$this->datatables->join('poblacion', 'poblacion.poblacionid = local.id_ciudad', 'left');
		$this->datatables->where('poblacion.provinciaid = provincia.provinciaid');
		$this->datatables->where('local.id_cuenta', $cuenta_id);
		$this->datatables->where('local.estado !=', 0);

  		echo $this->datatables->generate();
	}
}
