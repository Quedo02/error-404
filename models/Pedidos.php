<?php

class Pedidos{
    private $id_pedido;
    private $fecha;
    private $id_clientes;
    private $total;
    private $tabla='pedidos';
    private $columnasBD=['id_pedido','fecha','id_clientes','total'];

    public function __construct($args=[]){
        $this->id_pedido=$args['is_pedido'] ?? null;
        $this->fecha=$args['fecha'] ?? null;
        $this->id_clientes['id_clientes'] ?? null;
        $this->total['total'] ?? null;
    }
}