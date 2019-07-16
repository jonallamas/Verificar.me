<?php
class Establecimientos_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($data)
    {
        return $this->db->insert('establecimiento', $data);
    }

    public function modifica_x_codigo($data, $codigo)
    {
        $this->db->where('establecimiento.codigo', $codigo);

        return $this->db->update('establecimiento', $data);
    }

    public function modifica_x_id($data, $id)
    {
        $this->db->where('establecimiento.id', $id);

        return $this->db->update('establecimiento', $data);
    }

    public function obtener($codigo)
    {
        $this->db->select('establecimiento.*,
            DATE_FORMAT(establecimiento.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento');
        $this->db->where('establecimiento.codigo', $codigo);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $this->db->select('establecimiento.*,
            DATE_FORMAT(establecimiento.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento');
        $this->db->where('establecimiento.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

    // public function obtener_cp_typeahead($busqueda)
    // {
    //     $this->db->select('codigopostal.id, 
    //         CONCAT(gestioo_agenda_contactos.apellidos, " ", gestioo_agenda_contactos.nombre) as nombre_completo');
    //     $this->db->from('codigopostal');
    //     $this->db->where('(codigopostal.codigopostalid LIKE "'.$busqueda.'%" OR gestioo_agenda_contactos.nombre LIKE "'.$busqueda.'%" OR gestioo_agenda_contactos.dni LIKE "'.$busqueda.'%") AND gestioo_agenda_contactos.estado = 1');
    //     $this->db->limit(12);

    //     $query = $this->db->get();
    //     return $query->result();
    // } 

    // Localidades y provincias

    public function obtener_provincias()
    {
        $this->db->select('provincia.*');
        $this->db->from('provincia');
        $this->db->order_by('provincia.provincia', 'asc');
        $query = $this->db->get();
        return $query->result();    
    }

    public function obtener_provincias_id($id)
    {
        $this->db->select('provincia.*');
        $this->db->from('provincia');
        $this->db->where('provincia.provinciaid', $id);
        $query = $this->db->get();
        return $query->result();    
    }    

    public function obtener_poblaciones()
    {
        $this->db->select('poblacion.*');
        $this->db->from('poblacion');
        $query = $this->db->get();
        return $query->result();    
    }

    public function obtener_poblaciones_id($id)
    {
        $this->db->select('poblacion.*');
        $this->db->from('poblacion');
        $this->db->where('poblacion.provinciaid', $id);
        $this->db->order_by('poblacion.poblacion', 'asc');
        $query = $this->db->get();
        return $query->result();    
    } 
}
