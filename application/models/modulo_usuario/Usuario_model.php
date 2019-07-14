<?php

class Usuario_model extends CI_Model {

    private $tabla;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        // $this->tabla  = 'usuarios';
    }

    public function alta($data)
    {
        return $this->db->insert('usuarios', $data);
    }

    public function modifica($data, $id)
    {
        $this->db->where('usuarios.id', $id);
        return $this->db->update('usuarios', $data);
    }

    public function obtener($id)
    {
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function obtener_cuenta($id)
    {
        $this->db->select('cuenta.*');
        $this->db->from('cuenta');
        $this->db->where('cuenta.id_cliente', $id);
        $query = $this->db->get();
        return $query->row();
    }

    // public function validar_usuario($usuario)
    // {
    //     $this->db->select('usuarios.*');
    //     $this->db->from('usuarios');
    //     $this->db->where('usuarios.usuario', $usuario);
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    public function validar_correo($correo)
    {
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.correo', $correo);
        $query = $this->db->get();
        return $query->row();

    }

    public function validar_cuenta($keymaster)
    {
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.keymaster', $keymaster);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function login($correo, $password)
    {
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.log_correo', $correo);
        $this->db->where('usuarios.log_password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

}
