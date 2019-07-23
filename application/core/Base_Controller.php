<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();

    	//Carga de Modelo
    	$this->load->model('cuentas_model');

    	// Datos de la cuenta - Limitaciones
		$this->data_header['cuenta'] = $this->cuentas_model->obtener_cuenta_limitaciones($this->session->userdata('cuenta_id'));
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
}
