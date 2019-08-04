<?php
class Principal_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function obtener_planes()
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('suscripcion.*');
        $this->db->from('suscripcion');
        $this->db->where('suscripcion.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}