<?php

class PatternRouter {
    private function stripParameters($uri)
    {

        if (str_contains($uri, '?')) {

            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        return $uri;
    }
    public function route($uri)
    {
        // Check if there's an api request
        $api = false;
        if (str_starts_with($uri, "api/")) {
            $uri = substr($uri, 4);
            $api = true;
        }

        // Set default controller & method
        $defaultcontroller = 'home';
        $defaultmethod = 'index';

        // Ignore query parameters
        $uri = $this->stripParameters($uri);

        // Read controller & method names from URI
        $explodedUri = explode('/', $uri);

        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultcontroller;
        }
        $controllerName = $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }
        $methodName = $explodedUri[1];

        // Require the file with the controller class
        $filename = __DIR__ . '/controllers/' . $controllerName . '.php';
        if ($api) {
            $filename = __DIR__ . '/api/controller/' . $controllerName . '.php';
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            // http_response_code(404);
            // die();
        }
        // Dynamically call controller method
        try {
            $controllerObj = new $controllerName;
            $controllerObj->{$methodName}();
        } catch (Exception $e) {
            // http_response_code(404);
            // die();
        }
    }
}