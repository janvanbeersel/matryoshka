<?php

use Jvbdevel\Dolly\RussianCaching;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RussianCachingTest
 *
 * @author VanBeerselJan
 */
class RussianCachingTest extends TestCase
{
    /** @test */
    
    function it_caches_the_given_key()
    {
        $post = $this->makePost();
                
        $cache = new \Illuminate\Cache\Repository(
                new \Illuminate\Cache\ArrayStore
                );
        
        $doll = new RussianCaching($cache);
        
        $doll->put($post, '<div>view fragment</div>');
        
        $this->assertTrue($doll->has($post));
        $this->assertTrue($doll->has($post->getCacheKey()));
        
    }
    
}
