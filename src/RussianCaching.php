<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jvbdevel\Matryoshka;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of RussianCaching
 *
 * @author VanBeerselJan
 */
class RussianCaching
{

  
    protected $cache;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

 
    public function put($key, $fragment)
    {
        $key=$this->normalizeCacheKey($key);
        return $this->cache
                        ->rememberForever($key, function() use ($fragment) {
                            return $fragment;
                        });
    }

    public function has($key)
    {
        $key=$this->normalizeCacheKey($key);
       
        return $this->cache->has($key);
    }
    
    protected function normalizeCacheKey($key)
    {
         if ($key instanceof Model) {
            return $key->getCacheKey();
        }
        return $key;
    }
    

}
