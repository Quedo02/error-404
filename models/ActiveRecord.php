<?php
namespace Model;
require_once __DIR__ . '/../includes/App.php'; // Ajusta la ruta según sea necesario


class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $sqlSrv;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database; // Usa la conexión existente
    }    


    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }
    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = [
            'resultado' => false,
            'id' => null
        ];
        try {
            if(!is_null($this->id)) {
                // actualizar
                $resultado = $this->actualizar();
            } else {
                // Creando un nuevo registro
                $resultado = $this->crear();
            }
        } catch (\Exception $e) {
             // En caso de error, asegúrate de que se retorne un array con error
            $resultado = [
                'resultado' => false,
                'error' => '¡Error! ' . $e->getMessage()
            ];
        }

        return $resultado;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Obtener Registro
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT $limite";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Busqueda Where con Columna 
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // SQL para Consultas Avanzadas.
    public static function SQL($consulta) {
        $query = $consulta;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // crea un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        // Construir la consulta SQL
        $columnas = array_keys($atributos);
        $valores = array_map(function($valor) {
            // Si el valor es NULL, se utiliza la palabra clave NULL en la consulta
            return $valor === null ? 'NULL' : "'$valor'";
        }, array_values($atributos));

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', $columnas);
        $query .= ") VALUES (";
        $query .= join(', ', $valores);
        $query .= ")";

        // Resultado de la consulta
        $resultado = self::$db->prepare($query);
        // echo json_encode([$resultado,"xd"]);
        // exit;
        // Ejecutar la consulta
        $resultado = $resultado->execute();
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->lastInsertId()
        ];
    }

    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            if($value === null){
                $valores[] = "{$key}=NULL";
            }else{
                $valores[] = "{$key}='{$value}'";
            }
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . $this->id . "' ";
        $query .= " LIMIT 1 "; 

        // debuguear($query);

        $resultado = self::$db->prepare($query);
        // Añadir el ID a los atributos para ejecutar la consulta
        $atributos['id'] = $this->id;

        // Ejecutar la consulta
        $resultado = $resultado->execute($atributos);
        return $resultado;
    }

    // Eliminar un registro - Toma el ID de Active Record
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = :id LIMIT 1";
        $resultado = self::$db->prepare($query);
        // Ejecutar la consulta con el ID
        $resultado = $resultado->execute(['id' => $this->id]);
        return $resultado;
    }

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query); // $db debe ser un objeto de conexión mysqli
        $array = [];
        while ($registro = $resultado->fetch_assoc()) { // Cambia a fetch_assoc() para mysqli
            $array[] = static::crearObjeto($registro);
        }
        return $array;
    }
    

    protected static function crearObjeto($registro) {
        $objeto = new \stdClass;
    
        foreach($registro as $key => $value) {
            $objeto->$key = $value;
        }
    
        return $objeto;
    }

    // protected static function crearObjeto($registro) {
    //     $objeto = new static;
        
    //     foreach($registro as $key => $value) {
    //         // Convertir el nombre de la columna a minúsculas
    //         $key = strtolower($key);
            
    //         if(property_exists($objeto, $key)) {
    //             $objeto->$key = $value;
    //         }
    //     }
    
    //     return $objeto;
    // }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === $this->id) continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = $value;
        }
        return $sanitizado;
    }

    public function sincronizar($args=[]) {
        foreach($args as $key => $value) {
        if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
        }
        }
    }
    
}