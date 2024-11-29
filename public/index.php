<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use MVC\ViewLoader; 
use Middlewares\CorsMiddleware;
use Controllers\LoginController;
use Controllers\ApiController;

$viewLoader = new ViewLoader(__DIR__ . '/../frontend');
$router = new Router($viewLoader);

// API
$router->group(function(Router $router){
    $router->use([
        function($next) {
            (new CorsMiddleware())->handle($next);
        }
    ]);
    $router->options('/', function(){},[]);    
    $router->post('/', [LoginController::class, 'index']);
});

$router->group(function(Router $router){
    $router->use([
        function($next) {
            (new CorsMiddleware())->handle($next);
        }
    ]);
    $router->get('/api/{modelo}', [ApiController::class, 'get']);
});

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
