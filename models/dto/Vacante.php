<?php

 class Vacante
{
    public int $id_vacante = 0;
    public ?string $nombre_vacante = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->id_vacante=$id;
            $this->nombre_vacante=$nom;
        }
    }

}
?>