<?php
/**
 * Description of Empresa_model
 *
 */
class Particular_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }
    
    public function get_particulares(){
        return $this->db->get('particular')->result_array();
    }
    
    public function nuevo($particular) {
        //validación de lógica de negocio
            $this->db->insert('particular', $particular);
            return $this->db->insert_id();
    }
    
    public function eliminar($codigo) {
        $this->db->delete('particular', array('codigoParticular' => $codigo));
    }
    
    public function modificar($particular) {        
        $this->db->set('rutParticular', $particular["rutParticular"]);
        $this->db->set('passwordParticular', $particular|["passwordParticular"]);
        $this->db->set('nombreParticular', $particular["nombreParticular"]);
        $this->db->set('direccionParticular', $particular["direccionParticular"]);
        $this->db->set('emailParticular', $particular["emailParticular"]);
        $this->db->where('codigoParticular', $particular['codigoParticular']);
        $this->db->update('particular');
    }
    
    public function getParticulares($codigo){
        $this->db->select("codigoParticular, rutParticular, nombreParticular, passwordParticular, direccionParticular, emailParticular", FALSE);
        $this->db->from("particular");
        $this->db->where('codigoParticular', $codigo);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function autentificarParticular($usuario) {
        $data = $this->db->get_where('particular', array('rutParticular' => $usuario['rut'],
            'passwordParticular' => $usuario['password']));
        return count($data->result()) == 1;
    }

    public function retornarParticular($rut){
        $query = $this->db->query("SELECT * FROM particular WHERE rutParticular = '$rut';");
        return $query->result_array();
    }
    
}
