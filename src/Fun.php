<?php
namespace GridPlayAPI;
class Fun extends GridPlayAPI {
	public static function getXP($uuid = "", $url = '') {
		$uri = 'players/getplayer';
		$api = parent::senddata('get','fun', $uri,['uuid' => $uuid, 'url' => $url]);
		return $api;
	}
	public static function doXP($uuid = "", $xp = 1) {
		$uri = 'players/doxp';
		$api = parent::senddata('put', 'fun', $uri,['uuid' => $uuid, 'xp' => $xp]);
		return $api;
	}
	/*public static function doAchievement($uuid = "", $aid = "", $points = 1) {
		$uri = 'achievements/doachievement';
		$api = GridPlayAPI::senddata('put','fun', $uri,['uuid' => $uuid, 'aid' => $aid, 'points' => $points]);
		return $api;
	}*/
	public static function gettitles($uuid = "", $name = '') {
		$uri = 'titles/gettitles';
		$api = parent::senddata('get','fun', $uri,['uuid' => $uuid, 'name' => $name]);
		return $api;
	}
	public static function gettitle($tid = "") {
		$uri = 'titles/gettitle';
		$api = parent::senddata('get','fun', $uri,['tid' => $tid]);
		return $api;
	}
}