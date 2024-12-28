<?php
namespace GridPlayAPI;
use GridPlayAPI;
class Ventalkie extends GridPlayAPI {
	public static function getChannel($search = "") {
		$uri = 'ventalkie';
		if (!empty($search)) {
			$uri .= '/'.$search;
		}
		$api = GridPlayAPI::senddata('get',$uri,[]);
		return $api;
	}
}