<?php
require_once('Controller.php');
require_once('Model.php');
require_once('View.php');
class Route
{
    public $isGuest;

    public static function run()
    {
        $controllerName = 'Site';
        $actionName = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }
        $modelName = $controllerName . 'Model';
        $controllerName = $controllerName . 'Controller';
        $actionName = 'action' . $actionName;

        $modelFile = strtolower($modelName) . '.php';
        $modelPatch = 'models/' . $modelFile;

        if (file_exists($modelPatch)) {
            include 'models/' . $modelFile;
        }

        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPatch = 'controllers/' . $controllerFile;
        if (file_exists($controllerPatch)) {
            include('controllers/' . $controllerFile);
        } else {
            Route::errorHandler();
        }

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controllerName, $action)) {
            $controller->$action();
        } else {
            Route::errorHandler();
        }
    }

    public function user()
    {
        if (isset($_SESSION['auth'])) {
            return true;
        }
        return false;
    }

    public function errorHandler($errorCode = '404', $errorName = 'Not Found')
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'site/error');
    }
}