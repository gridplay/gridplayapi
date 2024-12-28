<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static $NULL_KEY = '00000000-0000-0000-0000-000000000000';
	public static function getGrid($user) {
		if (strpos($user, "Second-Life-LSL") !== false) {
			return 'sl';
		}
		return null;
	}
	public static function Name2Key($uuid = "") {
		$api = GridPlayAPI::senddata('get','api/name2key/'.$uuid,[]);
		if (array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return parent::$nullkey;
	}
	public static function Key2Name($name = "") {
		$api = GridPlayAPI::senddata('get','api/key2name/'.$name,[]);
		if (array_key_exists('name', $api)) {
			return $api['name'];
		}
		return "";
	}
	public static function Wmps() {
		return GridPlayAPI::senddata('get','wmps',[]);
	}
	public static function getSimCoords($sim) {
		$api = GridPlayAPI::senddata('get','api/coords',['sim' => urlencode($sim)]);
		if (!is_null($api)) {
			return $api;
		}
		return [];
	}
	public static function getNews($site, $show = 6, $page = 1) {
		return GridPlayAPI::senddata('get','news/'.$site,['show' => $show, 'page' => $page]);
	}
	public static function getImg($uuid) {
		return GridPlayAPI::senddata('get','api/slimg/'.$uuid,[]);
	}
	public static function getProfPic($uuid) {
		return GridPlayAPI::senddata('get','api/profilepic/'.$uuid,[]);
	}
	public static function sendIM($towho, $msg) {
		return GridPlayAPI::senddata('put','api/instantmessage',["to" => $towho, "msg" => $msg]);
	}
	public static function isOnline($uuid) {
		$isonline = GridPlayAPI::senddata('put','api/useronline/'.$uuid,[]);
		if (array_key_exists('isOnline', $isonline) && $isonline['isOnline'] == "true") {
			return true;
		}
		return false;
	}
}