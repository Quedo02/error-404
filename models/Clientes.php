<?php

class Clientes{
    private $id_clientes;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    private $tabla='clientes';
    private $columnasBD=['id_clientes','nombre','email','telefono','direccion'];

    public function __construct($args = []) {
        $this->id_clientes=$args['id_clientes'] ?? null;
        $this->nombre=$args['nombre']??'';
        $this->email=$args['email']??'';
        $this->telefono=$args['telefono']?? null;
        $this->direccion=$args['direccion']??'';
    }

}