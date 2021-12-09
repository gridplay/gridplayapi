<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Groups extends GridPlayAPI {
	public static function getGroup($uuid) {
		$a = ['type' => 'GET',
		'url' => 'groups/getgroup?uuid='.$uuid];
		$api = GridPlayAPI::senddata($a);
		return $api;
	}
}