<?php
require_once '../../models/dto/Categoria.php';


 class Producto
{
    public int $Id_producto = 0;
    public ?string $Nombre = "";
    public ?float $Precio = 0.0;
    public ?string $Url_imagen = "";
    public Categoria $Categoria;
    public int $Prod_estado = 1;

    public function __construct($Valor_ProductoDTO)
    {
       
        if (isset($Valor_ProductoDTO)) {
            $this->Id_producto=$Valor_ProductoDTO['id_producto'];
            $this->Nombre=$Valor_ProductoDTO['nombre'];
            $this->Precio=$Valor_ProductoDTO['precio'];
            $this->Url_imagen=$Valor_ProductoDTO['url_imagen'];
            $id_cat = $Valor_ProductoDTO['id_categoria'];
            $nom_cat = $Valor_ProductoDTO['nombre_categoria'];
            $this->Categoria = new Categoria($id_cat,$nom_cat);
            $this->Prod_estado=$Valor_ProductoDTO['prod_estado'];
        }
            
    }

}


?>