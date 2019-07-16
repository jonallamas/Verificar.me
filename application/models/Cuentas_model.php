<?php
class Cuentas_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('cuenta', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('cuenta.id', $id);

        return $this->db->update('cuenta', $data);
    }

    public function obtener($id)
    {
        $this->db->select('cuenta.*,
            DATE_FORMAT(cuenta.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('cuenta');
        $this->db->where('cuenta.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $this->db->select('cuenta.*,
            DATE_FORMAT(cuenta.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('cuenta');
        $this->db->where('cuenta.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}
