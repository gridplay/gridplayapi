<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static function Name2Key($uuid = "") {
		$a = ['type' => 'GET', 'url' => 'name2key/'.$uuid];
		$api = GridPlayAPI::senddata($a);
		if (array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return null;
	}
	public static function Key2Name($name = "") {
		$a = ['type' => 'GET', 'url' => 'key2name/'.$name];
		$api = GridPlayAPI::senddata($a);
		if (array_key_exists('name', $api)) {
			return $api['name'];
		}
		return null;
	}
	public static function Wmps() {
		$a = ['type' => 'GET', 'url' => 'wmps'];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
	public static function getImg($uuid) {
		$a = ['type' => 'GET', 'url' => 'slimg/'.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
	public static function getProfPic($uuid) {
		$a = ['type' => 'GET', 'url' => 'profilepic/'.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
	public static function sendIM($towho, $msg) {
		$j = ["to" => $towho];
		$j["msg"] = $msg;
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'instantmessage', 'json' => $j];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}