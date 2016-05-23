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
            return "<?php if (! Jvbdevel\Dolly\RussianCaching::setUp{$expression}) { ?> ";  // setup($card) 
           
        });
        
         Blade::directive('endcache',function() {
            return "<?php echo }; Jvbdevel\Dolly\RussianCaching::resolve(); ?> ";  // setup($card) 
           
        });
        
//        Blade::directive('cache',function($expression) {
//            return "<?= RussianDollCaching::setUp{$expression};  ";  // setup($card) 
//           
//        });
//        
//         Blade::directive('endcache',function($expression) {
//            return "<?= RussianDollCaching::setUp{$expression};  ";  // setup($card) 
//           
//        });
//        Blade::directive('ago',function($expression) {
//            return "<?= with{$expression}->updated_at->diffForHumans(); "; // setup($card) 
//           
//        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
