<?php
// Fichero: application/controllers/notfound.php
class Notfound extends CI_Controller {
 
    function __construct() {
        parent::__construct();
    }
 
    function index()
    {
        $this->load->view('template/version_1/404_view');
    }
}
