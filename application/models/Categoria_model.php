<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria_model
 *
 * @author USRVI-LC2
 */
class Categoria_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }
    
    public function get_categorias(){
        return $this->db->get('categoria')->result_array();
    }

}
