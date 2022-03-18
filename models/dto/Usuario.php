<?php

use PhpParser\Node\Stmt\Static_;

class Usuario
{
    public int $Id;
    public int $IdRol;
    public int $IdServidor;
    public ?string $NickName;
    public ?string $Email;
    public ?string $NombreCompleto;
    public ?string $Genero;
    public $FechaNacimiento;
    private ?string $PasswordHASH;
    public bool $Activo;
    public int $UsuarioActualizacion;
    public $FechaCreacion;
    public $FechaActualizacion;

    public function __construct()
    {
    }
    public function SetValorDTO($Valor_UsuarioDTO)
    {
        if (isset($Valor_UsuarioDTO)) {
            $this->Id = $Valor_UsuarioDTO['Id'];
            $this->IdRol = $Valor_UsuarioDTO['IdRol'];
            $this->IdServidor = $Valor_UsuarioDTO['IdServidor'];
            $this->NickName = $Valor_UsuarioDTO['NickName'];
            $this->Email = $Valor_UsuarioDTO['Email'];
            $this->Genero = $Valor_UsuarioDTO['Genero'];
            $this->FechaNacimiento = $Valor_UsuarioDTO['FechaNacimiento'];
            $this->NombreCompleto = $Valor_UsuarioDTO['NombreCompleto'];
            $this->PasswordHASH = $Valor_UsuarioDTO['PasswordHASH'];
            $this->Activo = $Valor_UsuarioDTO['Activo'];
            $this->UsuarioActualizacion = $Valor_UsuarioDTO['UsuarioActualizacion'];
            $this->FechaCreacion = $Valor_UsuarioDTO['FechaCreacion'];
            $this->FechaActualizacion = $Valor_UsuarioDTO['FechaActualizacion'];
        }
    }


    public function setPassword($pwd)
    {
        $pwd = $this->getPasswordHash($pwd);
        $this->PasswordHASH =  $pwd;
    }
    public function getPassword()
    {
        return $this->PasswordHASH;
    }
    private function getPasswordHash($pwd)
    {
        $salt = "2022#ArkGames-php";
        $pwd_salt = hash_hmac("sha256", $pwd, $salt);
        return password_hash($pwd_salt, PASSWORD_ARGON2ID);
    }
}
