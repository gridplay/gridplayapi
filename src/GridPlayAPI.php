<?php
namespace GridPlayAPI;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class GridPlayAPI {
	public static $nullkey = "00000000-0000-0000-0000-000000000000";
	/*
	* GridPlayAPI::senddata($meth, $uri, $data = [])
	*/
	public static function senddata($meth = 'get', $uri = '', $params = '', $data = [], $h = []) {
		$headers = self::httpheaders($h, $meth);
		$http = Http::withHeaders($headers);
		$url = "https://api.gridplay.net/api";
		if (!empty($uri)) {
			$url .= '/'.$uri;
		}
		if (!empty($params)) {
			$url .= '/'.$params;
		}
		try {
			if (strtolower($meth) == "get") {
				$response = $http->get($url, $data);
			}
			if (strtolower($meth) == "put") {
				$response = $http->put($url, $data);
			}
			return $response->json();
		}catch(\Exception $e) {
			return ['error' => 'Connection invalid'];
		}
		return ["error" => 'Unable to connect'];
	}
	private static function httpheaders($h = [], $meth = 'get') {
		$h['content-type'] = 'application/json';
		$conf = config('gridplay');
		if (array_key_exists('id', $conf) && array_key_exists('secret', $conf)) {
			if (!empty($conf['id']) && !empty($conf['secret'])) {
				if (empty($conf['slid'])) {
					$conf['slid'] = self::$nullkey;
				}
				$hash = hash_hmac('sha256', $conf['slid'], $conf['secret'], true);
				$h['x-gpauth'] = base64_encode($conf['id'].":".$hash);
			}
		}
		return $h;
	}
}