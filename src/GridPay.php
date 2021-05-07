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
	public static function transfer($uuid, $payto, $amount) {
		$j = ['uuid' => $uuid, 'payto' => $payto];
		$j['amount'] = $amount;
		$a = ['type' => 'POST', 'url' => 'gridpay/getbal', 'json' => $j];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}