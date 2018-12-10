<?php

class Empresa extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('empresa_model');
    }

    public function form() {
        $data['title'] = "Agregar empresa";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('empresa/form.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function modificarEmpresa($codigo) {
        $data['title'] = "Modificar empresa";
        $data['empresas'] = $this->empresa_model->getEmpresa($codigo);
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('empresa/modificar.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregar() {
        //Gestión del producto
        $empresa = array(
            'rutEmpresa' => $this->input->post('txtRutEmpresa'),
            'nombreEmpresa' => $this->input->post('txtNombreEmpresa'),
            'passwordEmpresa' => $this->input->post('txtPasswordEmpresa'),
            'direccionEmpresa' => $this->input->post('txtDireccionEmpresa')
        );

        $id = $this->empresa_model->nuevo($empresa);
    }
    
    public function modificar() {
        //Gestión del libro
        $empresa = array(
            'codigoEmpresa' => $this->input->post('txtCodigoEmpresa'),
            'rutEmpresa' => $this->input->post('txtRutEmpresa'),
            'nombreEmpresa' => $this->input->post('txtNombreEmpresa'),
            'passwordEmpresa' => $this->input->post('txtPasswordEmpresa'),
            'direccionEmpresa' => $this->input->post('txtDireccionEmpresa')
        );
        
        $this->empresa_model->modificar($empresa);
    }
}
