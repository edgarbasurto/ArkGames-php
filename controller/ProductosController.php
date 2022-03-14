<?php
require_once DAO_PATH . 'ProductosDAO.php';


class ProductosController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new ProductosDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->Listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Catalogo/listar.tabla.php';
    }

    public function index_cuadricula()
    {
        // llamar al modelo
        $resultados = $this->modelo->Listar();

        //llamo a la vista
        require_once VIEW_PATH .  'Catalogo/listar.cuadricula.php';
    }

    public function guardar()
    {
        # Comprovamos que se haya subido un fichero
        if (is_uploaded_file($_FILES["archivo"]["tmp_name"])) {

            # verificamos el formato de la imagen
            if (
                $_FILES["archivo"]["type"] == "image/jpeg" ||
                $_FILES["archivo"]["type"] == "image/pjpeg" ||
                $_FILES["archivo"]["type"] == "image/gif" ||
                $_FILES["archivo"]["type"] == "image/bmp" ||
                $_FILES["archivo"]["type"] == "image/png"
            ) {

                # Escapa caracteres especiales
                $imagen = (file_get_contents($_FILES["archivo"]["tmp_name"]));


                $datos = [
                    "id_producto" => $_REQUEST['id_producto'],
                    "nombre" => $_POST['txtNombre'],
                    "precio" => $_POST['txtPrecio'],
                    "url_imagen" => $imagen,
                    "id_categoria" => $_POST['selectCategoria'],
                    "prod_estado" => 1
                ];

                // echo 'ENTRO AL IF';
                // echo var_dump($datos);
                $datos['id_producto'] > 0
                    ? $this->modelo->actualizar($datos)
                    : $this->modelo->registrar($datos);


                header('Location: index.php?c=productos');
                echo '<script>alert("Registro guardado con exito")</script>';
            } else {
                echo '<script>alert("Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.")</script>';
                // echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
            }
        } else {
            $datos = [
                "id_producto" => $_REQUEST['id_producto'],
                "nombre" => $_POST['txtNombre'],
                "precio" => $_POST['txtPrecio'],
                "id_categoria" => $_POST['selectCategoria'],
                "prod_estado" => 1
            ];
            // echo 'ENTRO AL ELSE';
            // echo var_dump($datos);
            $this->modelo->actualizarSinImagen($datos);



            header('Location: index.php?c=productos');
            echo '<script>alert("Registro guardado con exito")</script>';
        };
    }


    public function delete()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        echo "<script>alert('Registro guardado con exito')</script>";
        header('Location: index.php?c=productos');
    }


    public function script()
    {
        $resultados = $this->modelo->Listar();
        foreach ($resultados as $producto) {
            echo '<p>INSERT INTO productos(id_producto, nombre, precio, url_imagen, id_categoria, prod_estado) 
            VALUES (' . $producto->id_producto . ',' . $producto->nombre . ',' . $producto->precio . ',' . $producto->url_imagen . ', ' . $producto->id_categoria . ', 1)</p><br>';
        }
    }


    public function nuevo()
    {
        // echo var_dump($_REQUEST);
        // echo var_dump($_GET);
        // echo var_dump($_POST);
        // $producto = $this->modelo->obtener($_REQUEST['id']);
        // echo var_dump($producto);


        if (isset($_REQUEST['id'])) {
            $productos = $this->modelo->obtener($_REQUEST['id']);
            $producto = $productos[0];
            require_once DAO_PATH . 'CategoriasDAO.php';
            $con = new CategoriasDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Catalogo/agregar.producto.php';
        } else {
            require_once DAO_PATH . 'CategoriasDAO.php';
            $con = new CategoriasDAO();
            $lista = $con->listar();

            require_once VIEW_PATH . 'Catalogo/agregar.producto.php';
        }
    }
}
