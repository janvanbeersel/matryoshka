<?php

class CacheableTest extends TestCase
{

/** @test */

	function it_gets_a_unique_cache_key_for_an_eloquent_model()
	{
	
	// I need an eloquent model instance
	$model = $this->makePost();
	
	// and that model needs to use the Cache-able trait.
	
	// and I need to verify the returned value
	$key= $model->getCacheKey();
	
	$this->assertEquals('Post/1-'.$model->updated_at->timestamp,$key);
	
	}

}

