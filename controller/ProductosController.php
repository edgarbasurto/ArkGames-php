<?php
require_once '../../models/dao/ProductosDAO.php';

class ProductosController{

    private $modelo;

    public function __construct(){
        $this->modelo = new ProductosDAO();
    }

    // funciones del controlador
    public function index(){
        // llamar al modelo
       $lista = $this->modelo->listar();

        //llamo a la vista
        require_once 'views/Catalogo/listar.tabla.php';
    }

    public function guardar(){
        
        $prod = new Producto();
        
        $prod->Id_producto = $_REQUEST['txtId'];
        $prod->Nombre = $_REQUEST['txtNombre'];
        $prod->Precio = $_REQUEST['txtPrecio'];
        $prod->Url_imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        $prod->Categoria->Id_categoria = $_REQUEST['selectCategoria'];
        
       
        $prod->Id_producto > 0 
            ? $this->modelo->Actualizar($prod)
            : $this->modelo->Registrar($prod);
        
        //header('Location: BasurtoEdgar.php');
    }


    public function delete(){
        $this->modelo->eliminar($_REQUEST['id']);
        header('Location: BasurtoEdgar.php');
   }

}


