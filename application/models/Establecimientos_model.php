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

    public function alta_empleado($data)
    {
        return $this->db->insert('establecimiento_usuarios', $data);
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
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento.id as id,
            establecimiento.nombre as nombre,
            establecimiento.direccion as direccion,
            establecimiento.codigo as codigo,
            establecimiento.id_cp as id_cp,
            establecimiento.id_provincia as id_provincia,
            establecimiento.id_ciudad as id_ciudad,
            establecimiento.id_empresa as id_empresa,
            establecimiento.estado as estado,
            
            provincia.provincia as provincia_nombre,
            poblacion.poblacion as poblacion_nombre,

            empresa.nombre as empresa_nombre,
            DATE_FORMAT(establecimiento.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado,
            
            (SELECT COUNT(establecimiento_usuarios.id) 
                FROM establecimiento_usuarios 
                WHERE establecimiento_usuarios.estado != 0 
                AND establecimiento_usuarios.id_establecimiento = establecimiento.id
                AND establecimiento_usuarios.id_cuenta = '.$cuenta_id.') as cant_empleados');
        $this->db->from('establecimiento');
        $this->db->join('provincia', 'provincia.provinciaid = establecimiento.id_provincia');
        $this->db->join('poblacion', 'poblacion.poblacionid = establecimiento.id_ciudad', 'left');
        $this->db->join('empresa', 'empresa.id = establecimiento.id_empresa');
        $this->db->where('provincia.provinciaid = poblacion.provinciaid');
        $this->db->where('establecimiento.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento.codigo', $codigo);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_x_id($id)
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento.id as id,
        establecimiento.codigo as codigo');
        $this->db->from('establecimiento');
        $this->db->where('establecimiento.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_empleados($id)
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento_usuarios.id as id,
            establecimiento_usuarios.tipo as tipo,
            establecimiento_usuarios.estado as estado,

            CONCAT(usuarios.apellido, " ", usuarios.nombre) as usuario_nombre_completo,
            usuarios.dni as usuario_dni');
        $this->db->from('establecimiento_usuarios');
        $this->db->join('usuarios', 'usuarios.id = establecimiento_usuarios.id_usuario');
        // $this->db->join('establecimiento', 'establecimiento.id = establecimiento_usuarios.id_establecimiento');
        $this->db->where('establecimiento_usuarios.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento_usuarios.id_establecimiento', $id);
        $this->db->where('establecimiento_usuarios.estado !=', 0);

        $query = $this->db->get();
        return $query->result();
    }

    public function buscar_empleado_establecimiento($usuario_id, $establecimiento_id, $cuenta_id)
    {
        $this->db->select('establecimiento_usuarios.id,
            establecimiento_usuarios.estado as estado');
        $this->db->from('establecimiento_usuarios');
        $this->db->where('establecimiento_usuarios.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento_usuarios.id_establecimiento', $establecimiento_id);
        $this->db->where('establecimiento_usuarios.id_usuario', $usuario_id);
        // $this->db->where('establecimiento_usuarios.estado !=', 0);

        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_todos()
    {
        $cuenta_id = $this->session->userdata('cuenta_id');

        $this->db->select('establecimiento.*,
            DATE_FORMAT(establecimiento.fecha_registro, "%d/%m/%Y") as fecha_registro_formateado');
        $this->db->from('establecimiento');
        $this->db->where('establecimiento.id_cuenta', $cuenta_id);
        $this->db->where('establecimiento.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

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
