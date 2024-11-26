<?php
namespace Model;
class Facturas extends ActiveRecord{
    private $id_factura;
    private $id_pedido;
    private $fecha_factura;
    private $monto_total;
    protected static $tabla='facturas';
    private $columnasBD=['id_factura','id_pedido','fecha_factura','monto_total'];

    public function __construct($args=[]){
        $this->id_factura=$args['id_factura'] ?? null;
        $this->id_pedido=$args['id_pedido'] ?? null;
        $this->fecha_factura=$args['fecha_factura'] ?? null;
        $this->monto_total=$args['monto_total'] ?? null;
    }
}