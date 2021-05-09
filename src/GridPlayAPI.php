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
    public static $url = "https://api.gridplay.net/";
	/*
	* Send any data to a in world prim
	* GridPlayAPI::senddata(['type' => 'GET', 'url' => 'url', 'json' => 'otherdata'])
	*/
	public static function senddata($data = []) {
		$send = ['headers' => self::httpheaders($data)];
		$send['timeout'] = 3.14;
		if (!empty($data['json'])) {
			$send['json'] = $data['json'];
		}
		$client = new Client(); // Guzzle
		try {
			$response = $client->request($data['type'],
			self::$url.'/'.$data['url'], $send);
			$body = $response->getBody();
			if ($response->getStatusCode() == 200) {
				$bod = $body->getContents();
				return json_decode($bod, true);
			}
		}catch(RequestException $e) {
			return false;
		}
		return false;
	}
	private static function httpheaders($data = []) {
	    $h = ['GPN_KEY' => config('gridplay.api_key')];
		if (isset($data['heads'])) {
			$h = $data['heads'];
        }
		$h['verify'] = false;
		$h['content-type'] = 'application/json';
		return $h;
	}
}