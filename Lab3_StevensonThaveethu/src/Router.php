<?php
/**
 *
 * Lab 3
 * 
 * Author: Stevenson Thaveethu
 * Date: March 25, 2019
 * 
 * Description: Add each route defined by the user to an array and than execute it.
 * 
 *
 */
 
namespace Application;

class Router
{

    public function __construct()
    {
        
        $arrayURI = explode('/', $_SERVER['REQUEST_URI']);

        $method = array_pop($arrayURI);

        if (strpos($method, '.php') !== FALSE) 
        {
            
            $class = '';

            $method = '';
            
        } 
        else 
        {
            
            $class = array_pop($arrayURI);

            if (strpos($class, '.php') !== FALSE)
            {
                
                $class = $method;

                
                $method = '';
            }
            
        }

        if (empty($class))
        {
            
            $class = 'Index';
            
        }

        if (empty($method))
        {
            
            $method = 'index';
            
        }

        $class = ucfirst($class) . 'Controller';

        $method = $method . 'Action';

        $fqcn = 'Application\\Controller\\' . $class;

        try 
        {
            
            $handler = new $fqcn();

            $handler->{$method}();
            
        } 
        catch (\Error $e)
        {
            
            die('404 Not Found');
            
        }
        
    }
    
}