<?php
require_once DAO_PATH . 'NoticiasDAO.php';
require_once  CONTROLLER_PATH . 'Genericos.php';

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
        if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_NOTICIAS)) {
            // llamar al modelo
            $resultados =  $this->modelo->listar();
            //llamo a la vista
            require_once VIEW_PATH . 'Noticias/listar_noticia.php';
        } else {
            header('Location:index.php?c=session&a=dash');
        }
    }

    public function index_noticias()
    {
        // llamar al modelo
        $resultados =  $this->modelo->listar();
        //llenar aside
        require_once DAO_PATH . 'TemaDAO.php';
        $con = new TemaDAO();
        $lista1 = $con->listar();
        require_once DAO_PATH . 'DispositivoDAO.php';
        $con = new DispositivoDAO();
        $lista2 = $con->listar();
        //llamo a la vista
        require_once VIEW_PATH . 'Noticias/BernalHelen.php';
    }

    public function buscar() {
        // leer parametros
        $busqueda = $_GET['busqueda'];
        $i_criterio = (int)$busqueda;
        $op = $_GET['op'];
        $i_op = (int)$op;
        //comunica con el modelo
        $resultados = $this->modelo->buscar($i_criterio, $i_op);
        //llenar aside
        if(count($resultados) == 0 || $resultados == ""){
            echo '<script>alert("Pronto tendremos más noticias")</script>';
        }
        require_once DAO_PATH . 'TemaDAO.php';
        $con = new TemaDAO();
        $lista1 = $con->listar();
        require_once DAO_PATH . 'DispositivoDAO.php';
        $con = new DispositivoDAO();
        $lista2 = $con->listar();

        // comunicarnos a la vista
        require_once VIEW_PATH . 'Noticias/BernalHelen.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
        !empty($_POST['txtTitulo']) && isset($_POST['selectTema'])  &&
        isset($_POST['selectDispositivo']) && !empty($_POST['txtDescripcion'])) 
        {
            
            if(is_uploaded_file(($_FILES["archivo"]["tmp_name"]))){
                # verificamos el formato de la imagen
                if (
                    $_FILES["archivo"]["type"] == "image/jpg" ||
                    $_FILES["archivo"]["type"] == "image/png" ||
                    $_FILES["archivo"]["type"] == "image/jpeg"
                ) {
                    # Escapa caracteres especiales
                    //$imagen = (file_get_contents($_FILES["archivo"]["tmp_name"]));

                    require_once CONTROLLER_PATH . 'Genericos.php';
                    $respuesta = Genericos::GuardarArchivoServidor($_FILES["archivo"]);
                    if ($respuesta != null) {
                        echo  $respuesta;
                    } else {
                        echo "No se guardó la imagen!!\n";
                    }

                    $datos = [
                        "id_noticia" => $_GET['id'] ? $_GET['id'] : "",
                        "titulo" => $_POST['txtTitulo'],
                        "descripcion" => $_POST['txtDescripcion'],
                        "url_imagen" => $respuesta,
                        "id_tema" => $_POST['selectTema'],
                        "id_dispositivo" => $_POST['selectDispositivo']
                    ];

                    // echo 'ENTRO AL IF';
                    // echo var_dump($datos);
                    $datos['id_noticia'] > 0
                        ? $this->modelo->actualizar($datos)
                        : $this->modelo->insertar($datos);


                    header('Location: index.php?c=noticias');
                    echo '<script>alert("Registro guardado con exito")</script>';
                } else {
                    echo '<script>alert("Error: El formato de archivo tiene que ser JPG o PNG o JPEG.")</script>';
                    // echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
                }
            }else {

                if(isset($_GET['id'])){
                    $datos = [
                    "id_noticia" => $_GET['id'] ? $_GET['id'] : "",
                    "titulo" => $_POST['txtTitulo'],
                    "descripcion" => $_POST['txtDescripcion'],
                    "id_tema" => $_POST['selectTema'],
                    "id_dispositivo" => $_POST['selectDispositivo']
                    ];
                    $this->modelo->actualizarSinImagen($datos);
        
                    header('Location: index.php?c=noticias');
                    echo '<script>alert("Registro guardado con exito")</script>';
                }
            }
            
        }else{
            if (isset($_REQUEST['id'])) {
                $noticias = $this->modelo->obtener($_REQUEST['id']);
                $noticia = $noticias[0];
                require_once DAO_PATH . 'TemaDAO.php';
                $con = new TemaDAO();
                $lista1 = $con->listar();
                require_once DAO_PATH . 'DispositivoDAO.php';
                $con = new DispositivoDAO();
                $lista2 = $con->listar();
                require_once VIEW_PATH . 'Noticias/editar_noticia.php';

            }
        }   
    }

    public function delete()
    {
        if (TIENE_PERMISO(PERMISOS::PUEDE_ELIMINAR_NOTICIAS)) {
            $this->modelo->eliminar($_REQUEST['id']);
            echo "<script>alert('Registro guardado con exito')</script>";
            header('Location: index.php?c=noticias');
        } else {
            header('Location:index.php?c=session&a=dash');
        }    
    }

    public function nuevo()
    {
        if (isset($_REQUEST['id'])) {
            if (TIENE_PERMISO(PERMISOS::PUEDE_EDITAR_NOTICIAS)) {
                $noticias = $this->modelo->obtener($_REQUEST['id']);
                $noticia = $noticias[0];
                require_once DAO_PATH . 'TemaDAO.php';
                $con = new TemaDAO();
                $lista1 = $con->listar();
                require_once DAO_PATH . 'DispositivoDAO.php';
                $con = new DispositivoDAO();
                $lista2 = $con->listar();
                require_once VIEW_PATH . 'Noticias/editar_noticia.php';
            }else {
                header('Location:index.php?c=session&a=dash');
            }    

        } else {
            if (TIENE_PERMISO(PERMISOS::PUEDE_CREAR_NOTICIAS)) {
                require_once DAO_PATH . 'TemaDAO.php';
                $con = new TemaDAO();
                $lista1 = $con->listar();
                require_once DAO_PATH . 'DispositivoDAO.php';
                $con = new DispositivoDAO();
                $lista2 = $con->listar();
                require_once VIEW_PATH . 'Noticias/agregar_noticia.php';
            }else {
                header('Location:index.php?c=session&a=dash');
            }    
        }
    }
}
