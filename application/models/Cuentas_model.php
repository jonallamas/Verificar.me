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

    public function obtener_cuenta_limitaciones($cuenta_id)
    {
        $this->db->select('cuenta.id as id,
            cuenta.id_suscripcion as id_suscripcion,
            cuenta.vencimiento_servicio as vencimiento_servicio,
            cuenta.estado as estado,

            suscripcion.cant_empresas as suscripcion_cant_empresas,
            suscripcion.cant_establecimientos as suscripcion_cant_establecimientos,
            suscripcion.cant_empleados as suscripcion_cant_empleados,

            (SELECT COUNT(empresa.id) 
                FROM empresa 
                WHERE empresa.estado != 0 
                AND empresa.id_cuenta = cuenta.id) as cant_empresas,
            (SELECT COUNT(establecimiento.id) 
                FROM establecimiento 
                WHERE establecimiento.estado != 0 
                AND establecimiento.id_cuenta = cuenta.id) as cant_establecimientos');
        $this->db->from('cuenta');
        $this->db->join('suscripcion', 'suscripcion.id = cuenta.id_suscripcion');
        $this->db->where('cuenta.id', $cuenta_id);

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
