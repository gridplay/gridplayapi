<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		$uri = 'radio';
		if (!empty($search)) {
			$uri = 'radio/'.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[]);
		return $api;
	}
	public static function sendmsg($chan, $nick, $msg) {
		$j = ['chan' => $chan];
		$j['nick'] = $nick;
		$j['msg'] = $msg;
		$api = GridPlayAPI::senddata('POST','radio/send',$j);
		return $api;
	}
}