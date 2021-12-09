<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		$a = ['type' => 'GET', 'url' => 'radio'];
		if (!empty($search)) {
			$a['url'] = 'radio/'.$search;
		}
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
	public static function sendmsg($chan, $nick, $msg) {
		$j = ['chan' => $chan];
		$j['nick'] = $nick;
		$j['msg'] = $msg;
		$j['gpn_key'] = config('gridplay.api_key');
		$a = ['type' => 'POST', 'url' => 'radio/send', 'json' => $j];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}