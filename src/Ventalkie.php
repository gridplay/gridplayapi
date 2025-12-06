<?php
namespace GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		$api = parent::senddata('get', 'ventalkie', $search,[]);
		return $api;
	}
	public static function sendMsg($chan = 1, $msg = "", $nick = null) {
		$data = [];
		if (is_null($nick) || $nick == "") {
			$nick = env('APP_NAME');
		}
		$data['chan'] = $chan;
		$data['nick'] = $nick;
		$data['msg'] = $msg;
		$data['owner'] = config('gridplay.slid');
		$api = parent::senddata('put', 'ventalkie', 'send',$data);
		return $api;
	}
}