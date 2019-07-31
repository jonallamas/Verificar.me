<?php
class Empleados_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('establecimiento_usuarios', $data);
    }

    public function alta_historial($data)
    {
        return $this->db->insert('establecimiento_usuarios_historial', $data);
    }

    public function modifica_x_codigo($data, $codigo)
    {
        $this->db->where('establecimiento_usuarios.codigo', $codigo);

        return $this->db->update('establecimiento_usuarios', $data);
    }

    public function modifica_x_id($data, $id)
    {
        $this->db->where('establecimiento_usuarios.id', $id);

        return $this->db->update('establecimiento_usuarios', $data);
    }

    public function obtener($id)
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento_usuarios.*,
            DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento_usuarios');
        $this->db->where('establecimiento_usuarios.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento_usuarios.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento_usuarios.*,
            DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento_usuarios');
        $this->db->where('establecimiento_usuarios.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento_usuarios.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}