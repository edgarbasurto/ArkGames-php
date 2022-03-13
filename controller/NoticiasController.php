<?php
require_once '../../models/dao/NoticiasDAO.php';


class NoticiasController
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new NoticiasDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        //llamo a la vista
        require_once '../../views/Noticias2/listar_noticia.php';
    }

    public function index_cuadricula()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        //llamo a la vista
        require_once '../../views/Noticias2/BernalHelen.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
        !empty($_POST['txtTitulo']) && isset($_POST['selectTema'])  &&
        isset($_POST['selectDispositivo']) && !empty($_POST['txtDescripcion']) 
        && getimagesize(($_FILES["archivo"]["tmp_name"]))) {
            
            # verificamos el formato de la imagen
            if (
                $_FILES["archivo"]["type"] == "image/jpg" ||
                $_FILES["archivo"]["type"] == "image/png" ||
                $_FILES["archivo"]["type"] == "image/jpeg"
            ) {
                # Escapa caracteres especiales
                $imagen = (file_get_contents($_FILES["archivo"]["tmp_name"]));


                $datos = [
                    "id_noticia" => $_GET['id'] ? $_GET['id'] : "",
                    "titulo" => $_POST['txtTitulo'],
                    "descripcion" => $_POST['txtDescripcion'],
                    "url_imagen" => $imagen,
                    "id_tema" => $_POST['selectTema'],
                    "id_dispositivo" => $_POST['selectDispositivo']
                ];

                // echo 'ENTRO AL IF';
                // echo var_dump($datos);
                $datos['id_noticia'] > 0
                    ? $this->modelo->actualizar($datos)
                    : $this->modelo->insertar($datos);


                header('Location: index.php');
                echo '<script>alert("Registro guardado con exito")</script>';
            } else {
                echo '<script>alert("Error: El formato de archivo tiene que ser JPG o PNG.")</script>';
                // echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
            }
        }else{
            if(isset($_GET['id'])){
                require_once '../../views/Noticias2/editar_noticia.php';
            }else{
                require_once '../../views/Noticias2/agregar_noticia.php';
            } 
        } /*else {
            $datos = [
                "id_producto" => $_REQUEST['id_noticia'],
                "titulo" => $_POST['txtTitulo'],
                "descripcion" => $_POST['txtDescripcion'],
                "id_tema" => $_POST['selectTema'],
                "id_dispositivo" => $_POST['selectDispositivo']
            ];
            // echo 'ENTRO AL ELSE';
            // echo var_dump($datos);
            //$this->modelo->actualizarSinImagen($datos);



            header('Location: index.php');
            echo '<script>alert("Registro guardado con exito")</script>';
        };*/
    }


    public function delete()
    {
        $this->modelo->eliminar($_REQUEST['id']);
        echo "<script>alert('Registro guardado con exito')</script>";
        header('Location: index.php');
    }


    public function script()
    {
        $resultados = $this->modelo->listar();
        foreach ($resultados as $noticia) {
            echo '<p>INSERT INTO noticia(id_noticia, titulo, descripcion, imagen_noticia, id_tema, id_dispositivo) 
            VALUES (' . $noticia->id_noticia . ',' . $noticia->titulo . ',' . $noticia->precio . ',' . $noticia->url_imagen . ', ' . $noticia->id_categoria . ', ' . $noticia->id_dispositivo .')</p><br>';
        }
    }


    public function nuevo()
    {
        if (isset($_REQUEST['id'])) {
            $noticias = $this->modelo->obtener($_REQUEST['id']);
            $noticia = $noticias[0];
            require_once '../../models/dao/TemaDAO.php';
            $con = new TemaDAO();
            $lista1 = $con->listar();
            require_once '../../models/dao/DispositivoDAO.php';
            $con = new DispositivoDAO();
            $lista2 = $con->listar();
            require_once '../../views/Noticias2/editar_noticia.php';

        } else {
            require_once '../../models/dao/TemaDAO.php';
            $con = new TemaDAO();
            $lista1 = $con->listar();
            require_once '../../models/dao/DispositivoDAO.php';
            $con = new DispositivoDAO();
            $lista2 = $con->listar();
            require_once '../../views/Noticias2/agregar_noticia.php';
        }
    }
}