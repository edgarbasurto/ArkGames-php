<?php

abstract class enum
{


    final public function __construct($value)
    {
        $this->value = $value;
    }

    final public function __toString()
    {
        return $this->value;
    }

    final public static function toArray()
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}

class Genero extends enum
{
    const Masculino = 'M';
    const Femenino = 'F';
    const NoDefinido = 'N';
    public static function getName(?String $value)
    {
        switch ($value) {
            case 'M':
                return "Masculino";
            case 'F':
                return "Femenino";
            case 'N':
                return "No Definido";
        }
    }
}

class Servidores extends enum
{
    const EEUU_California = 0;
    const EEUU_Miami = 1;
    const AmericaSur = 2;
    const Europa_Oriente = 3;
    const Europa_Occidente = 4;
    const Asia_Central = 5;
    const Otros = 6;

    public static function getName(int $value)
    {
        switch ($value) {
            case 0:
                return "E.E.U.U. - California";
            case 1:
                return "E.E.U.U. - Miami";
            case 2:
                return "America del Sur";
            case 3:
                return  "Europa - Oriente";
            case 4:
                return "Europa - Occidente";
            case 5:
                return "Asia -  Central";
            case 6:
                return "Otros";
        }
    }
}

class TipoRol extends enum
{
    const Invitado = 0;
    const Administrador = 1;
    const Jugador = 2;
    const Mantenimiento = 3;

    public static function getName(int $value)
    {
        switch ($value) {
            case 0:
                return "Invitado";
            case 1:
                return "Administrador";
            case 2:
                return "Jugador";
            case 3:
                return "Mantenimiento";
        }
    }
}
