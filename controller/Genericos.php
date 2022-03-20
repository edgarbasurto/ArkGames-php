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

require_once DAO_PATH . 'UsuarioDAO.php';
require_once DAO_PATH . 'AccesoDAO.php';
require_once  DTO_PATH . 'Acceso.php';
require_once  DTO_PATH . 'Session.php';

function getdefaultSession()
{ //Rafael1108

    $mySession = new Session();

    $mySession->Session = '00000000-0000-0000-0000-000000000000';
    $mySession->Usuario = -1;
    $mySession->Perfil = 0;
    $mySession->NombrePerfil = TipoRol::getName(0);
    $mySession->Email = '';
    $mySession->NombreCompleto = 'Invitado';
    //Se instancia session
    if (!isset($_SESSION)) {
        session_start();
    };
    $_SESSION["mySession"] = $mySession;

    setcookie("mySession", "00000000-0000-0000-0000-000000000000", time() - 3600, "/");
    setcookie("mySession", "00000000-0000-0000-0000-000000000000", time() + 3600, "/");
    return  $mySession;
}

function getSessionActual()
{

    if (isset($_COOKIE["mySession"])) {
        $IdSession =  $_COOKIE["mySession"];

        if ($IdSession != '00000000-0000-0000-0000-000000000000') {

            $modelo_acceso = new AccesoDAO();
            $modelo_Usuario = new UsuarioDAO();

            $registros = $modelo_acceso->GetById($IdSession);

            if (empty($registros[0]) == false) {
                $ObjAcceso = $registros[0];
                $ObjUsuario = $modelo_Usuario->GetById($ObjAcceso->IdUsuario)[0];

                $mySession = new Session();
                $mySession->Session = $IdSession;
                $mySession->Usuario = $ObjUsuario->Id;
                $mySession->Perfil = $ObjUsuario->IdRol;
                $mySession->NombrePerfil = TipoRol::getName($ObjUsuario->IdRol);
                $mySession->Email = $ObjUsuario->Email;
                $mySession->NombreCompleto = $ObjUsuario->NombreCompleto;
                //Se instancia session
                if (!isset($_SESSION)) {
                    session_start();
                };
                $_SESSION['mySession'] = $mySession;
                return  $mySession;
            } else {
                return getdefaultSession();
            }
        } else {
            return getdefaultSession();
        }
    } else {
        return getdefaultSession();
    }
}


function getBrowser($user_agent)
{

    if (strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif (strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif (strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif (strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif (strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'No hemos podido detectar su navegador';
}
