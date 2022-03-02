<?php

 class Categoria
{
    public int $id_categoria = 0;
    public ?string $nombre_categoria = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->id_categoria=$id;
            $this->nombre_categoria=$nom;
        }
    }


}
?>