<?php

class PermisosDAO
{
    public function getInstancia(int $tipoRol)
    {
        switch ($tipoRol) {
            case 0:
                return new InvitadoPerfil();
                break;
            case 1:
                return new  AdministradorPerfil();
                break;
            case 2:
                return new JugadorPerfil();
                break;
            case 3:
                return new MantenimientoPerfil();
                break;
        }
    }
}

class PERMISOS
{
    const PUEDE_ACCEDER_MANTENIMIENTO = 0;
    const PUEDE_USAR_CARRITO = 1;

    const PUEDE_VISUALIZAR_USUARIOS = 2;
    const PUEDE_CREAR_USUARIOS = 3;
    const PUEDE_EDITAR_USUARIOS = 4;
    const PUEDE_ELIMINAR_USUARIOS = 5;

    const PUEDE_CAMBIAR_PASSWORD = 6;
    const PUEDE_EDITAR_PERFIL = 7;

    const PUEDE_VISUALIZAR_PRODUCTOS = 8;
    const PUEDE_CREAR_PRODUCTOS = 9;
    const PUEDE_EDITAR_PRODUCTOS = 10;
    const PUEDE_ELIMINAR_PRODUCTOS = 11;

    const PUEDE_VISUALIZAR_NOTICIAS = 12;
    const PUEDE_CREAR_NOTICIAS = 13;
    const PUEDE_EDITAR_NOTICIAS = 14;
    const PUEDE_ELIMINAR_NOTICIAS = 15;

    const PUEDE_VISUALIZAR_SOPORTE = 16;
    const PUEDE_CREAR_SOPORTE = 17;
    const PUEDE_EDITAR_SOPORTE = 18;
    const PUEDE_ELIMINAR_SOPORTE = 19;

    const PUEDE_FINALIZAR_COMPRAR = 20;
}

class Administrador implements Perfil
{

    public function getPermisos()
    {
        $bloqueo_funciones = array();
        /** se agrega las funciones a las cuales NO SE TIENE PERMIOS para acceder **/

        /* el permiso ADMINISTRADOR tiene acceso a todo por eso no se agrega nada a esta seccion */
        return  $bloqueo_funciones;
    }
}
class Mantenimiento implements Perfil
{
    public function getPermisos()
    {
        $bloqueo_funciones = array();
        /** se agrega las funciones a las cuales NO SE TIENE PERMIOS para acceder **/

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_USUARIOS;

        return  $bloqueo_funciones;
    }
}

class Jugador implements Perfil
{
    public function getPermisos()
    {
        $bloqueo_funciones = array();
        /** se agrega las funciones a las cuales NO SE TIENE PERMIOS para acceder **/

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_PRODUCTOS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_USUARIOS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_NOTICIAS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_SOPORTE;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_SOPORTE;

        return  $bloqueo_funciones;
    }
}

class Invitado implements Perfil
{
    public function getPermisos()
    {
        $bloqueo_funciones = array();
        /** se agrega las funciones a las cuales NO SE TIENE PERMIOS para acceder **/

        $bloqueo_funciones[] = PERMISOS::PUEDE_ACCEDER_MANTENIMIENTO;
        $bloqueo_funciones[] = PERMISOS::PUEDE_FINALIZAR_COMPRAR;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_PRODUCTOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_PRODUCTOS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_USUARIOS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_USUARIOS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_CAMBIAR_PASSWORD;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_PERFIL;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_NOTICIAS;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_NOTICIAS;

        $bloqueo_funciones[] = PERMISOS::PUEDE_VISUALIZAR_SOPORTE;
        $bloqueo_funciones[] = PERMISOS::PUEDE_CREAR_SOPORTE;
        $bloqueo_funciones[] = PERMISOS::PUEDE_EDITAR_SOPORTE;
        $bloqueo_funciones[] = PERMISOS::PUEDE_ELIMINAR_SOPORTE;

        return  $bloqueo_funciones;
    }
}

abstract class PermisosFactory
{
    abstract public function fabrica(): Perfil;

    public function tieneAcceso(int $tienePermiso): bool
    {
        $perfil_actual = $this->fabrica();
        $lst = $perfil_actual->getPermisos();
        return !in_array($tienePermiso, $lst, true);
    }

    public function printRol()
    {
        $perfil_actual = $this->fabrica();
        echo  gettype($perfil_actual) . '<pre>';
        print_r($perfil_actual->getPermisos());
        echo '</pre>';
    }
}

class AdministradorPerfil extends PermisosFactory
{
    public function fabrica(): Perfil
    {
        return new Administrador();
    }
}

class MantenimientoPerfil extends PermisosFactory
{
    public function fabrica(): Perfil
    {
        return new Mantenimiento();
    }
}

class JugadorPerfil extends PermisosFactory
{
    public function fabrica(): Perfil
    {
        return new Jugador();
    }
}

class InvitadoPerfil extends PermisosFactory
{
    public function fabrica(): Perfil
    {
        return new Invitado();
    }
}

interface Perfil
{
    function getPermisos();
}
