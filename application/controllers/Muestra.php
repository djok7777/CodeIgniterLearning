<?php
class Muestra extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('muestra_model');
        $this->load->model('empresa_model');
        $this->load->model('particular_model');
        $this->load->model('tipoanalisis_model');
        $this->load->model('resultadoanalisis_model');
    }
    
    public function formRecepcion() {
        $data['title'] = "Recececión de muestra";
        $data['analisis'] = $this->tipoanalisis_model->get_tipoAnalisis();
        $cliente['rut'] = "";
        $cliente['nombre'] = "";
        $cliente['tipo'] = "";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('muestra/formRecepcion.php', $cliente);
        $this->load->view('templates/footer.php');
    }
   
    public function agregarMuestra() {
        $rutCapturado = $this->input->post('txtRut2');
        $muestra = array(
        'fechaRecepcion' => $this->input->post('txtFechaRecepcion'),
        'temperaturaMuestra' => $this->input->post('txtTemperatura'),
        'cantidadMuestra' => $this->input->post('txtCantidad'),
            //PONER RUT DESDE LA SESION!!!
        'Empresa_codigoEmpresa' => null,
        'Particular_codigoParticular' => null,
        'Empleado_rutEmpleado' => $this->session->user['rut']);
            
        $time = strtotime($muestra['fechaRecepcion']);
        $muestra['fechaRecepcion'] = date('Y-m-d',$time);
        $empresa = $this->empresa_model->retornarEmpresa($rutCapturado);
        $particular = $this->particular_model->retornarParticular($rutCapturado);
        
        if (count($empresa) > 0) {
            $muestra['Empresa_codigoEmpresa'] = $empresa[0]['codigoEmpresa'];
        }
        else if (count($particular > 0)){
            $muestra['Particular_codigoParticular'] = $particular[0]['codigoParticular'];
        }
        
        $idUltimo = $this->muestra_model->nuevo($muestra);
        
        
        //CREACIÓN RESULTADO DE ANALISÍS FASE PREELIMINAR
        $resultado = array(
        'TipoAnalisis_idTipoAnalisis' => $this->input->post('selectAnalisis'),
        'AnalisisMuestras_idAnalisisMuestras' => $idUltimo,
        'fechaRegistro' => date('Y-m-d'),
        'PPM' => 0,
        'estado' => 0,
        'Empleado_rutEmpleado' => '12013130-3');
        $this->resultadoanalisis_model->nuevo($resultado);
    }
    
    public function buscarMuestra(){
        $data['title'] = "Recepeción de muestra";
        $cliente['rut'] = $this->input->post('txtRut');
        $data['analisis'] = $this->tipoanalisis_model->get_tipoAnalisis();
        $empresa = $this->empresa_model->retornarEmpresa($cliente['rut']);
        $particular = $this->particular_model->retornarParticular($cliente['rut']);
        
        if (count($empresa) > 0) {
            $cliente['nombre'] = $empresa[0]['nombreEmpresa'];
            $cliente['tipo'] = "empresa";
        }
        else if(count($particular) > 0){
            $cliente['nombre'] = $particular[0]['nombreParticular'];
            $cliente['tipo'] = "particular";
        }
        else{
            $cliente['nombre'] = "";
        }
        
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('muestra/formRecepcion.php',$cliente);
        $this->load->view('templates/footer.php');
        
    }

}
