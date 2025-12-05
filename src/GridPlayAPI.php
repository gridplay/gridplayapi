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
	public static function senddata($meth = 'get', $uri = '', $data = [], $h = []) {
		$headers = self::httpheaders($h, $meth);
		$http = Http::withHeaders($headers);
		$url = self::getURL($uri);
		try {
			if (strtolower($meth) == "get") {
				$response = $http->get($url, $data);
			}
			if (strtolower($meth) == "put") {
				$response = $http->put($url, $data);
			}
			if ($response->ok()) {
				return $response->json();
			}else{
				return ['error' => 'not found'];
			}
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
				$hash = hash_hmac('sha256', $conf['slid'], $conf['secret'], true);
				$h['x-gpauth'] = base64_encode($conf['id'].":".base64_encode($hash));
			}
		}
		return $h;
	}
	private static function getURL($uri) {
		$sites = ['api' => 'https://api.gridplay.net/api'];
		$sites['gridhaul'] = 'https://gridhaul.fun/api/gridhaul';
		$sites['news'] = 'https://blog.gridplay.net/api';
		$sites['wmps'] = 'https://map.gridplay.net/api';
		$sites['ventalkie'] = 'https://ventalkie.com/api';
		$sites['fun'] = 'https://gridfun.quest/api';
		if (strpos($uri, '/') !== false) {
			$ex = explode('/', $uri);
			$url = $sites[$ex[0]];
			if (isset($ex[1])) {
				$url .= '/'.$ex[1];
			}
			if (isset($ex[2])) {
				$url .= '/'.$ex[2];
			}
		}else{
			$url = $sites[$uri];
		}
		return $url;
	}
}