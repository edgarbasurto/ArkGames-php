<?php
require_once DTO_PATH . 'Tema.php';
require_once DTO_PATH . 'Dispositivo.php';

 class Noticias
{
    public $id_noticia;
    public $titulo;
    public $descripcion;
    public $url_imagen;
    public Tema $tema;
    public Dispositivo $dispositivo;
    public $fecha;

    public function __construct()
    {
        
    }


    public function Set($Valor_NoticiaDTO)
    {
       
        if (isset($Valor_NoticiaDTO)) {
            $this->id_noticia=$Valor_NoticiaDTO['id_noticia'];
            $this->titulo=$Valor_NoticiaDTO['titulo_noticia'];
            $id_tema = $Valor_NoticiaDTO['id_tema'];
            $nom_tema = $Valor_NoticiaDTO['nombre_tema'];
            $this->tema = new Tema($id_tema,$nom_tema);
            $id_dispositivo = $Valor_NoticiaDTO['id_dispositivo'];
            $nom_dispositivo = $Valor_NoticiaDTO['nombre_dispositivo'];
            $this->dispositivo = new Dispositivo($id_dispositivo,$nom_dispositivo);
            $this->fecha=$Valor_NoticiaDTO['creacion_fecha'];
            $this->descripcion=$Valor_NoticiaDTO['descripcion_noticia'];
            $this->url_imagen=$Valor_NoticiaDTO['imagen_noticia'];
        } 
    }

    public function SetTema(Tema $tema) {
        if (isset($tema)) {
            $id_tema = $tema['id_tema'];
            $nom_tema = $tema['nombre_tema'];
            $this->tema = new Tema($id_tema,$nom_tema);
        }
    }

    public function SetDispositivo(Dispositivo $dispositivo) {
        if (isset($dispositivo)) {
            $id_dispositivo = $dispositivo['id_dispositivo'];
            $nom_dispositivo = $dispositivo['nombre_dispositivo'];
            $this->dispositivo = new Dispositivo($id_dispositivo,$nom_dispositivo);
        }
    }

    public function SetNoticia($array) {
        if (isset($array)) {
            $this->id_noticia=$array['id_noticia'];
            $this->titulo=$array['titulo_noticia'];
            $this->descripcion=$array['descripcion_noticia'];
            $this->url_imagen=$array['imagen_noticia'];
            $this->fecha=$array['creacion_fecha'];
        } 
    }

}
