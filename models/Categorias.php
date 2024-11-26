<?php
namespace Model;
class Categorias extends ActiveRecord {
    private $id_categoria;
    private $categoria;
    private $descripcion;
    protected static $tabla='categorias';
    private $columnasBD=['id_categoria', 'categoria', 'descripcion'];

    public function __construct($args = []) {
        $this->id_categoria=$args['id_categoria'] ?? null;
        $this->categoria=$args['categoria'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
    }
}
