<?php
namespace GridPlayAPI;
use GridPlayAPI;
class GridHaul extends GridPlayAPI {
	public static function getHub($search = "") {
		$s = [];
		if (!empty($search)) {
			$s['search'] = $search;
		}
		$api = GridPlayAPI::senddata('GET','gridhaul/hubs',$s);
		return $api;
	}
	public static function getItems($search = "") {
		$s = [];
		if (!empty($search)) {
			$s['search'] = $search;
		}
		$api = GridPlayAPI::senddata('GET','gridhaul/items',$s);
		return $api;
	}
	public static function getJobs() {
		$api = GridPlayAPI::senddata('GET','gridhaul/jobs',[]);
		return $api;
	}
}