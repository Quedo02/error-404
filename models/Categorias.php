<?php

class Categorias {
    private $id_categoria;
    private $categoria;
    private $descripcion;
    private $tabla='categorias';
    private $columnasBD=['id_categoria', 'categoria', 'descripcion'];

    public function __construct($args = []) {
        $this->id=$args['id_categoria'] ?? null;
        $this->categoria=$args['categoria'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
    }
}
