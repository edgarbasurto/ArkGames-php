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
        // require_once(VIEW_PATH .  "Catalogo/cargarfile.php");
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
                // $imagen = (file_get_contents($_FILES["archivo"]["tmp_name"]));
                require_once CONTROLLER_PATH . 'Genericos.php';
                $respuesta = Genericos::SaveFileServidor($_FILES["archivo"]);
                if ($respuesta != null) {
                    echo  $respuesta;
                } else {
                    echo "No se guardó la imagen!!\n";
                }

                $datos = [
                    "id_producto" => $_REQUEST['id_producto'],
                    "nombre" => $_POST['txtNombre'],
                    "precio" => $_POST['txtPrecio'],
                    "url_imagen" => $respuesta,
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


    public function nuevo()
    {

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
