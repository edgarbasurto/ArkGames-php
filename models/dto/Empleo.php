<?php
require_once DTO_PATH . 'Vacante.php';

class Empleo
{
    public $id_solictudEmpleo;
    public $nombre;
    public $apellido;
    public $edad;
    public $telefono;
    public $correo;
    public Vacante $vacante;
    public $experiencia;

    public function __construct()
    {
    }


    public function Set($Valor_EmpleoDTO)
    {

        if (isset($Valor_EmpleoDTO)) {
            $this->id_solictudEmpleo = $Valor_EmpleoDTO['id_solictudEmpleo'];
            $this->nombre= $Valor_EmpleoDTO['nombre'];
            $this->apellido= $Valor_EmpleoDTO['apellido'];
            $this->edad= $Valor_EmpleoDTO['edad'];
            $this->telefono= $Valor_EmpleoDTO['telefono'];
            $this->correo= $Valor_EmpleoDTO['correo'];
            $id_vacante = $Valor_NoticiaDTO['id_vacante'];
            $nom_vacante = $Valor_NoticiaDTO['nombre_vacante'];
            $this->vacante = new Vacante($id_vacante,$nom_vacante);
            $this->experiencia= $Valor_EmpleoDTO['experiencia'];
        }
    }

    public function SetVacante(Vacante $vacante) {
        if (isset($vacante)) {
            $id_vacante = $vacante['id_tema'];
            $nom_vacante = $vacante['nombre_tema'];
            $this->vacante = new Vacante($id_vacante,$nom_vacante);
        }
    }


    public function SetEmpleo($array)
    {
        if (isset($array)) {
            $this->id_solictudEmpleo = $array['id_solictudEmpleo'];
            $this->nombre = $array['nombre'];
            $this->apellido = $array['apellido'];
            $this->edad = $array['edad'];
            $this->telefono = $array['telefono'];
            $this->correo = $array['correo'];
            
            $this->experiencia = $array['experiencia'];
        }
    }
}