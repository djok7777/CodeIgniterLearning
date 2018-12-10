<?php

class Ventas extends CI_Controller  {
   function __construct() {
       parent::__construct();
       
       if ($this->session->logged_in == FALSE || !isset($this->session->logged_in)) {
           redirect('usuario/form');  
       }
       
   }
   
   public function index(){
       $data['title'] = "Módulo de Ventas";
       $this->load->view('templates/header',$data);
       $this->load->view('templates/nav');
       $this->load->view('ventas/index');
       $this->load->view('templates/footer');
   }
}
