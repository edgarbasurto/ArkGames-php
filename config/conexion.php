<?php
class Conectar
{
    protected $dbh;

    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=ArkgamesBD", "root", ""); //Agregar contrasenia al final
            return $conectar;

        }
        catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            print_r("ERROR DE CONEXION");
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

}
