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
            if(self::checkMethod($method)){
                call_user_func(self::$route['handler']);
            } else {
                die("Method ".$method." not allowed");
            }
        }else{
            die("Route ".$url." not found");
        }
    }

    public static function matchRoute($url, $method)
    {
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                self::$route['handler'] = $route['handler'];
                self::$route['method'] = $route['method'];
                return true;
            }
        }
        return false;
    }
    protected static function checkMethod($method)
    {
       if(self::$route['method'] == $method){
            return true;
       }
       return false;
    }
}