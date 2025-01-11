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
	public static function convert($uuid = "", $xp = 1, $lvl = 1) {
		$uri = 'fun/players/convert';
		$api = GridPlayAPI::senddata('put',$uri,['uuid' => $uuid, 'xp' => $xp, 'lvl' => $lvl]);
		return $api;
	}
}