<?php

namespace Jvbdevel\Dolly;

trait Cacheable
{
    public function getCacheKey()
    {
        
        // App\Card/1-123412341234
        return sprintf("%s/%s-%s",
                get_class($this),
                $this->id,
                $this->updated_at->timestamp
                );
    }
}
