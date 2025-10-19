<?php

class App {
    protected $controller = 'Dashboard';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $controller = isset($_GET['c']) ? ucfirst(strtolower($_GET['c'])) : $this->controller;
        $method = $_GET['m'] ?? $this->method;

        $controllerPath = __DIR__ . '/../controllers/' . $controller . '.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $this->controller = new $controller;
        } else {
            die("Controller '$controller' tidak ditemukan.");
        }

        if (method_exists($this->controller, $method)) {
            $this->method = $method;
        } else {
            die("Method '$method' tidak ditemukan di controller '$controller'.");
        }

        if (isset($_GET['id'])) {
            $this->params[] = $_GET['id'];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
