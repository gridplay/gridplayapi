<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPay extends GridPlayAPI {
	public function __construct() {
		//
	}
	public function getBal($uuid) {
		$a = ['type' => 'GET', 'url' => 'gridpay/getbal?uuid='.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}