<?php
class Conectar
{
    protected $dbh;
    
    include_once(parametros);
    
    protected function Conexion()
    {
        try {
            
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
