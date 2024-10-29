<?php

class Factiras{
    private $id_factura;
    private $id_pedido;
    private $fecha_factura;
    private $monto_total;
    private $tabla='facturas';
    private $columnasBD['id_factiura','id_pedido','fecha_factura','monto_total'];

    public function __construct($args=[]){
        $this->$id_facturas=$args['id_facturas'] ?? null;
        $this->$id_pedido=$args['id_pedido'] ?? null;
        $this->$fecha_factura=$args['fecha_factura'] ?? null;
        $this->$monto_total=$args['monto_total'] ?? null;
    }
}