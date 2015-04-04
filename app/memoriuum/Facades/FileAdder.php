<?php 

namespace Memoriuum\Facades;

use Illuminate\Support\Facades\Facade;

class FileAdder extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'fileadder'; }

}