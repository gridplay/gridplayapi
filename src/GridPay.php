<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public function __construct() {
		//
	}
	public static function getBal($uuid) {
		$a = ['type' => 'GET', 'url' => 'gridpay/getbal?uuid='.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}