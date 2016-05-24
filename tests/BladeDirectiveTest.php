<?php

use Illuminate\Cache\ArrayStore;
use Illuminate\Cache\Repository;
use Jvbdevel\Dolly\BladeDirective;
use Jvbdevel\Dolly\RussianCaching;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BladeDirectiveTest
 *
 * @author VanBeerselJan
 */
class BladeDirectiveTest extends TestCase
{
    
    protected $doll;
    
    /** @test */
    function it_sets_up_the_opening_cache_directive()
    {

        // new up the BladeDirective class.
        $directive = $this->createNewCacheDirective();

        // and then call the setUp method.
        $isCached = $directive->setUp($post = $this->makePost());

        // perform assertions.
        $this->assertFalse($isCached);

        // call the teardown method.
        echo '<div>fragment</div>';
        $cachedFragment = $directive->tearDown();
        
        // perform assertions
        $this->assertEquals('<div>fragment</div>',$cachedFragment);
        $this->assertTrue($this->doll->has($post));
    }

    protected function createNewCacheDirective()
    {
        $cache = new Repository(
                new ArrayStore
        );

        $this->doll = new RussianCaching($cache);

        return new BladeDirective($this->doll);
    }

}
