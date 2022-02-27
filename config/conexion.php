<?php
class Conexion
{
    protected $dbh;

    public static function getConexion()
    {
        $host = "localhost";
        $port = 3306;
        $database_username = "root"; //USUARIO DE ACCESO A LA BASE DE DATOS
        $database_password = ""; //CONTRASENIA DE ACCESO A LA BASE DE DATOS
        $dbname = "ArkgamesBD"; //NOMBRE DEL ESQUEMA DE LA BASE DE DATOS
        $conectar = null;
        $cadena = "mysql:host={$host};port={$port};dbname={$dbname}";
        
        try {
            
            $conectar = new PDO($cadena, $database_username, $database_password);
           
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            print_r("ERROR DE CONEXION");
            die();
        }
        return $conectar;
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
