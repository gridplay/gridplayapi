<?php
namespace GridPlayAPI;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Log;
class GridPlayAPI {
	public static $nullkey = "00000000-0000-0000-0000-000000000000";
	/*
	* GridPlayAPI::senddata($meth, $uri, $data = [])
	*/
	public static function senddata($meth = 'get', $uri = '', $data = [], $h = []) {
		$headers = self::httpheaders($h); // Guzzle
		$http = Http::withHeaders($headers);
		$url = "https://api.gridplay.net/api/".$uri;
		try {
			if (strtolower($meth) == "get") {
				$response = $http->get($url, $data);
			}
			if (strtolower($meth) == "put") {
				$response = $http->put($url, $data);
			}
			if ($response->ok() && Str::isJson($response->body())) {
				return json_decode($response->body(), true);
			}else{
				return ['error' => 'not found'];
			}
		}catch(\Exception $e) {
			return ['error' => 'Connection invalid'];
		}
		return ["error" => 'Unable to connect'];
	}
	private static function httpheaders($h = []) {
		$h['content-type'] = 'application/json';
		$conf = config('gridplay');
		if (array_key_exists('id', $conf) && array_key_exists('secret', $conf)) {
			if (!empty($conf['id']) && !empty($conf['secret'])) {
	        	$h['x-gpauth'] = base64_encode($conf['id'].":".$conf['secret']);
			}
		}
		return $h;
	}
}