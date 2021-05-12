<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridHaul extends GridPlayAPI {
	public static function getHub($search = "") {
		$a = ['type' => 'GET', 'url' => 'gridhaul'];
		if (!empty($search)) {
			$a['url'] = 'gridhaul/'.$search;
		}
		$api = parent::senddata($a);
		return $api;
	}
}