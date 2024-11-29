<?php
namespace Model;
class Usuarios extends ActiveRecord{
    private $id_usuario;
    private $usuario;
    private $psswd;
    protected static $tabla='usuarios';
    private $columnasBD=['id_usuario','usuario','psswd'];

    public function __construct($args=[]){
        $this->id_usuario=$args['id_usuario'] ?? null;
        $this->usuario=$args['usuario'] ?? '';
        $this->psswd['psswd'] ?? '';
    }

    public static function validateUser($usuario, $password){
        $query="SELECT * FROM usuarios WHERE usuario= $usuario AND psswd= $password";

        $resultado=self::SQL($query);
        return $resultado;
    }
}