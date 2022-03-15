  
<?php

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

        require_once DAO_PATH . 'ProductosDAO.php';
        $productomodel = new ProductosDAO();
        $catalogo = $productomodel->listar();

        require_once DAO_PATH . 'NoticiasDAO.php';
        $noticiasmodel = new NoticiasDAO();

        $lst = $noticiasmodel->listar();
        $noticias = $lst;
        // for ($i = 0; $i < 2; $i++) {
        //     $obj = $lst[mt_rand(0, count($personajes) - 1)];
        //     //$noticias[] = ;
        // }
        require_once VIEW_PATH . 'Home/home.php';
    }
}
