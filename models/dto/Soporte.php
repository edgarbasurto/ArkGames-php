<?php

class Soporte
{
    public $id_solicitud;
    public $usuario;
    public $email;
    public $telefono;
    public $servicio;
    public $producto;
    public $descripcion_problema;

    public function __construct()
    {
    }


    public function Set($Valor_SoporteDTO)
    {

        if (isset($Valor_SoporteDTO)) {
            $this->id_solicitud = $Valor_SoporteDTO['id_solicitud'];
            $this->usuario = $Valor_SoporteDTO['usuario'];
            $this->email = $Valor_SoporteDTO['email'];
            $this->telefono = $Valor_SoporteDTO['telefono'];
            $this->servicio = $Valor_SoporteDTO['servicio'];
            $this->producto = $Valor_SoporteDTO['producto'];
            $this->descripcion_problema = $Valor_SoporteDTO['descripcion_problema'];
        }
    }


    public function SetSoporte($array)
    {
        if (isset($array)) {
            $this->id_solicitud = $array['id_solicitud'];
            $this->usuario = $array['usuario'];
            $this->email = $array['email'];
            $this->telefono = $array['telefono'];
            $this->servicio = $array['servicio'];
            $this->producto = $array['producto'];
            $this->servicio = $array['servicio'];
            $this->descripcion_problema = $array['descripcion_problema'];
        }
    }
}

