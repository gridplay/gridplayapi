<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public static function getBal() {
		$a = 'gridpay/getbal';
		$api = GridPlayAPI::senddata('GET', $a, []);
		if (!is_null($api)) {
			return $api;
		}else{
			return ['balstr' => 0, 'bal' => 0];
		}
	}
	public static function transfer($uuid, $payto, $amount) {
		if ($amount > 0) {
			$j = ['payto' => $payto];
			$j['amount'] = str_replace(",","",$amount);
			$api = GridPlayAPI::senddata('POST', 'gridpay/xferto', $j);
			return $api;
		}
		return ['error' => 'amount MUST be a number'];
	}
}