<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public static function getBal($uuid) {
		$a = 'gridpay/getbal?uuid='.$uuid;
		$api = parent::curlme('GET', $a, []);
		return $api;
	}
	public static function transfer($uuid, $payto, $amount) {
		$j = ['uuid' => $uuid, 'payto' => $payto];
		$j['amount'] = str_replace(",","",$amount);
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST','url' => 'gridpay/xfer', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
}