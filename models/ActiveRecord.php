<?php

class ActiveRecord {
    // Método para obtener todos los empleados
    public function getAll() {
        $query = "SELECT * FROM empleados"; // Consulta SQL
        $result = $this->conn->query($query); // Ejecuta la consulta
        return $result->fetch_all(MYSQLI_ASSOC); // Retorna todos los registros como un array asociativo
    }

    // Método para agregar un nuevo empleado
    public function add($data) {
        $query = "INSERT INTO empleados (nombre, email, password) VALUES (?, ?, ?)"; // Consulta SQL
        $stmt = $this->conn->prepare($query); // Prepara la consulta
        $stmt->bind_param("sss", $data['nombre'], $data['email'], $data['password']); // Vincula parámetros
        return $stmt->execute(); // Ejecuta la consulta
    }

    // Método para actualizar un empleado
    public function update($data) {
        $query = "UPDATE empleados SET nombre = ?, email = ?, password = ? WHERE id = ?"; // Consulta SQL
        $stmt = $this->conn->prepare($query); // Prepara la consulta
        $stmt->bind_param("sssi", $data['nombre'], $data['email'], $data['password'], $data['id']); // Vincula parámetros
        return $stmt->execute(); // Ejecuta la consulta
    }

    // Método para eliminar un empleado por ID
    public function delete($id) {
        $query = "DELETE FROM empleados WHERE id = ?"; // Consulta SQL
        $stmt = $this->conn->prepare($query); // Prepara la consulta
        $stmt->bind_param("i", $id); // Vincula el parámetro ID
        return $stmt->execute(); // Ejecuta la consulta
    }
}
?>