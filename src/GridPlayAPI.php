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

	public function __construct() {
		//
	}
	/*
	* Send any data to a in world prim
	* GridPlayAPI::senddata(['type' => 'GET', 'url' => 'url', 'body' => 'otherdata'])
	*/
	public static function senddata($data = []) {
		$send = self::httpheaders($data);
		$send['timeout'] = 3.14;
		if (!empty($data['auth'])) {
			$send['auth'] = $data['auth'];
		}
		if (!empty($data['body'])) {
			$send['body'] = $data['body'];
		}
		if (!empty($data['query'])) {
			$send['query'] = $data['query'];
		}
		if (!empty($data['json'])) {
			$send['json'] = $data['json'];
		}
		if (!empty($data['form'])) {
			$send['form_params'] = $data['form'];
		}
		if (!empty($data['form_params'])) {
			$send['form_params'] = $data['form_params'];
		}
		if (isset($data['timeout'])) {
            $send['timeout'] = $data['timeout'];
        }
		$client = new Client(); // Guzzle
		$reply = "error";
		try {
			$response = $client->request($data['type'], self::$url.'/'.$data['url'], $send);
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
	    $h = [];
	    $nh = [];
		if (isset($data['heads'])) {
			$nh = $data['heads'];
		    $h = $nh;
        }
        /* application/x-www-form-urlencoded */
		$h += ['verify' => false,
		'content-type' => 'application/x-www-form-urlencoded'];
		if (array_key_exists('json', $data)) {
			$h['content-type'] = 'application/json';
		}
        if (isset($data['content-type'])) {
            $h['content-type'] = $data['content-type'];
        }
		return ['headers' => $h];
	}
}