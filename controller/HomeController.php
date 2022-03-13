  
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

        require_once VIEW_PATH . 'Home/home.php';
    }
}
