<?php
require_once 'models/Empleado.php';
class ApiController{
    // Método para listar empleados
    public function listarEmpleados() {
        $empleado = new Empleado();
        $empleados = $empleado->getAll(); // Llama al modelo para obtener todos los empleados
        echo json_encode($empleados); // Devuelve los datos en formato JSON
    }

    // Método para agregar un empleado
    public function agregarEmpleado() {
        $data = json_decode(file_get_contents("php://input"), true); // Lee los datos del cuerpo de la solicitud
        $empleado = new Empleado();
        $result = $empleado->add($data); // Llama al modelo para agregar el empleado
        echo json_encode(['success' => $result]);
    }

    // Método para actualizar un empleado
    public function actualizarEmpleado() {
        $data = json_decode(file_get_contents("php://input"), true); // Lee los datos del cuerpo de la solicitud
        $empleado = new Empleado();
        $result = $empleado->update($data); // Llama al modelo para actualizar el empleado
        echo json_encode(['success' => $result]);
    }

    // Método para eliminar un empleado
    public function eliminarEmpleado() {
        $data = json_decode(file_get_contents("php://input"), true); // Lee los datos del cuerpo de la solicitud
        $empleado = new Empleado();
        $result = $empleado->delete($data['id']); // Llama al modelo para eliminar el empleado por ID
        echo json_encode(['success' => $result]);
    }

}