<?php
class EstablecimientosUsuarios_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('establecimiento_usuarios', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('establecimiento_usuarios.id', $id);

        return $this->db->update('establecimiento_usuarios', $data);
    }

    public function obtener($id)
    {
        $this->db->select('establecimiento_usuarios.*,
            DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento_usuarios');
        $this->db->where('establecimiento_usuarios.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_establecimiento_x_usuario($id)
    {
        $this->db->select('establecimiento_usuarios.*,

			establecimiento.id_empresa,
        	establecimiento.nombre as establecimiento_nombre,
        	establecimiento.direccion as establecimiento_direccion,
        	establecimiento.estado as establecimiento_estado,

        	empresa.nombre as empresa_nombre,

            DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento_usuarios');
        $this->db->join('establecimiento', 'establecimiento.id = establecimiento_usuarios.id_establecimiento');
        $this->db->join('empresa', 'empresa.id = establecimiento.id_empresa');
        $this->db->where('establecimiento_usuarios.id_usuario', $id);
        $this->db->where('establecimiento.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

    public function obtener_todos()
    {
        $this->db->select('establecimiento_usuarios.*,
            DATE_FORMAT(establecimiento_usuarios.creado, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento_usuarios');
        $this->db->where('establecimiento_usuarios.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }
}