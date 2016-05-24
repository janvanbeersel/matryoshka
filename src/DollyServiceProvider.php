<?php

namespace Jvbdevel\Dolly;

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
            return "<?php if (! app('Jvbdevel\Dolly\BladeDirective')->setUp{$expression}) { ?> ";  // setup($card) 
           
        });
        
         Blade::directive('endcache',function() {
            return "<?php echo }; app('Jvbdevel\Dolly\BladeDirective')->tearDown(); ?> ";  // setup($card) 
           
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
            return new BladeDirective;
        });
    }
}
