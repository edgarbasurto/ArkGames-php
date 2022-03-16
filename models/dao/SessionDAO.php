
<?php

require_once ROOT_PATH . 'config/conexion.php';
//require_once DTO_PATH . 'Session.php';
class SessionDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function GetById(int $Value)
    {
        return
            $this->sqlQuery("SELECT * FROM usuarios WHERE Activo=1 AND Id=" . $Value);
    }

    public function Insert(Usuario $Obj)
    {
        $pwd = $Obj->getPassword();
        $sql = "INSERT INTO usuarios (IdRol, IdServidor, NickName, Email, NombreCompleto, Genero, FechaNacimiento, PasswordHASH, Activo, UsuarioActualizacion, FechaCreacion, FechaActualizacion) VALUES
            ('$Obj->IdRol',$Obj->IdServidor,'$Obj->NickName','$Obj->Email','$Obj->NombreCompleto','$Obj->Genero','$Obj->FechaNacimiento', _binary '$pwd', 1, 0, NOW(), NOW())";

        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function Update(Usuario $Obj)
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
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // retorna datos para el controlador
        $ObjReturn = array();
        foreach ($usuarios  as $usuario) {
            $ObjUsuario = new Usuario();
            $ObjUsuario->SetValorDTO($usuario);
            $ObjReturn[] = $ObjUsuario;
        }
        return $ObjReturn;
    }

    public function getSessionActual()
    {
        //Rafael1108
        //Se instancia session
        if (!isset($_SESSION)) {
            session_start();
        };

        //Se genera codigo de session como invitado
        if (!isset($_SESSION['ID'])) {
            $_SESSION['ID'] = '00000000-0000-0000-0000-000000000000';
        }


        if ($_SESSION['ID'] == '00000000-0000-0000-0000-000000000000') {
            return 0;
        } else {
            return  1;
        }
    }
}
