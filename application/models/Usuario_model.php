<?php

class Usuario_model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    function autentificar($usuario) {
        $data = $this->db->get_where('usuario', array('username' => $usuario['username'],
            'password' => $usuario['password']));

        return count($data->result()) == 1;
    }

}
