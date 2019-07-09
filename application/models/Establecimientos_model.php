<?php
class Establecimientos_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('local', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('local.id', $id);

        return $this->db->update('local', $data);
    }

    public function obtener($id)
    {
        $this->db->select('local.*,
            DATE_FORMAT(local.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('local');
        $this->db->where('local.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $this->db->select('local.*,
            DATE_FORMAT(local.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('local');
        $this->db->where('local.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

    // Localidades y provincias

    public function obtener_provincias()
    {
        $this->db->select('dubi_provincias.*');
        $this->db->from('dubi_provincias');
        $query = $this->db->get();
        return $query->result();    
    }

    public function obtener_provincias_id($id)
    {
        $this->db->select('dubi_provincias.*');
        $this->db->from('dubi_provincias');
        $this->db->where('dubi_provincias.id_pais', $id);
        $query = $this->db->get();
        return $query->result();    
    }    

    public function obtener_localidades()
    {
        $this->db->select('dubi_localidades.*');
        $this->db->from('dubi_localidades');
        $query = $this->db->get();
        return $query->result();    
    }

    public function obtener_localidades_id($id)
    {
        $this->db->select('dubi_localidades.*');
        $this->db->from('dubi_localidades');
        $this->db->where('dubi_localidades.provincia_id', $id);
        $this->db->order_by('dubi_localidades.nombre', 'asc');
        $query = $this->db->get();
        return $query->result();    
    } 
}
