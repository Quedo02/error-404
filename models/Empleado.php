<?php

class Empleado {
    private $id_empleado;
    private $nombre;
    private $puesto;
    private $email;
    private $telefono;
    private $password
    private $tabla='empleados';
    private $columnasBD=['id_empleado','nombre','puesto','email','telefono','password'];

    public function __construct($args = []) {
        $this->id_empleado=$args['id_empleado'] ?? null;
        $this->nombre=$args['nombre']??'';
        $this->puesto=$args['puesto']??'';
        $this->email=$args['email']??'';
        $this->telefono=$args['telefono']?? null;
        $this->password=$args['password']??'';
    }
}
