  
<?php
require_once DAO_PATH . 'ProductosDAO.php';
class HomeController
{

    public function __construct()
    {
    }

    // funciones del controlador
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        $productomodel = new ProductosDAO();
        $catalogo = $productomodel->listar();
        require_once VIEW_PATH . 'Home/home.php';
    }
}
