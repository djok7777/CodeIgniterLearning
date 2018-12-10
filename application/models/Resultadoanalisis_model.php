<?php
/**
 * Description of Empleado model
 *
 */
class Resultadoanalisis_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }
    
    public function get_analisisModel(){
        return $this->db->get('resultadoanalisis')->result_array();
    }
    
    public function nuevo($resultado) {
        //validación de lógica de negocio
            $this->db->insert('resultadoanalisis', $resultado);
            return $this->db->insert_id();
    }
    
    public function eliminar($rut) {
        $this->db->delete('empleado', array('rutEmpleado' => $rut));
    }
    
    public function actualizar($resultado) {        
        $this->db->set('nombreEmpleado', $empleado["nombreEmpleado"]);
        $this->db->set('passwordEmpleado', $empleado["passwordEmpleado"]);
        $this->db->where('rutEmpleado', $empleado['rutEmpleado']);
        $this->db->update('empleado');
    }
    
    public function retornarResultado($tipoAnalisis, $idAnalisis){
        $this->db->select("*");
        $this->db->from("resultadoanalisis");
        $this->db->where('TipoAnalisis_idTipoAnalisis', $tipoAnalisis);
        $this->db->where('AnalisisMuestras_idAnalisisMuestras', $idAnalisis);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function retornarEmpleado($rut){
        $query = $this->db->query("SELECT nombreEmpleado FROM empresa WHERE rutEmpleado = '$rut';");
        return $query->result_array();
    }
}