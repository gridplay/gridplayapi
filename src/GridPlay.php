<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static function Name2Key($uuid = "") {
		$api = GridPlayAPI::senddata('GET','name2key/'.$uuid,[]);
		if (is_array($api) && array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return parent::$nullkey;
	}
	public static function Key2Name($name = "") {
		$api = GridPlayAPI::senddata('GET','key2name/'.$name,[]);
		if (is_array($api) && array_key_exists('name', $api)) {
			return $api['name'];
		}
		return "";
	}
	public static function Wmps() {
		$api = GridPlayAPI::senddata('GET','wmps',[]);
		return $api;
	}
	public static function getSimCoords($sim) {
		$api = GridPlayAPI::senddata('GET','coords/'.$sim,[]);
		return $api['coords'];
	}
	public static function getImg($uuid) {
		$api = GridPlayAPI::senddata('GET','slimg/'.$uuid,[]);
		return $api;
	}
	public static function getProfPic($uuid) {
		$api = GridPlayAPI::senddata('GET','profilepic/'.$uuid,[]);
		return $api;
	}
	public static function sendIM($towho, $msg) {
		$j = ["to" => $towho];
		$j["msg"] = $msg;
		$api = GridPlayAPI::senddata('POST','instantmessage',$j);
		return $api;
	}
}