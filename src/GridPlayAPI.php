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
	* GridPlayAPI::senddata(['type' => 'GET', 'url' => 'url', 'json' => 'otherdata'])
	*/
	public static function senddata($data = []) {
		$send = ['timeout' => 3.14];
		if (!empty($data['json'])) {
			$send['json'] = $data['json'];
		}
		$send['verify'] = true;
		$client = new Client(self::httpheaders($data)); // Guzzle
		$url = 'https://api.gridplay.net/'.$data['url'];
		try {
			$response = $client->request($data['type'], $url, $send);
			$body = $response->getBody();
			if ($response->getStatusCode() == 200) {
				return json_decode($body->getContents(), true);
			}
		}catch(\Exception $e) {
			return false;
		}
		return false;
	}
	// GridPlayAPI::curlme($method, $url, $data)
	public static function curlme($meth = 'GET', $url = '', $data = []) {
		$a = [];
		if ($data != []) {
			$a['json'] = $data;
		}
		$a['type'] = $meth;
		$a['url'] = $url;
		return self::senddata($a);
	}
	private static function httpheaders($data = []) {
		$h = [];
		if (array_key_exists('heads',$data)) {
			$h += $data['heads'];
        }
		$h['Accept'] = 'application/json';
		$h['content-type'] = 'application/json';
		return ['headers' => $h];
	}
}