<?php

class Particular extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('particular_model');
    }

    public function form() {
        $data['title'] = "Agregar particular";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('particular/form.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function modificarParticular($codigo) {
        $data['title'] = "Modificar libro";
        $data['particulares'] = $this->particular_model->getParticulares($codigo);
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('particular/modificar.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregar() {
        //Gestión del producto
        $particular = array(
            'rutParticular' => $this->input->post('txtRutParticular'),
            'nombreParticular' => $this->input->post('txtNombreParticular'),
            'passwordParticular' => $this->input->post('txtPasswordParticular'),
            'direccionParticular' => $this->input->post('txtDireccionParticular'),
            'emailParticular' => $this->input->post('txtEmailParticular')
        );

        $id = $this->particular_model->nuevo($particular);
    }

    public function modificar() {
        //Gestión del libro
        $particular = array(
            'codigoParticular' => $this->input->post('txtCodigoParticular'),
            'rutParticular' => $this->input->post('txtRutParticular'),
            'nombreParticular' => $this->input->post('txtNombreParticular'),
            'passwordParticular' => $this->input->post('txtPasswordParticular'),
            'direccionParticular' => $this->input->post('txtDireccionParticular'),
            'emailParticular' => $this->input->post('txtEmailParticular')
        );
        
        $this->particular_model->modificar($particular);
        
        //Redireccionar
        $this->index();
    }
}
