<?php
namespace Model;
class Proveedores extends ActiveRecord{
    private $id_proveedor;
    private $empresa;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    protected static $tabla='proveedores';
    private $columnasBD=['id_proveedor','empresa','nombre','email','telefono','direccion'];

    public function __construct($args=[]){
        $this->id_proveedor=$args['id_proveedor'] ?? null;
        $this->empresa=$args['empresa'] ?? '';
        $this->nombre=$args['nombre'] ?? '';
        $this->email=$args['email'] ?? '';
        $this->telefono=$args['telefono'] ?? null;
        $this->direccion=$args['direccion'] ?? null;
    }
}