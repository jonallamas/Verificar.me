<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Correo {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function enviar($data)
    {
        $this->CI->load->library('email');

        // Validando que esten todos los datos para el envio
        if($data['destinatario_email'] == "" || $data['asunto'] == "" || $data['destinatario_nombre'] == "" || $data['mensaje'] == "" || $data['titulo'] == ""){
            return false;
        }  
        //Configurando el Asunto
        if($data['asunto_prefijo'] != NULL){
           $data['asunto_prefijo'] = ""; 
        }else{
           $data['asunto_prefijo'] = "[".$data['asunto_prefijo']."] "; 
        }

        //Configurando el Asunto
        if($data['descripcion'] == NULL){
           $data['descripcion'] = ""; 
        }
        //Configurando el Asunto
        if($data['pie'] == NULL){
           $data['pie'] = ""; 
        }

        $asunto = $data['asunto_prefijo'].$data['asunto'];

        $imagen_url = base_url().'assets/template_correo/logo.png';
        $data['imagen'] = '<img src="'.$imagen_url.'" style="margin: 20px 0px 15px 30px">';
        
        $dataEmail = array(
            'imagen'      => $data['imagen'],
            'titulo'      => $data['titulo'],
            'descripcion' => $data['descripcion'], 
            'cuerpo'      => $data['mensaje'],
            'pie'         => $data['pie'],
            'copyright'   => 'verifica.me'
        );
        $mensaje_cuerpo = $this->CI->load->view('template_correo/base', $dataEmail, true);


        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
        ); 

        $from_email = "noreply@verifica.me";
        $from_nombre = "verifica.me";
        
        // // Envio del mensaje
        $this->CI->email->initialize($config);
        $this->CI->email->from($from_email, $from_nombre);
        $this->CI->email->subject($asunto);
        $this->CI->email->message($mensaje_cuerpo);
        $this->CI->email->to($data['destinatario_email']);
        $this->CI->email->send();

    }
}