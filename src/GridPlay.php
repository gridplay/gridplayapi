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
		return GridPlayAPI::senddata('GET','wmps',[]);
	}
	public static function getSimCoords($sim) {
		return GridPlayAPI::senddata('GET','coords/'.$sim,[]);
	}
	public static function getImg($uuid) {
		return GridPlayAPI::senddata('GET','slimg/'.$uuid,[]);
	}
	public static function getProfPic($uuid) {
		return GridPlayAPI::senddata('GET','profilepic/'.$uuid,[]);
	}
	public static function sendIM($towho, $msg) {
		return GridPlayAPI::senddata('POST','instantmessage',["to" => $towho, "msg" => $msg]);
	}
}