
<?php

require_once ROOT_PATH . 'config/conexion.php';
require_once DTO_PATH . 'Acceso.php';
class AccesoDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function GetById($Value)
    {
        return $this->sqlQuery("SELECT * FROM accesos WHERE Activo=1 AND Id='" . $Value . "'");
    }


    public function Insert(Acceso $Obj)
    {
        $sql = "INSERT INTO accesos (Id,IdUsuario,FechaHoraAcceso,NombreNavegador,IP ) VALUES
                                 ('$Obj->Id',$Obj->IdUsuario,NOW(),'$Obj->NombreNavegador','$Obj->IP')";

        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function Update(Acceso $Obj)
    {

        $sql = "UPDATE usuarios SET IdRol='$Obj->IdRol', IdServidor=$Obj->IdServidor, Email='$Obj->Email', NombreCompleto='$Obj->NombreCompleto', Genero='$Obj->Genero', FechaNacimiento ='$Obj->FechaNacimiento', UsuarioActualizacion=0, FechaActualizacion=NOW() WHERE Id=$Obj->Id";

        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function sqlQuery(?String $sql)
    {

        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $Accesos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($Accesos  as $session) {
            $ObjAccesos = new Acceso();
            $ObjAccesos->SetValorDTO($session);
            $ObjReturn[] = $ObjAccesos;
        }
        return $ObjReturn;
    }
}
