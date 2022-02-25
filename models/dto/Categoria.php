<?php

 class Categoria
{
    public $Id_categoria = 0;
    public $Nombre_categoria = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->Id_categoria=$id;
            $this->Nombre_categoria=$nom;
        }
    }

}
?>