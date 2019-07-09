<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercios extends Base_Controller {

	public function __construct(){
		parent::__construct();

    	$this->data_header['patch_file'] = base_url().'asset/plantillas/version_1/interface/';

		//Carga de Modelo
		$this->load->model('comercios_model');

		//Configurando el data_header
		$this->data_header['titulo'] = 'Administración de Comercios';
		$this->data_header['menu_seccion'] = 'comercios';
		// $this->data_header['menu']   = $this->load->view('menu',$this->dataMenu,true);

		if($this->session->userdata('conectado') == 0){
			redirect(base_url().'panel/ingresar');
		}
	}

	public function index()
	{
		// Migas de pan
		$this->data_header['breadcrumb'] = '<li>Comercios</li>
											<li class="active">Comercios</li>';
		$this->data_header['js_comercios']	= $this->load->view('comercios/js_comercios', $this->data_header, true);

		$this->data_header['provincias'] = $this->comercios_model->obtener_provincias();
		
		$this->load->model('comercios_categorias_model');
		$this->data_header['categorias'] = $this->comercios_categorias_model->obtener_todos();
		$this->data_header['tipos'] = $this->comercios_model->obtener_tipos();

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('comercios/comercios');
		$this->load->view('template/version_1/footer');
	}

	public function obtener_localidades()
	{
		$provincia_id = $this->input->post('provincia_id');
		$localidades = $this->comercios_model->obtener_localidades_id($provincia_id);
    	echo json_encode($localidades);
	}

	public function comercio()
	{
		$comercio_id = $this->uri->segment(4);
		$this->data_header['comercio'] = $this->comercios_model->obtener($comercio_id);

		if($this->input->is_ajax_request()){
			echo json_encode($this->data_header['comercio']);
		}
		else {
			$this->load->view('template/'.TEMPLATE.'/header', $this->data_header);
			$this->load->view('comercios/comercio');
			$this->load->view('template/'.TEMPLATE.'/footer');
		}
	}

	public function guardar()
	{
		$comercio_id = $this->input->post('f_comercio_id');

		if($comercio_id)
		{
			$datos_comercio = array(
				'nombre'		=> $this->input->post('f_nombre'),
				'logo'			=> $this->input->post('f_logo')?$this->input->post('f_logo'):0,

				'tipo_id'		=> $this->input->post('f_tipo'),
				'categoria_id'	=> $this->input->post('f_categoria'),

				'telefono'		=> $this->input->post('f_telefono'),
				'direccion'		=> $this->input->post('f_direccion'),
				'correo'		=> strtolower($this->input->post('f_correo')),

				'provincia_id'	=> $this->input->post('f_provincia'),
				'localidad_id'	=> $this->input->post('f_localidad'),
				'latitud'		=> $this->input->post('f_latitud'),
				'longitud'		=> $this->input->post('f_longitud'),
				
				'usuario_id' 	=> $this->session->userdata('usuario_id'),
				// 'estado' 		=> 1,
				'actualizado' 	=> date('Y-m-d H:i:s')
			);

			if($this->comercios_model->modifica($datos_comercio, $comercio_id))
			{
				$this->session->set_userdata(array('alerta' => 3));
			}
			else
			{
				$this->session->set_userdata(array('alerta' => 33));
			}
		}else{
			$datos_comercio = array(
				'nombre'		=> $this->input->post('f_nombre'),
				'logo'			=> $this->input->post('f_logo')?$this->input->post('f_logo'):0,

				'tipo_id'		=> $this->input->post('f_tipo'),
				'categoria_id'	=> $this->input->post('f_categoria'),

				'telefono'		=> $this->input->post('f_telefono'),
				'direccion'		=> $this->input->post('f_direccion'),
				'correo'		=> strtolower($this->input->post('f_correo')),

				'provincia_id'	=> $this->input->post('f_provincia'),
				'localidad_id'	=> $this->input->post('f_localidad'),
				'latitud'		=> $this->input->post('f_latitud'),
				'longitud'		=> $this->input->post('f_longitud'),

				'usuario_id' 	=> $this->session->userdata('usuario_id'),
				'estado' 		=> 1,
				'actualizado' 	=> date('Y-m-d H:i:s'),
				'creado'		=> date('Y-m-d H:i:s')
			);

			// echo '<pre>';
			// print_r($datos_comercio);
			// exit();

			if($this->comercios_model->alta($datos_comercio))
			{
				// $this->session->set_userdata(array('alerta' => 3));
			}
			else
			{
				// $this->session->set_userdata(array('alerta' => 33));
			}
		}

		redirect(base_url().'comercios/comercios');
	}

	public function editar(){
		$comercio_id	= $this->uri->segment(4);

		$this->data_header['comercio'] = $this->comercios_model->obtener($comercio_id);

		if($this->data_header['comercio'])
		{
			$this->data_header['js_comercios'] = $this->load->view('comercios/js_comercios', $this->data_header, true);

			$this->load->view('template/'.TEMPLATE.'/header', $this->data_header);
			$this->load->view('comercios/editar');
			$this->load->view('template/'.TEMPLATE.'/footer');
		}
		else
		{
			redirect(base_url().'comercios/comercios');
		}
	}

	public function activar(){
		$comercio_id = $this->uri->segment(4);

		$datos_comercio = array(
			'estado' 		=> 1,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->comercios_model->modifica($datos_comercio, $comercio_id))
		{
			$this->session->set_userdata(array('alerta' => 4));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 44));
		}

		redirect(base_url().'comercios/comercios');
	}

	public function eliminar(){
		$comercio_id = $this->uri->segment(4);

		$datos_comercio = array(
			'estado' 		=> 2,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->comercios_model->modifica($datos_comercio, $comercio_id))
		{
			$this->session->set_userdata(array('alerta' => 9));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 99));
		}

		redirect(base_url().'comercios/comercios');
	}

	public function suspender(){
		$comercio_id = $this->uri->segment(4);

		$datos_comercio = array(
			'estado' 		=> 0,
			'actualizado' 	=> date('Y-m-d H:i:s')
		);

		if($this->comercios_model->modifica($datos_comercio, $comercio_id))
		{
			$this->session->set_userdata(array('alerta' => 2));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 22));
		}

		redirect(base_url().'comercios/comercios');
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
