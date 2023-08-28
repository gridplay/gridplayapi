<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridHaul extends GridPlayAPI {
	public static function getHub($search = "") {
		$uri = 'gridhaul/hubs';
		if (!empty($search)) {
			$uri = 'gridhaul/hubs?search='.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[]);
		return $api;
	}
	public static function getItems($search = "") {
		$uri = 'gridhaul/items';
		if (!empty($search)) {
			$uri = 'gridhaul/items?search='.$search;
		}
		$api = GridPlayAPI::senddata('GET',$uri,[]);
		return $api;
	}
	public static function getJobs() {
		$api = GridPlayAPI::senddata('GET','gridhaul/jobs',[]);
		return $api;
	}
}