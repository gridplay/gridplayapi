<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Fun extends GridPlayAPI {
	public static function getXP($uuid = "", $url = '') {
		$uri = 'fun/players/getplayer';
		$api = GridPlayAPI::senddata('get',$uri,['uuid' => $uuid, 'url' => $url]);
		return $api;
	}
	public static function doXP($uuid = "", $xp = 1) {
		$uri = 'fun/players/doxp';
		$api = GridPlayAPI::senddata('put',$uri,['uuid' => $uuid, 'xp' => $xp]);
		return $api;
	}
	public static function doAchievement($uuid = "", $aid = "", $points = 1) {
		$uri = 'fun/achievements/doachievement';
		$api = GridPlayAPI::senddata('put',$uri,['uuid' => $uuid, 'aid' => $aid, 'points' => $points]);
		return $api;
	}
	public static function gettitles($uuid = "", $name = '') {
		$uri = 'fun/titles/gettitles';
		$api = GridPlayAPI::senddata('get',$uri,['uuid' => $uuid, 'name' => $name]);
		return $api;
	}
	public static function gettitle($tid = "") {
		$uri = 'fun/titles/gettitle';
		$api = GridPlayAPI::senddata('get',$uri,['tid' => $tid]);
		return $api;
	}
}