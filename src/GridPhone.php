<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPhone extends GridPlayAPI {
	public static function getNumber($search = "") {
		$uri = 'phone';
		if (!empty($search)) {
			$uri = 'phone/'.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[]);
		return $api;
	}
	public static function SendMsg($towho, $from, $msg) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j['msg'] = $msg;
		$api = GridPlayAPI::senddata('POST','phone/sendmsg',$j);
		return $api;
	}
	public static function Call($towho, $from, $fromname) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$j["incoming_name"] = $fromname;
		$api = GridPlayAPI::senddata('POST','phone/call',$j);
		return $api;
	}
	public static function EndCall($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$api = GridPlayAPI::senddata('POST','phone/endcall',$j);
		return $api;
	}
	public static function Answer($towho, $from) {
		$j = ["number" => $towho, "incoming_number" => $from];
		$api = GridPlayAPI::senddata('POST','phone/anwser',$j);
		return $api;
	}
}