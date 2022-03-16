<?php
require_once DTO_PATH . 'Acceso.php';
require_once DTO_PATH . 'Usuario.php';
require_once DTO_PATH . 'Enumeradores.php';
class Session
{
    public string $Session;
    public int $Usuario;
    public int $Perfil;
    public ?string $Email;
    public ?string $NombreCompleto;
    public ?string $NombrePerfil;

    public function __construct()
    {
    }
    public function SetValorDTO($Session, $Usuario)
    {
        if (isset($Session, $Usuario)) {
            $this->Session = $Session->Id;
            $this->Usuario = $Usuario->Id;
            $this->NombrePerfil = TipoRol::getName($Usuario->IdRol);
            $this->Perfil = $Usuario->IdRol;
            $this->Email = $Usuario->Email;
            $this->NombreCompleto = $Usuario->NombreCompleto;
        }
    }
}
