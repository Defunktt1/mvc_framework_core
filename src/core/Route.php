<?php

namespace simple_mvc_framework_core\src;

use simple_mvc_framework\src\core\Controller;
use simple_mvc_framework\src\core\Request;

class Route
{
    public static function get($route, $controller)
    {
        $server = $_SERVER;
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        if (substr($uri, -1) !== '/') {
            $uri .= '/';
        }

        $controllerName = 'HomeController';
        $actionName = 'index';

        if (($server['REQUEST_METHOD'] === 'GET' || $server['REQUEST_METHOD'] === 'POST') && $uri === strtolower($route)) {
            $controllerData = explode('@', $controller);
            $controllerName = $controllerData[0];
            $controllerFile = $controllerName . '.php';
            $actionName = $controllerData[1];

            $request = new Request();

            include $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $controllerFile;
            $controller = new $controllerName($request);
            $controller->$actionName();
            exit;
        }
    }

    public static function abort()
    {
        $request = new Request();
        $controller = new Controller($request);
        $controller->get404();
    }
}