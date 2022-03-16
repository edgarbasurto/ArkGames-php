<?php

class Acceso
{
    public string $Id;
    public int $IdUsuario;
    public $FechaHoraAcceso;
    public ?string $NombreNavegador;
    public ?string $IP;
    public bool $Activo;

    public function __construct()
    {
    }
    public function SetValorDTO($Valor_SessionDTO)
    {
        if (isset($Valor_SessionDTO)) {
            $this->Id = $Valor_SessionDTO['Id'];
            $this->IdUsuario = $Valor_SessionDTO['IdUsuario'];
            $this->FechaHoraAcceso = $Valor_SessionDTO['FechaHoraAcceso'];
            $this->NombreNavegador = $Valor_SessionDTO['NombreNavegador'];
            $this->IP = $Valor_SessionDTO['IP'];
            $this->Activo = $Valor_SessionDTO['Activo'];
        }
    }
}
