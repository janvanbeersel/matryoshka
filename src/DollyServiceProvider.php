<?php

namespace Jvbdevel\Matryoshka;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DollyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache',function($expression) {
            return "<?php if (! app('Jvbdevel\Matryoshka\BladeDirective')->setUp{$expression}) { ?> ";  // setup($card) 
           
        });
        
         Blade::directive('endcache',function() {
            return "<?php echo }; app('Jvbdevel\Matryoshka\BladeDirective')->tearDown(); ?> ";  // setup($card) 
           
        });
        
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeDirective::class, function() {
            
            $cache = app('Illuminate\Contracts\Cache\Repository');
            
            $russianDoll = new RussianCaching($cache);
            
            return new BladeDirective($russianDoll);
        });
    }
}
