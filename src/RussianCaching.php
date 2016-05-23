<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jvbdevel\Dolly;

use Cache;

/**
 * Description of RussianCaching
 *
 * @author VanBeerselJan
 */
class RussianCaching
{
    protected static $keys=[];


    public static function setUp($model)
    {

        static::$keys[] = $key = $model->getCacheKey();
//        static::$keys[] = $key = 'foo';
        
        // turn on output buffering
        ob_start();
        
        // return a boolean that indecates if we have cached this model yet
//       return Cache::tags('views')->has($key);
        return Cache::has($key);
    }
    public static function resolve()
    {
        // fetch the cache key
        $key = array_pop(static::$keys);
        
        // save the output buffer contents to a vaiable, called $html
        $html = ob_get_clean();    
        
        // cache it, if necessary, and echo out the html
//        return Cache::tags('views')->rememberForever($key, function() use ($html) {
//            return $html;
//        });
//     
        return Cache::rememberForever($key, function() use ($html) {
            return $html;
        });
    }
}
