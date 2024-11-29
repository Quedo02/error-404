<?php
namespace Controllers;
use MVC\Router;

class ApiController {
    public static function get(Router $router, $modelo){
        $modelo = "Model\\" . ucfirst($modelo);
        try{
            $objects = $modelo::all();
            $resultado = [
                'code'=>200,
                'response'=>$objects,
            ];
            echo json_encode($resultado);
            exit;
        }catch(\Exception $e){
            $resultado = [
                'code'=>400,
                'response'=>$e
            ];
        }
    }
}