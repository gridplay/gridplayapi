<?php
namespace GridPlayAPI;
use GridPlayAPI;
use Illuminate\Support\Facades\Log;
class GridPay extends GridPlayAPI {
	public static function getBal($uuid) {
		$a = 'gridpay/getbal?uuid='.$uuid;
		$api = GridPlayAPI::curlme('GET', $a, []);
		return $api;
	}
	public static function transfer($uuid, $payto, $amount) {
		$j = ['uuid' => $uuid, 'payto' => $payto];
		$j['amount'] = str_replace(",","",$amount);
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['json' => $j];
		Log::debug($a);
		$api = GridPlayAPI::curlme('PUT', 'gridpay/xfer', $a);
		return $api;
	}
}