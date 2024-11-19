<?php
namespace classes;

class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "project";
    public $conn;

    public function connect() {
        // Crear conexión
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname); // Añade el \ aquí

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>
