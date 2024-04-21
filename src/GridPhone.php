<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPhone extends GridPlayAPI {
	public static function getNumber($search = "") {
		$uri = 'gridphone';
		if (!empty($search)) {
			$uri = 'gridphone/'.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[]);
		return $api;
	}
	public static function SendMsg($towho, $from, $msg) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j['msg'] = $msg;
		$api = GridPlayAPI::senddata('PUT','gridphone/sendmsg',$j);
		return $api;
	}
	public static function Call($towho, $from, $fromname) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j["incoming_name"] = $fromname;
		$api = GridPlayAPI::senddata('PUT','gridphone/call',$j);
		return $api;
	}
	public static function EndCall($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$api = GridPlayAPI::senddata('PUT','gridphone/endcall',$j);
		return $api;
	}
	public static function Answer($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$api = GridPlayAPI::senddata('PUT','gridphone/anwser',$j);
		return $api;
	}
}