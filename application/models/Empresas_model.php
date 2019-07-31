<?php
class Empresas_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('empresa', $data);
    }

    public function modifica_x_codigo($data, $codigo)
    {
        $this->db->where('empresa.codigo', $codigo);

        return $this->db->update('empresa', $data);
    }

    public function modifica_x_id($data, $id)
    {
        $this->db->where('empresa.id', $id);

        return $this->db->update('empresa', $data);
    }

    public function obtener($codigo)
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('empresa.*,
            DATE_FORMAT(empresa.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('empresa');
        $this->db->where('empresa.id_cuenta', $cuenta_id);
        $this->db->where('empresa.codigo', $codigo);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('empresa.*,
            DATE_FORMAT(empresa.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('empresa');
        $this->db->where('empresa.id_cuenta', $cuenta_id);
        $this->db->where('empresa.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}