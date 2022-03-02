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
        $resultados = $this->modelo->Listar();

        //llamo a la vista
        require_once '../../views/Catalogo/listar.tabla.php';
    }

    public function guardar(){
        
        $prod = new Producto();
        
        $prod->id_producto = $_REQUEST['txtId'];
        $prod->nombre = $_REQUEST['txtNombre'];
        $prod->precio = $_REQUEST['txtPrecio'];
        $prod->url_imagen = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        $prod->categoria->id_categoria = $_REQUEST['selectCategoria'];
        
       
        $prod->Id_producto > 0 
            ? $this->modelo->Actualizar($prod)
            : $this->modelo->Registrar($prod);
        
        header('Location: index.php');
    }


    public function delete(){
        $this->modelo->eliminar($_REQUEST['id']);
        header('Location: BasurtoEdgar.php');
   }

   public function nuevo(){
    require_once '../../models/dao/CategoriasDAO.php';

    $con = new CategoriasDAO();
    $lista = $con->listar();

    require_once '../../views/Catalogo/agregar.producto.php';
   }

}


