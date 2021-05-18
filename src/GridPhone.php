<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPhone extends GridPlayAPI {
	public static function getNumber($search = "") {
		$a = ['type' => 'GET', 'url' => 'phone'];
		if (!empty($search)) {
			$a['url'] = 'phone/'.$search;
		}
		$api = parent::senddata($a);
		return $api;
	}
	public static function SendMsg($towho, $from, $msg) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j['msg'] = $msg;
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'phone/sendmsg', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
	public static function Call($towho, $from, $fromname) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j["incoming_name"] = $fromname;
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'phone/call', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
	public static function EndCall($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'phone/endcall', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
	public static function Answer($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'phone/answer', 'json' => $j];
		$api = parent::senddata($a);
		return $api;
	}
}