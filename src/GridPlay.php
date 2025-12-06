<?php
namespace GridPlayAPI;
use Log;
class GridPlay extends GridPlayAPI {
	public static $NULL_KEY = '00000000-0000-0000-0000-000000000000';
	public static function Name2Key($name = "") {
		$api = parent::senddata('put','api', 'name2key/'.$name,[]);
		if (array_key_exists('uuid', $api)) {
			return $api['uuid'];
		}
		return self::$NULL_KEY;
	}
	public static function Key2Name($uuid = "") {
		$api = parent::senddata('put','api', 'key2name/'.$uuid,[]);
		if (array_key_exists('name', $api)) {
			return $api['name'];
		}
		return "";
	}
	public static function Wmps() {
		return parent::senddata('get','wmps', '',[]);
	}
	public static function getSimCoords($sim) {
		$api = parent::senddata('get','api', 'coords',['sim' => urlencode($sim)]);
		if (!is_null($api)) {
			return $api;
		}
		return [];
	}
	public static function getNews($site, $show = 6, $page = 1) {
		$n = parent::senddata('get','news', $site,['show' => $show, 'page' => $page]);
		if (!is_null($n) && is_array($n) && !array_key_exists('error', $n)) {
			return $n;
		}
		return [];
	}
	public static function getImg($uuid) {
		return parent::senddata('get','api', 'slimg/'.$uuid,[]);
	}
	public static function getProfPic($uuid) {
		return parent::senddata('get','api', 'profilepic/'.$uuid,[]);
	}
	public static function sendIM($towho, $msg) {
		return parent::senddata('put','api', 'instantmessage',["to" => $towho, "msg" => $msg]);
	}
	public static function isOnline($uuid) {
		$isonline = parent::senddata('put','api', 'useronline/'.$uuid,[]);
		if (array_key_exists('isOnline', $isonline) && $isonline['isOnline'] == "true") {
			return true;
		}
		return false;
	}
}