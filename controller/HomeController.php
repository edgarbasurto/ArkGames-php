  
<?php

class HomeController
{

    public function __construct()
    {
    }

    // funciones del controlador
    public function index()
    {
        require_once DAO_PATH . 'ProductosDAO.php';
        $productomodel = new ProductosDAO();
        $catalogo = $productomodel->listar();

        require_once DAO_PATH . 'NoticiasDAO.php';
        $noticiasmodel = new NoticiasDAO();

        $lst = $noticiasmodel->listar();
        //$noticias = $lst;
        for ($i = 0; $i < 2; $i++) {
            $obj = $lst[mt_rand(0, count($lst) - 1)];
            $noticias[] =    $obj;
        }
        require_once VIEW_PATH . 'Home/home.php';
    }
}
