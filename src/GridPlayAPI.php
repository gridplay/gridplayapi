<?php
namespace GridPlayAPI;
use GuzzleHttp\Client;
use Guzzle\Http\EntityBody;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\stream_for;
use GuzzleHttp\Stream\Stream;
class GridPlayAPI {
	public static $nullkey = "00000000-0000-0000-0000-000000000000";
	/*
	* GridPlayAPI::senddata($meth, $uri, $data = [])
	*/
	public static function senddata($meth, $uri, $data = []) {
		$send = ['timeout' => 3.14];
		if ($data != []) {
			$send['json'] = $data;
		}
		$send['verify'] = true;
		$client = new Client(self::httpheaders()); // Guzzle
		$url = 'https://sl.gridplay.net/api/'.$uri;
		try {
			$response = $client->request($meth, $url, $send);
			$body = $response->getBody();
			if ($response->getStatusCode() == 200) {
				if (self::isJson($body->getContents())) {
					return json_decode($body->getContents(), true);
				}
			}
		}catch(\Exception $e) {
			return ['ERROR' => 'Connection invalid'];
		}
		return ["ERROR" => 'Unable to connect'];
	}
	private static function httpheaders() {
		$h = [];
        $resident = str_replace(" ", ".", config('gridplay.api_key'));
        $h['GPAUTH'] = base64_encode($resident.":".time());
		//$h['Accept'] = 'application/json';
		$h['content-type'] = 'application/json';
		return ['headers' => $h];
	}
	public static function isJson($string) {
    	return ((is_string($string) &&
            (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
	}
}