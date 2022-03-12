<?php

 class Dispositivo
{
    public int $id_dispositivo = 0;
    public ?string $nombre_dispositivo = "";

    public function __construct($id , $nom)
    {
       
        if (isset($id) && isset($nom)) {
            $this->id_dispositivo=$id;
            $this->nombre_dispositivo=$nom;
        }
    }


}
?>