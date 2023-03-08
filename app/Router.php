<?php

namespace App;

class Router
{
    public static $routes = [];
    protected static $route = [];

    public static function addRoute($method, $route, $handler)
    {
        self::$routes[$route]['method'] = $method;
        self::$routes[$route]['handler'] = $handler; 

    }
    public static function get($route, $handler)
    {
        self::addRoute('GET', $route, $handler);
    }
    public static function post($route, $handler)
    {
        self::addRoute('POST', $route, $handler);
    }
    public static function dispatch($url, $method)
    {
        if(self::matchRoute($url, $method)){
                call_user_func_array(self::$route['handler'], self::$route['parametrs']);
        }else{
            die("Route ".$url." not found");
        }
    }
    public static function matchRoute($url, $method)
    {
        
        foreach(self::$routes as $pattern => $route){
            $pattern = preg_replace('#:[a-z0-9]+#', '(.*)', $pattern);
            
            if(preg_match("#^{$pattern}$#", $url, $matches)){
                
                if(self::checkMethod($route, $method)){
                    array_shift($matches);
                    self::$route['handler'] = $route['handler'];
                    self::$route['parametrs'] = $matches;
                    return true;
                }else {
                    die("Method ".$method." not allowed");
                }

            }
        }
        return false;
    }
    protected static function checkMethod($route, $method)
    {
       if($route['method'] == $method){
            return true;
       }
       return false;
    }

}