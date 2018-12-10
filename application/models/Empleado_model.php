<?php
/**
 * Description of Empleado model
 *
 */
class Empleado_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }
    
    public function get_empleados(){
        return $this->db->get('empleado')->result_array();
    }
    
    public function nuevo($empleado) {
        //validación de lógica de negocio
            $this->db->insert('empleado', $empleado);
            return $this->db->insert_id();
    }
    
    public function eliminar($rut) {
        $this->db->delete('empleado', array('rutEmpleado' => $rut));
    }
    
    public function modificar($empleado) {        
        $this->db->set('nombreEmpleado', $empleado["nombreEmpleado"]);
        $this->db->set('passwordEmpleado', $empleado["passwordEmpleado"]);
        $this->db->where('rutEmpleado', $empleado['rutEmpleado']);
        $this->db->update('empleado');
    }
    
    public function getEmpleados($rut){
        $this->db->select("rutEmpleado, nombreEmpleado, passwordEmpleado, categoria");
        $this->db->from("empleado");
        $this->db->where('rutEmpleado', $rut);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function autentificarEmpleado($usuario) {
        $data = $this->db->get_where('empleado', array('rutEmpleado' => $usuario['rut'],
            'passwordEmpleado' => $usuario['password']));
        return count($data->result()) == 1;
    }

    public function retornarEmpleado($rut){
        $query = $this->db->query("SELECT * FROM empleado WHERE rutEmpleado = '$rut';");
        return $query->result_array();
    }
}