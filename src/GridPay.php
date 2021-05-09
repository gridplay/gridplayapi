<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public static function getBal($uuid) {
		$a = ['type' => 'GET',
		'url' => 'gridpay/getbal?uuid='.$uuid];
		$api = parent::senddata($a);
		return $api;
	}
	public static function transfer($uuid, $payto, $amount) {
		$j = ['uuid' => $uuid, 'payto' => $payto];
		$j['amount'] = $amount;
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST',
		'url' => 'gridpay/xfer', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
}