<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jvbdevel\Matryoshka;

/**
 * Description of BladeDirective
 *
 * @author VanBeerselJan
 */
class BladeDirective
{

    protected $keys = [];

    protected $cache;

    public function __construct(RussianCaching $cache)
    {
        $this->cache = $cache;
    }

    public function setUp($model)
    {

        // turn on output buffering (ob)
        ob_start();

        $this->keys[] = $key = $model->getCacheKey();
        
        // return a boolean that indecates if we have cached this model yet
        return $this->cache->has($key);
    }

    public function tearDown()
    {
        // save the output buffer contents to a vaiable, called $html, turn off output buffering (ob)
        $html = ob_get_clean();
        
        // fetch the cache key
        $key = array_pop($this->keys);

        return $this->cache->put($key,$html);
    }

}
