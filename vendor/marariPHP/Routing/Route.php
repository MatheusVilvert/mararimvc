<?php
/**
 * Created by PhpStorm.
 * User: USer
 * Date: 21/08/2017
 * Time: 14:13
 */

namespace MarariPHP\Routing;
use \Klein\Klein as Klein;


class Route extends Klein
{

    public function get($route = '*',$call =null){
        if (is_string($call)){
            $explode = explode("@",$call);
            $controller = "App\\Controllers\\".$explode[0]."Controller";
            $action = $explode[1];
            $this->respond("GET",$route,function() use($controller,$action){
                $class = new $controller();
                return $class->$action;
            } );

        }else{
            $this->respond("GET",$route,$call);
        }
    }

    public function post($route = '*',$call =null){

    }

}