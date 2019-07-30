<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establecimientos extends Base_Controller {

	public function __construct(){
		parent::__construct();

		// Carga de Modelo
		$this->load->model('establecimientos_model');

		// Configurando el data_header
		$this->data_header['titulo'] = 'Establecimientos';
		$this->dataMenu["seccion"] = "establecimientos";
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
		$this->data_header['js_establecimientos']	= $this->load->view('establecimientos/js_establecimientos', $this->data_header, true);

		$this->data_header['provincias'] = $this->establecimientos_model->obtener_provincias();
		$this->load->model('empresas_model');
		$this->data_header['empresas'] = $this->empresas_model->obtener_todos();

		$this->load->view('template/version_1/header', $this->data_header);
		$this->load->view('establecimientos/establecimientos');
		$this->load->view('template/version_1/footer');
	}

	public function establecimiento()
	{
		$codigo	= $this->uri->segment(3);

		$this->data_header['js_establecimientos']	= $this->load->view('establecimientos/js_establecimientos', $this->data_header, true);

		$this->data_header['establecimiento'] = $this->establecimientos_model->obtener($codigo);
		$this->data_header['empleados'] = $this->establecimientos_model->obtener_empleados($this->data_header['establecimiento']->id);

		if($this->data_header['establecimiento'])
		{
			$this->load->view('template/version_1/header', $this->data_header);
			$this->load->view('establecimientos/establecimiento');
			$this->load->view('template/version_1/footer');
		}
		else{
			redirect(base_url().'establecimientos');
		}
	}

	public function editar()
	{
		$codigo	= $this->uri->segment(3);

		$this->data_header['js_establecimientos_editar']	= $this->load->view('establecimientos/js_establecimientos_editar', $this->data_header, true);

		$this->data_header['establecimiento'] = $this->establecimientos_model->obtener($codigo);
		$this->data_header['provincias'] = $this->establecimientos_model->obtener_provincias();
		$this->data_header['poblaciones'] = $this->establecimientos_model->obtener_poblaciones_id($this->data_header['establecimiento']->id_provincia);

		if($this->data_header['establecimiento'])
		{
			$this->load->view('template/version_1/header', $this->data_header);
			$this->load->view('establecimientos/editar');
			$this->load->view('template/version_1/footer');
		}
		else{
			redirect(base_url().'establecimientos');
		}
	}

	public function obtener_poblaciones()
	{
		$provincia_id = $this->input->post('provincia_id');
		$poblaciones = $this->establecimientos_model->obtener_poblaciones_id($provincia_id);
    	echo json_encode($poblaciones);
	}

	public function agregar_empleado()
	{
		$usuario_id = $this->input->post('f_usuario_id');
		$establecimiento_id = $this->input->post('f_establecimiento_id');

		$existe_empleado = $this->establecimientos_model->buscar_empleado_establecimiento($usuario_id, $establecimiento_id, $this->session->userdata('cuenta_id'));

		if($existe_empleado){
			$respuesta = array(
				'error' => 1,
				'empleado_id' => $existe_empleado->id
			);
		}else{
			// Empleado tipo
			// 1- Moderador/Supervisor
			// 2- Empleado normal
			$datos_empleado = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'id_establecimiento'	=> $establecimiento_id,
				'id_usuario'			=> $usuario_id,
				'tipo'					=> 2,
				
				'estado'		=> 1,
				'creado'		=> date('Y-m-d H:i:s'),
				'actualizado'	=> date('Y-m-d H:i:s')
			);

			if($this->establecimientos_model->alta_empleado($datos_empleado)){
				$empleado_id = $this->db->insert_id();

				// Historial tipo
				// 0- Empleado eliminado
				// 1- Empleado agregado
				// 2- Empleado suspendido
				$datos_historial = array(
					'id_cuenta'		=> $this->session->userdata('cuenta_id'),

					'id_establecimiento'	=> $establecimiento_id,
					'id_usuario'			=> $usuario_id,
					'tipo'					=> 1,
					
					'estado'		=> 1,
					'creado'		=> date('Y-m-d H:i:s'),
					'actualizado'	=> date('Y-m-d H:i:s')
				);

				$this->establecimientos_model->alta_empleado_historial($datos_historial);

				$respuesta = array(
					'error' => 0,
					'empleado_id' => $empleado_id
				);
			}else{
				$respuesta = array(
					'error' => 2,
					'empleado_id' => NULL
				);
			}
		}

    	echo json_encode($respuesta);
	}

	public function guardar()
	{
		$cuenta = $this->data_header['cuenta'];

		if(!$this->input->post()){
			redirect(base_url().'establecimientos');
			exit();
		}

		$establecimiento_codigo = $this->input->post('f_establecimiento_id');

		if($establecimiento_codigo)
		{
			$datos_establecimiento = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'nombre'		=> $this->input->post('f_establecimiento_nombre'),
				'direccion'		=> $this->input->post('f_establecimiento_direccion'),
				'id_ciudad'		=> $this->input->post('f_establecimiento_poblacion'),
				'id_provincia'	=> $this->input->post('f_establecimiento_provincia'),
				'id_cp'			=> $this->input->post('f_establecimiento_cod_postal'),
				
				'id_usuario'	=> $this->session->userdata('usuario_id'),
				'fecha_registro'=> date('Y-m-d H:i:s')
			);

			if($this->establecimientos_model->modifica_x_codigo($datos_establecimiento, $establecimiento_codigo))
			{
				$this->session->set_userdata(array('alerta' => 2));
			}
			else
			{
				$this->session->set_userdata(array('alerta' => 22));
			}
		}else{
			if($cuenta->cant_empresas >= $cuenta->suscripcion_cant_empresas){
				redirect(base_url().'establecimientos');
				exit();
			}
			$datos_establecimiento = array(
				'id_cuenta'		=> $this->session->userdata('cuenta_id'),

				'nombre'		=> $this->input->post('f_establecimiento_nombre'),
				'direccion'		=> $this->input->post('f_establecimiento_direccion'),
				'id_ciudad'		=> $this->input->post('f_establecimiento_poblacion'),
				'id_provincia'	=> $this->input->post('f_establecimiento_provincia'),
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
				$this->establecimientos_model->modifica_x_id($datos_codigo, $establecimiento_id);
				$this->session->set_userdata(array('alerta' => 1));
			}
			else
			{
				$this->session->set_userdata(array('alerta' => 11));
			}
		}

		redirect(base_url().'establecimientos');
	}

	public function eliminar(){
		$codigo = $this->uri->segment(3);

		$datos_establecimiento = array(
			'estado' => 0
		);

		if($this->establecimientos_model->modifica_x_codigo($datos_establecimiento, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 9));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 99));
		}

		redirect(base_url().'establecimientos');
	}

	public function suspender(){
		$codigo = $this->uri->segment(3);

		$datos_establecimiento = array(
			'estado' => 2
		);

		if($this->establecimientos_model->modifica_x_codigo($datos_establecimiento, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 3));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 3));
		}

		redirect(base_url().'establecimientos');
	}

	public function activar(){
		$codigo = $this->uri->segment(3);

		$datos_establecimiento = array(
			'estado' 		=> 1
		);

		if($this->establecimientos_model->modifica_x_codigo($datos_establecimiento, $codigo))
		{
			$this->session->set_userdata(array('alerta' => 4));
		}
		else
		{
			$this->session->set_userdata(array('alerta' => 44));
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

		$this->datatables->select('establecimiento.id as id,
			establecimiento.nombre as nombre,
			establecimiento.id_ciudad as id_ciudad,
			establecimiento.id_provincia as id_provincia,
			establecimiento.id_cp as id_cp,
			establecimiento.codigo as codigo,

			establecimiento.id_ciudad as id_ciudad,
			poblacion.poblacionid as poblacion_id,

			provincia.provincia as provincia_nombre,
			poblacion.poblacion as poblacion_nombre,

			empresa.nombre as empresa_nombre,

			establecimiento.fecha_registro as fecha_registro,
			DATE_FORMAT(establecimiento.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado,

			establecimiento.estado as estado');
		$this->datatables->from('establecimiento');
		$this->datatables->join('provincia', 'provincia.provinciaid = establecimiento.id_provincia');
		$this->datatables->join('poblacion', 'poblacion.poblacionid = establecimiento.id_ciudad', 'left');
		$this->datatables->join('empresa', 'empresa.id = establecimiento.id_empresa');
		$this->datatables->where('provincia.provinciaid = poblacion.provinciaid');
		$this->datatables->where('establecimiento.id_cuenta', $cuenta_id);
		$this->datatables->where('establecimiento.estado !=', 0);

  		echo $this->datatables->generate();
	}

	// public function lista_usuarios(){
	// 	$cuenta_id = $this->session->userdata('cuenta_id');

	// 	$this->datatables->select('usuarios.id as id,
	// 		usuarios.creado as creado,
	// 		CONCAT(usuarios.apellido, " ", usuarios.nombre) as nombre_completo,
	// 		usuarios.correo as correo,

	// 		DATE_FORMAT(usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado,
	// 		usuarios.estado as estado');
	// 	$this->datatables->from('usuarios');
	// 	$this->datatables->where('usuarios.tipo', 2);
	// 	$this->datatables->where('usuarios.estado !=', 0);

 //  		echo $this->datatables->generate();
	// }

	// public function lista_empleados(){
	// 	$cuenta_id = $this->session->userdata('cuenta_id');

	// 	$this->datatables->select('establecimiento_usuarios.id as id,
	// 		establecimiento_usuarios.creado as creado,
	// 		CONCAT(usuarios.apellido, " ", usuarios.nombre) as nombre_completo,
	// 		usuarios.correo as correo,

	// 		DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado,
	// 		establecimiento_usuarios.estado as estado');
	// 	$this->datatables->from('establecimiento_usuarios');
	// 	$this->datatables->join('usuarios', 'usuarios.id = establecimiento_usuarios.id_usuario');
	// 	$this->datatables->where('establecimiento_usuarios.tipo', 2);
	// 	$this->datatables->where('establecimiento_usuarios.estado !=', 0);

 //  		echo $this->datatables->generate();
	// }	
}
