<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static $NULL_KEY = '00000000-0000-0000-0000-000000000000';
	public static function Name2Key($uuid = "") {
		$api = GridPlayAPI::senddata('GET','name2key/'.$uuid,[]);
		if (array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return parent::$nullkey;
	}
	public static function getGrid($user) {
		if (strpos($user, "Second-Life-LSL") !== false) {
			return 'sl';
		}
		if (strpos($user, "CanadianGrid") !== false) {
			return 'gc';
		}
		if (strpos($user, "OpenSim") !== false) {
			return 'os';
		}
		return null;
	}
	public static function Key2Name($name = "") {
		$api = GridPlayAPI::senddata('GET','key2name/'.$name,[]);
		if (array_key_exists('name', $api)) {
			return $api['name'];
		}
		return "";
	}
	public static function Wmps() {
		return GridPlayAPI::senddata('GET','wmps',[]);
	}
	public static function getSimCoords($sim) {
		$api = GridPlayAPI::senddata('GET','coords?sim='.urlencode($sim),[]);
		if (!is_null($api)) {
			return $api;
		}
		return [];
	}
	public static function getImg($uuid) {
		return GridPlayAPI::senddata('GET','slimg/'.$uuid,[]);
	}
	public static function getProfPic($uuid) {
		return GridPlayAPI::senddata('GET','profilepic/'.$uuid,[]);
	}
	public static function sendIM($towho, $msg) {
		return GridPlayAPI::senddata('PUT','instantmessage',["to" => $towho, "msg" => $msg]);
	}
	public static function isOnline($uuid) {
		$isonline = GridPlayAPI::senddata('PUT','useronline/'.$uuid,[]);
		if (array_key_exists('isOnline', $isonline) && $isonline['isOnline'] == "true") {
			return true;
		}
		return false;
	}
}