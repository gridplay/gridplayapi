<?php
namespace GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		$api = parent::senddata('get', 'ventalkie', $search,[]);
		return $api;
	}
}