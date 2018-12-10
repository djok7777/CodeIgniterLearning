<?php

class Producto_model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function get_productos($idcategoria = 0) {

        $this->db->select("p.idproducto, p.descripcion, p.precio, p.stock, p.imagen, c.descripcion as categoria", FALSE);
        $this->db->from("producto p");
        $this->db->join("categoria c", "c.idcategoria=p.idcategoria");

        if ($idcategoria != 0) {
            $this->db->where('p.idcategoria', $idcategoria);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function nuevo($producto) {
        //validación de lógica de negocio
        if ($producto['stock'] > 0) {
            $this->db->insert('producto', $producto);
            return $this->db->insert_id();
         }
    }

    public function eliminar($id) {
        $this->db->delete('producto', array('idproducto' => $id));
    }

    public function set_imagen($id, $ruta) {
        $this->db->set('imagen', $ruta);
        $this->db->where('idproducto', $id);
        $this->db->update('producto');
    }

   
}
