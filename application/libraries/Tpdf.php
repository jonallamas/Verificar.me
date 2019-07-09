<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    require_once APPPATH."/third_party/tcpdf/tcpdf.php";
 
    class Tpdf extends TCPDF 
    {
        public function __construct() {
            parent::__construct();
        }

	    public function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('', 'I', 8);
            $this->Cell(90, 5,'Generado desde ManualUsuario.com',0,0,'L');
            $this->Cell(100, 5,'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),0,0,'R');
	    }
    }
