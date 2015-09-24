<?php
/**
 * Created by PhpStorm.
 * User: romapaliy
 * Date: 9/24/15
 * Time: 10:03 AM
 */

if (!class_exists("Router")){

    class Router {

        public $routes;

        public function __construct($routes_config){
            $this->routes = $routes_config;
        }

        public function get_uri(){
            if(!empty($_SERVER['REQUEST_URI'])) {
                return trim($_SERVER['REQUEST_URI'], '/');
            }

            if(!empty($_SERVER['PATH_INFO'])) {
                return trim($_SERVER['PATH_INFO'], '/');
            }

            if(!empty($_SERVER['QUERY_STRING'])) {
                return trim($_SERVER['QUERY_STRING'], '/');
            }
        }

        public function run(){
            $uri = $this->get_uri();
            foreach($this->routes as $pattern => $route){
                if (preg_match("~$pattern~", $uri)){
                    $internalRoute = preg_replace("~$pattern~", $route, $uri);
                    $segments = explode('/', $internalRoute);
                    $controller = ucfirst(array_shift($segments)).'Controller';
                    $action = 'action'.ucfirst(array_shift($segments));
                    $parameters = $segments;

                    $controllerFile = 'Controller/'.$controller.'.php';
                    $modelFile = 'Model/'.$controller.'.php';

                    if(file_exists($controllerFile)){
                        return include_once($controllerFile);
                    } else {
                        return header("HTTP/1.0 404 Not Found");
                    }
                }

            }
            return header("HTTP/1.0 404 Not Found");
        }

    }

}