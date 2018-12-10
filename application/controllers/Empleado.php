<?php

class Empleado extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('empleado_model');
    }

    public function form() {
        $data['title'] = "Agregar empleado";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('empleado/form.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function modificarEmpleado($rut) {
        $data['title'] = "Modificar empleado";
        $data['empleados'] = $this->empleado_model->getEmpleados($rut);
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('empleado/modificar.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregar() {
        //Gestión del producto
        $empleado = array(
            'rutEmpleado' => $this->input->post('txtRutEmpleado'),
            'nombreEmpleado' => $this->input->post('txtNombreEmpleado'),
            'passwordEmpleado' => $this->input->post('txtPasswordEmpleado'),
            'categoria' => $this->input->post('codigo')
        );

        $id = $this->empleado_model->nuevo($empleado);
    }
    
    public function modificar() {
        //Gestión del libro
        $empleado = array(
            'rutEmpleado' => $this->input->post('txtRutEmpleado'),
            'nombreEmpleado' => $this->input->post('txtNombreEmpleado'),
            'passwordEmpleado' => $this->input->post('txtPasswordEmpleado')
        );
        
        $this->empleado_model->modificar($empleado);
        
        //Redireccionar
        redirect('site/index');
    }
    
}
