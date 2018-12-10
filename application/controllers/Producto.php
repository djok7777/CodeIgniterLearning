<?php

class Producto extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
        $this->load->model('categoria_model');
    }

    public function index() {
        $data['title'] = "Todos los productos";
        $data['productos'] = $this->producto_model->get_productos();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('producto/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function view($idcategoria = 0) {
        switch ($idcategoria) {
            case 0 : $data['title'] = "Todos los productos";
                break;
            case 1 : $data['title'] = "Core";
                break;
            case 2 : $data['title'] = "Periféricos";
                break;
            case 3 : $data['title'] = "Accesorios";
                break;
        }

        $data['productos'] = $this->producto_model->get_productos($idcategoria);

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('producto/productos.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function form() {
        $data['title'] = "Nuevo Producto";
        $data['categorias'] = $this->categoria_model->get_categorias();

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/nav.php');
        $this->load->view('producto/form.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregar() {

        //Gestión del producto
        $producto = array(
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'imagen' => NULL,
            'idcategoria' => $this->input->post('categoria')
        );

        $id = $this->producto_model->nuevo($producto);

        //Gestión de la imágen
        $config['upload_path'] = './public/img/productos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 200;
        $config['max_height'] = 200;
        $config['file_name'] = $id . "_" . $producto['descripcion'];

        //Guardar imagen en directorio
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagen');

        //Guardar imagen en DB
        $img = $this->upload->data('file_name');
        $this->producto_model->set_imagen($id, $img);

        //Redireccionar
        $this->index();
    }

    public function eliminar($id) {
        $this->producto_model->eliminar($id);
        $this->index();
    }

}
