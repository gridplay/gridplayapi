<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridPlay extends GridPlayAPI {
	public static function Name2Key($uuid = "") {
		$a = ['type' => 'GET', 'url' => 'name2key/'.$uuid];
		$api = parent::senddata($a);
		return $api['uuid'];
	}
	public static function Key2Name($name = "") {
		$a = ['type' => 'GET', 'url' => 'key2name/'.$name];
		$api = parent::senddata($a);
		return $api['name'];
	}
}