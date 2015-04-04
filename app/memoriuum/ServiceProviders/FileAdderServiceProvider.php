<?php 
namespace Memoriuum\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class FileAdderServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app->bind('FileAdder', function()
        {
            return new \Memoriuum\Classes\FileAdder;
        });
    }
}