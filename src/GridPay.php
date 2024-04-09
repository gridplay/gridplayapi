<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public static function getBal() {
		return ['error' => 'deprecated!'];
	}
	public static function transfer($uuid, $payto, $amount) {
		return ['error' => 'deprecated!'];
	}
}