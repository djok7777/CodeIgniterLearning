<?php

class Resultado extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('resultadoanalisis_model');
        $this->load->model('muestra_model');
    }

    public function registrar($keys) {
        $data['title'] = "Registro de muestras";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('resultado/registrar.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function listar() {
        $data['title'] = "Listado de muestras para procesar";
        $data['analisis'] = $this->resultadoanalisis_model->get_analisisModel();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('resultado/listar.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function actualizar() {
        $resultado = array(
            'fechaRegistro' => date('Y-m-d'),
            'PPM' => $this->input->post('txtPPM'),
            'estado' => 1,
            'Empleado_rutEmpleado' => '12013130-3'
        );
        $this->resultadoanalisis_model->actualizar($resultado);
    }
    
    public function resultadoMuestra($rut) {
        $info['grafico1'] = 15.0;
        $info['grafico2'] = 10;
        $info['grafico3'] = 23.5;
        $info['grafico4'] = 12.5;
        $info['grafico5'] = 33.5;
                        
        $data['title'] = "Resultado de muestra";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('resultado/resultadoMuestra.php', $info);
        $this->load->view('templates/footer.php');
    }

}
