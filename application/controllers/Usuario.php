<?php

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('empresa_model');
        $this->load->model('particular_model');
        $this->load->model('empleado_model');
    }

    public function form($action = "login") {
        if ($action == "login") {
            $data['title'] = "Iniciar Sesión";
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/nav.php');
            $this->load->view('usuario/login.php');
            $this->load->view('templates/footer.php');
        }
    }

    public function login() {
        $usuario = array(
            'rut' => $this->input->post('txtRutUsuario'),
            'password' => $this->input->post('txtPassword'),
            'nombre' => null,
            'tipo' => null,
            'categoria' => "0"
        );
        //Busqueda por tipo de tabla
        if ($this->empresa_model->autentificarEmpresa($usuario)) {
            $result = $this->empresa_model->retornarEmpresa($usuario['rut']);
            $usuario['nombre'] = $result[0]['nombreEmpresa'];
            $usuario['tipo'] = "empresa";
        }
        else if ($this->particular_model->autentificarParticular($usuario)) {
            $result = $this->particular_model->retornarParticular($usuario['rut']);
            $usuario['nombre'] = $result[0]['nombreParticular'];
            $usuario['tipo'] = "particular";
        }
        else if ($this->empleado_model->autentificarEmpleado($usuario)){
            $result = $this->empleado_model->retornarEmpleado($usuario['rut']);
            $usuario['nombre'] = $result[0]['nombreEmpleado'];
            $usuario['tipo'] = "empleado";
            
            $usuario['categoria'] = $result[0]['categoria'];
        }
        
        //error
        //login
        $this->session->logged_in = TRUE;
        $this->session->user = $usuario;
        redirect('site/index');
        
        $data['title'] = "Iniciar Sesión";
        $data['error'] = "Nombre de usuario o contraseña incorrecta";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('usuario/login.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function logout(){
        unset($_SESSION['user']);
        $this->session->logged_in = FALSE;
        redirect('site/index');
    }

}
