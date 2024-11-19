<?php
namespace Model;

class Empleado extends ActiveRecord {
    public $id_empleado;
    public $nombre;
    public $puesto;
    public $email;
    public $telefono;
    public $password;
    protected static $tabla='empleados';
    public $columnasBD=['id_empleado','nombre','puesto','email','telefono','password'];

    public function __construct($args = []) {
        $this->id_empleado=$args['id_empleado'] ?? null;
        $this->nombre=$args['nombre']??'';
        $this->puesto=$args['puesto']??'';
        $this->email=$args['email']??'';
        $this->telefono=$args['telefono']?? null;
        $this->password=$args['password']??'';
    }
}
