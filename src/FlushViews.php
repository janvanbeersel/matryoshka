<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jvbdevel\Dolly;

use Cache;

/**
 * Description of FlushViewCache
 *
 * @author VanBeerselJan
 */
class FlushViews
{
    public function handle($request,$next)
    {
        if (app()->environment()=='local') {
           
            // clear the view-specific cache.
//             Cache::tags('views')->flush();
             Cache::flush();
        }
        return $next($request);
    }
}
