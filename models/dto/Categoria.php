<?php

 class Categoria
{
    public int $Id_categoria = 0;
    public ?string $Nombre_categoria = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->Id_categoria=$id;
            $this->Nombre_categoria=$nom;
        }
    }


}
?>