<?php
namespace GridPlayAPI;
class GridHaul extends GridPlayAPI {
	public static function getHub($search = "") {
		$s = [];
		if (!empty($search)) {
			$s['search'] = $search;
		}
		$api = parent::senddata('get','gridhaul', 'hubs',$s);
		return $api;
	}
	public static function getItems($search = "") {
		$s = [];
		if (!empty($search)) {
			$s['search'] = $search;
		}
		$api = parent::senddata('get','gridhaul', 'items',$s);
		return $api;
	}
	public static function getJobs() {
		$api = parent::senddata('get','gridhaul', 'jobs',[]);
		return $api;
	}
}