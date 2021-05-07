<?php
namespace GridPlayAPI;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Collection;
class GridPay {
	use Macroable, Componentable {
        Macroable::__call as macroCall;
        Componentable::__call as componentCall;
    }
	public function __construct() {
		//
	}
	public function getBal($uuid) {
		$a = ['type' => 'GET', 'url' => 'gridpay/getbal?uuid='.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
	public function __call($method, $parameters) {
        if (static::hasComponent($method)) {
            return $this->componentCall($method, $parameters);
        }

        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }
}