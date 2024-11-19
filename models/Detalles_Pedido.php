<?php
namespace Model;
class Detalles_Pedido extends ActiveRecord{
    private $id_detalle;
    private $id_pedido;
    private $id_producto;
    private $cantidad;
    private $precio_unitario;
    protected static $tabla='detalles_pedido';
    private $columnasBD=['id_detalle','id_pedido','id_producto','cantidad','precio_unitario'];

    public function __construct($args=[]){
        $this->id_detalle=$args['id_detalle'] ?? null;
        $this->id_pedido=$args['id_pedido'] ?? null;
        $this->id_producto=$args['id_producto'] ?? null;
        $this->cantidad=$args['cantidad'] ?? null;
        $this->precio_unitario=$args['precio_unitario'] ?? null;
        
    }

}