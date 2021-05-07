<?php
namespace GridPlayAPI;
class GridPay {
	public function __construct() {
		//
	}
	public static function getBal($uuid) {
		$a = ['type' => 'GET', 'url' => 'gridpay/getbal?uuid='.$uuid, 'body' => ''];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}