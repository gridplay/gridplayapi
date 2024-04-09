<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static $NULL_KEY = '00000000-0000-0000-0000-000000000000';
	public static function Name2Key($uuid = "") {
		$api = GridPlayAPI::senddata('POST','name2key/'.$uuid,[]);
		if (is_array($api) && array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return parent::$nullkey;
	}
	public static function Key2Name($name = "") {
		$api = GridPlayAPI::senddata('POST','key2name/'.$name,[]);
		if (is_array($api) && array_key_exists('name', $api)) {
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
		return GridPlayAPI::senddata('POST','instantmessage',["to" => $towho, "msg" => $msg]);
	}
	public static function isOnline($uuid) {
		$isonline = GridPlayAPI::senddata('POST','useronline/'.$uuid,[]);
		return $isonline['isOnline'];
	}
}