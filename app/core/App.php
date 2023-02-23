<?php

class App
{

    public static function start()
    {
        $route = Request::getRoute();
        $parts = explode('/',substr($route,1));
        $controller='';
        if(!isset($parts[0]) || $parts[0]===''){
            $controller='IndexController';
        }else{
            $controller = ucfirst($parts[0]) . 'Controller';
        }
        $method='';
        if(!isset($parts[1]) || $parts[1]==='' ){
            $method='index';
        }else{
            $method=$parts[1];
        }
        if(!(class_exists($controller) && method_exists($controller,$method))){
            echo 'Ne postoji ' . $controller . '-&gt;' . $method;
            return;
        }
        $instance = new $controller();
        $instance->$method();
    }


}