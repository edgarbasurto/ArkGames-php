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
}
