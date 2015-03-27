<?php 
namespace Memoriuum\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app->bind('ApiResponse', function()
        {
            return new \Memoriuum\Classes\ApiResponse;
        });
    }
}