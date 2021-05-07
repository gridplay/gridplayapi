<?php
namespace GridPlayAPI;
use Illuminate\Support\Facades\Facade;
/**
 * @see \GridPlayAPI\GridPlayAPI
 */
class GridPayFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'gridpay';
    }
    public function getBal($uuid);
}
