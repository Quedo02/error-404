<?php
namespace Model;
class Clientes extends ActiveRecord{
    private $id_clientes;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    protected static $tabla='clientes';
    private $columnasBD=['id_clientes','nombre','email','telefono','direccion'];

    public function __construct($args = []) {
        $this->id_clientes=$args['id_clientes'] ?? null;
        $this->nombre=$args['nombre']?? '';
        $this->email=$args['email']?? '';
        $this->telefono=$args['telefono']?? null;
        $this->direccion=$args['direccion']?? '';
    }

}