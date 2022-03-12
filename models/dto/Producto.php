<?php
require_once DTO_PATH . 'Categoria.php';

class Producto
{
    public $id_producto;
    public $nombre;
    public ?float $precio;
    public $url_imagen;
    public Categoria $categoria;
    public $prod_estado;

    public function __construct()
    {
    }


    public function Set($Valor_ProductoDTO)
    {

        if (isset($Valor_ProductoDTO)) {
            $this->id_producto = $Valor_ProductoDTO['id_producto'];
            $this->nombre = $Valor_ProductoDTO['nombre'];
            $this->precio = $Valor_ProductoDTO['precio'];
            $this->url_imagen = $Valor_ProductoDTO['url_imagen'];
            $id_cat = $Valor_ProductoDTO['id_categoria'];
            $nom_cat = $Valor_ProductoDTO['nombre_categoria'];
            $this->categoria = new Categoria($id_cat, $nom_cat);
            $this->prod_estado = $Valor_ProductoDTO['prod_estado'];
        }
    }

    public function SetCategoria(Categoria $cat)
    {
        if (isset($cat)) {
            $id_cat = $cat['id_categoria'];
            $nom_cat = $cat['nombre_categoria'];
            $this->categoria = new Categoria($id_cat, $nom_cat);
        }
    }

    public function SetProducto($array)
    {
        if (isset($array)) {
            $this->id_producto = $array['id_producto'];
            $this->nombre = $array['nombre'];
            $this->precio = $array['precio'];
            $this->url_imagen = $array['url_imagen'];
            $this->prod_estado = $array['prod_estado'];
        }
    }
}
