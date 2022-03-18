<?php
class Genericos
{
    // @Rafael1108
    // funcion para almacenar imagenes en el servidor ... 
    // se debe tener en cuenta que para que funcione la carpeta /assets/img/upload debe tener 
    //  derechos de escritura Linux(0700)  
    public static function SaveFileServidor($fichero)
    {
        //estableciendo directorio a almacenar
        $ruta =  date("Y-m-d", time()) . '/';

        //comprobando existencia del directorio        
        if (!is_dir(FILES_UPLOAD . $ruta)) {

            echo FILES_UPLOAD . $ruta;
            @mkdir(FILES_UPLOAD . $ruta, 0700);
        }

        //archivo a ser guardado
        $archivo = $ruta . basename($fichero["name"]);

        // Cargando el fichero en la carpeta "subidas"
        if (move_uploaded_file($fichero["tmp_name"], FILES_UPLOAD . $archivo)) {
            return $archivo;
        } else {
            return null;
        }
    }

    public static function GuardarArchivoServidor($fichero)
    {
        //estableciendo directorio a almacenar
        $ruta =  date("Y-m-d", time()) . '/';

        //comprobando existencia del directorio        
        if (!is_dir(FILES_NOTICIAS . $ruta)) {

            echo FILES_NOTICIAS . $ruta;
            @mkdir(FILES_NOTICIAS . $ruta, 0700);
        }

        //archivo a ser guardado
        $archivo = $ruta . basename($fichero["name"]);

        // Cargando el fichero en la carpeta "subidas"
        if (move_uploaded_file($fichero["tmp_name"], FILES_NOTICIAS . $archivo)) {
            return $archivo;
        } else {
            return null;
        }
    }
}

// @Rafael1108
// funcion para generar claves unicas de 64bits ... 
function GUID()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}


require_once  DAO_PATH . 'PermisosDAO.php';
function TIENE_PERMISO(int $Permiso): bool
{
    $mySession = getSessionActual();
    $IdRol = $mySession->Perfil;
    $ObjPermisos = new PermisosDAO();
    $ObjPerfilUsuario =  $ObjPermisos->getInstancia($IdRol);
    return $ObjPerfilUsuario->tieneAcceso($Permiso);
}

function getSessionActual()
{
    require_once  DTO_PATH . 'Session.php';
    //Rafael1108
    //Se instancia session
    if (isset($_SESSION)) {
        session_start();
    };

    $mySession = new Session();
    // //Se genera codigo de session como invitado
    if (!isset($_SESSION['mySession'])) {
        $mySession->Session = '00000000-0000-0000-0000-000000000000';
        $mySession->Usuario = -1;
        $mySession->Perfil = 0;
        $mySession->NombrePerfil = TipoRol::getName(0);
        $mySession->Email = '';
        $mySession->NombreCompleto = 'Invitado';
        $_SESSION['mySession'] = $mySession;
    }

    return $_SESSION['mySession'];
}
