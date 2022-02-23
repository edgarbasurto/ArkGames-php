<?php
class Conectar
{
    protected $dbh;
    
   
    
    protected function Conexion()
    {
        try {
            
            $host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="ArkgamesBD";
            
            $cadena="mysql:host={$host};port={$port};dbname={$dbname}";
            $conectar = $this->dbh = new PDO($cadena,  $user, $password); 
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
