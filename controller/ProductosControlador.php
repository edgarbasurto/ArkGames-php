<?php
require_once '../models/dao/ProductosDAO.php';

class ProductosControlador{
    private $modelo;

    public function __construct() {
        $this->modelo = new ProductosDAO();
    }

    // funciones del controlador
    public function index() {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        //llamo a la vista
        require_once '../views/Catalogo/BasurtoEdgar.php';
    }
}
