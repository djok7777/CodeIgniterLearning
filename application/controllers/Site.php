<?php
class Site extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('empresa_model');
    }
    
    public function index(){
        $data['title'] = "Inicio";
        

        $this->load->view('templates/header.php',$data);
        $this->load->view('templates/nav.php');
        $this->load->view('site/index.php');
        $this->load->view('templates/footer.php');
    }
}