<?php

class Orden
{
    public string $Id;
    public int $user_id;
    public $total_price;
    public $created;
    public $modified;
    public $status;

    public $NombreUsuario;

    public function __construct()
    {
    }
    public function SetValorDTO($Valor_SessionDTO)
    {
        if (isset($Valor_SessionDTO)) {
            $this->Id = $Valor_SessionDTO['Id'];
            $this->IdUsuario = $Valor_SessionDTO['user_id'];
            $this->total_price = $Valor_SessionDTO['total_price'];
            $this->created = $Valor_SessionDTO['created'];
            $this->modified = $Valor_SessionDTO['modified'];
            $this->status = $Valor_SessionDTO['status'];
        }
    }
}
