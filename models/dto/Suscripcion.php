<?php

 class Suscripcion
{
    public $id_suscripcion;
    public $email;
    public $temas;
    public $dispositivos;
    public $frecuencia;
    public $discord;

    public function __construct()
    {
        
    }


    public function Set($Valor_SuscripcionDTO)
    {
       
        if (isset($Valor_SuscripcionDTO)) {
            $this->id_suscripcion=$Valor_SuscripcionDTO['id_suscripcion'];
            $this->email=$Valor_SuscripcionDTO['email'];
            $this->temas=$Valor_SuscripcionDTO['temas'];
            $this->dispositivos=$Valor_SuscripcionDTO['dispositivos'];
            $this->frecuencia=$Valor_SuscripcionDTO['frecuencia'];
            $this->discord=$Valor_SuscripcionDTO['discord'];
        } 
    }
}
