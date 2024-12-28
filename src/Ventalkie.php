<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		/*$uri = 'ventalkie';
		if (!empty($search)) {
			$uri = 'ventalkie/'.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[], []);
		return $api;*/
		return null;
	}
	public static function sendmsg($chan, $nick, $msg) {
		/*$j = ['chan' => $chan];
		$j['nick'] = $nick;
		$j['msg'] = $msg;
		$api = GridPlayAPI::senddata('PUT','ventalkie/send',$j, []);
		return $api;*/
		return null;
	}
}