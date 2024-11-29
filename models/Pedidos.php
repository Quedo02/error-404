<?php
namespace Model;
class Pedidos extends ActiveRecord{
    private $id_pedido;
    private $fecha;
    private $id_clientes;
    private $total;
    protected static $tabla='pedidos';
    private $columnasBD=['id_pedido','fecha','id_clientes','total'];

    public function __construct($args=[]){
        $this->id_pedido=$args['id_pedido'] ?? null;
        $this->fecha=$args['fecha'] ?? null;
        $this->id_clientes['id_clientes'] ?? null;
        $this->total['total'] ?? null;
    }
}