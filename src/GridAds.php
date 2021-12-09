<?php
namespace GridPlayAPI;
use GridPlayAPI;
use GridPlay;
class GridAds extends GridPlayAPI {
	public static function getAd() {
		$conf = config('gridplay');
		$rating = "PG";
		if (array_key_exists('ad_rating', $conf)) {
			$rating = $conf['ad_rating'];
		}
		$api = GridPlayAPI::curlme('GET', 'ads/'.$rating, []);
		$api['img'] = GridPlay::getImg($api['texture']);
		return $api;
	}
}