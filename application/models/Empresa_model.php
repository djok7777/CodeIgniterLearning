<?php
/**
 * Description of Empresa_model
 *
 */
class Empresa_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }
    
    public function get_empresas(){
        return $this->db->get('empresa')->result_array();
    }
    
    public function nuevo($empresa) {
        //validación de lógica de negocio
            $this->db->insert('empresa', $empresa);
            return $this->db->insert_id();
    }
    
    public function eliminar($codigo) {
        $this->db->delete('empresa', array('codigoEmpresa' => $codigo));
    }
    
    public function modificar($empresa) {        
        $this->db->set('rutEmpresa', $empresa["rutEmpresa"]);
        $this->db->set('nombreEmpresa', $empresa["nombreEmpresa"]);
        $this->db->set('passwordEmpresa', $empresa["passwordEmpresa"]);
        $this->db->set('direccionEmpresa', $empresa["direccionEmpresa"]);
        $this->db->where('codigoEmpresa', $empresa['codigoEmpresa']);
        $this->db->update('empresa');
    }
    
    public function getEmpresa($codigo){
        $this->db->select("codigoEmpresa, rutEmpresa, nombreEmpresa, passwordEmpresa, direccionEmpresa", FALSE);
        $this->db->from("empresa");
        $this->db->where('codigoEmpresa', $codigo);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function autentificarEmpresa($usuario) {
        $data = $this->db->get_where('empresa', array('rutEmpresa' => $usuario['rut'],
            'passwordEmpresa' => $usuario['password']));
        return count($data->result()) == 1;
    }

    public function retornarEmpresa($rut){
        $query = $this->db->query("SELECT * FROM empresa WHERE rutEmpresa = '$rut';");
        return $query->result_array();
    }
    
}
