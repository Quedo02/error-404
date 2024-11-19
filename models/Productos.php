<?php
namespace Model;
class Productos extends ActiveRecord{
    private $id_producto;
    private $producto;
    private $descripcion;
    private $precio;
    private $stock;
    private $id_categoria;
    private $id_proveedor;
    protected static $tabla='productos';
    private $columnasBD=['id_producto','producto','descripcion','precio','stock','id_categoria', 'id_provedor'];

    public function __construct($args = []) {
        $this->id_producto=$args['id_producto'] ?? null;
        $this->producto=$args['producto'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->precio=$args['precio'] ?? null;
        $this->stock=$args['stock'] ?? null;
        $this->id_categoria=$args['id_categoria'] ?? null;
        $this->id_proveedor=$args['id_provedor'] ?? null;
    }
}