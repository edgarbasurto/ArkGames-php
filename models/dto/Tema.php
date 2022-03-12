<?php

 class Tema
{
    public int $id_tema = 0;
    public ?string $nombre_tema = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->id_tema=$id;
            $this->nombre_tema=$nom;
        }
    }


}
?>