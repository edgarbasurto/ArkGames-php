<?php
require_once DAO_PATH . 'ContactosDAO.php';


class EmpleoController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new ContactosDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->Listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Contacto/frm_empleo.php';
      //AQUI DEBES LLAMAR POR MEDIO DE LA RUTA A LA TABLA GENERAL
    }

    public function guardar()
    {
       
      
    }


    public function delete()
    {
       
    }


    public function agregar()
    {

       
    }
}
