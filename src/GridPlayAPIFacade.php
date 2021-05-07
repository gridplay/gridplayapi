<?php
namespace GridPlayAPI;
use Illuminate\Support\Facades\Facade;
/**
 * @see \GridPlayAPI\GridPlayAPI
 */
class GridPlayAPIFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'gridplayapi';
    }
}
