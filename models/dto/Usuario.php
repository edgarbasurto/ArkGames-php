<?php

 class Usuario
{
    public int $Id;
    public  ?string $NickName;
    public  ?string $Email;
    public ?string $NombreCompleto;
    private  $PasswordSALT;
    private  $PasswordHASH;
    public bool $Activo;
    public int $UsuarioCreacion;
    public int $UsuarioActualizacion;
    public   $FechaCreacion;
    public   $FechaActualizacion;

    public function __construct($Valor_UsuarioDTO)
    {
       
        if (isset($Valor_UsuarioDTO)){
            $this->Id=$Valor_UsuarioDTO['Id'];
            $this->NickName=$Valor_UsuarioDTO['NickName'];
            $this->Email=$Valor_UsuarioDTO['Email'];
            $this->NombreCompleto=$Valor_UsuarioDTO['NombreCompleto'];
            $this->PasswordSALT=$Valor_UsuarioDTO['PasswordSALT'];
            $this->PasswordHASH=$Valor_UsuarioDTO['PasswordHASH'];
            $this->Activo=$Valor_UsuarioDTO['Activo'];
            $this->UsuarioCreacion=$Valor_UsuarioDTO['UsuarioCreacion'];
            $this->UsuarioActualizacion=$Valor_UsuarioDTO['UsuarioActualizacion'];
            $this->FechaCreacion=$Valor_UsuarioDTO['FechaCreacion'];
            $this->FechaActualizacion=$Valor_UsuarioDTO['FechaActualizacion'];
        }
    }

}
?>