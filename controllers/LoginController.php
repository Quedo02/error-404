<?php
namespace Controllers;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController {
    private static $secret_key; // Cambia por una clave secreta
    private const ENCRYPT_METHOD = 'HS256'; // Método de encriptación
    public static function init() {
        self::$secret_key = $_ENV['jwt_secret_key']; // Asignar la clave secreta
    }
    public static function index() {
        self::init(); // Inicializar la clave secreta
        session_start();
        $errors = [];
    
        // Verificar si es una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Método no permitido
            echo json_encode(['code' => 405, 'message' => 'Method not allowed']);
            exit;
        }
    
        // Leer y validar datos del formulario
        $data = json_decode(file_get_contents('php://input'), true);
    
        if (empty($data['username']) || empty($data['password'])) {
            $errors[] = 'Username and Password are required';
        }
    
        if (!empty($errors)) {
            http_response_code(400); // Bad Request
            echo json_encode(['code' => 400, 'errors' => $errors]);
            exit;
        }
    
        // Validar las credenciales del usuario usando el modelo
        $username = $data['username'];
        $password = $data['password'];
    
        // Llama al modelo para verificar las credenciales
        // Asegúrate de importar tu modelo en este controlador
        $user = \Model\Usuarios::validateUser($username, $password);
    
        if (!$user) {
            http_response_code(401); // Unauthorized
            echo json_encode(['code' => 401, 'message' => 'Invalid username or password']);
            exit;
        }
    
        // Si el usuario es válido, guardar datos en la sesión
        self::setSession($user);
    
        // Generar el token JWT
        $token = self::generateJWT();
    
        // Establecer el token como cookie
        self::setAuthCookie($token);
    
        // Responder al cliente con éxito y el token
        http_response_code(200); // OK
        echo json_encode([
            'code' => 200,
            'message' => 'Login successful',
            'token' => $token
        ]);
    }    
    public static function validateToken($token) {
        self::init();
        try {
            $decoded = JWT::decode($token, new Key(self::$secret_key, self::ENCRYPT_METHOD));
            return (array) $decoded;
        } catch (\Exception $e) {
            return null;
        }
    }
    public static function logout() {
        $_SESSION = [];
        session_destroy();
    }
    private static function setSession($userData) {
        $_SESSION['username'] = $userData['username'];
        $_SESSION['name'] = $userData['name'];
        $_SESSION['first_name'] = $userData['first_name'];
        $_SESSION['mail'] = $userData['mail'];
        $_SESSION['login'] = true;
        $_SESSION['team'] = $userData['team'];
        $_SESSION['rol'] = $userData['rol'];
    }
    private static function generateJWT() {
        $payload = [
            'iat' => time(),
            'exp' => time() + 86400, // Expiración en 1 día
            'username' => $_SESSION['username'],
            'name' => $_SESSION['name'],
            'first_name' => $_SESSION['first_name'],
            'mail' => $_SESSION['mail'],
            'login' => $_SESSION['login'],
            'team' => $_SESSION['team'],
            'rol' => $_SESSION['rol'],
        ];
        return JWT::encode($payload, self::$secret_key, self::ENCRYPT_METHOD);
    }
    private static function setAuthCookie($token) {
        setcookie("auth_token", $token, [
            'expires' => time() + 86400, // Expiración de 1 día
            'path' => '/',
            'domain' => 'localhost', // Cambia a 'tusitio.com' en producción
            'secure' => false, // Solo HTTPS en producción
            'httponly' => true, // No accesible por JavaScript
            'samesite' => 'Lax', // O 'Strict' si quieres máxima seguridad
        ]);
    }
    public static function getUserDataFromToken() {
        $token = $_COOKIE['auth_token'] ?? null;
        if (!$token) {
            http_response_code(401);
            echo json_encode(['code' => 401, 'response' => 'No token provided']);
            exit;
        }
        $userData = LoginController::validateToken($token);
        if ($userData) {
            $response = [
                'code' => 200,
                'response' => [
                    'rol' => $userData['rol'],
                    'name' => $userData['name'],
                    'login' => $userData['login'],
                ],
            ];
            echo json_encode($response);
            exit;
        } else {
            http_response_code(401);
            echo json_encode(['code' => 401, 'response' => 'Invalid token']);
            exit;
        }
    }
}