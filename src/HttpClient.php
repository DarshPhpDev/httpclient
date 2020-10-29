<?php

namespace DarshPhpDev\HttpHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as HttpRequest;


class HttpClient
{
	/**
	 * Enable using HttpClient::get() || HttpClient::post() using __callStatic magic method.
	 * like javascript http client axios
	*/
	public static function __callStatic($methodName, $arguments){
		$url = isset($arguments[0]) ? $arguments[0] : '';
		$body = isset($arguments[1]) ? $arguments[1] : null;
		$headers = isset($arguments[2]) ? $arguments[2] : [];
		return self::send($url, $methodName, $body, $headers);
	}

	/**
	 * Send Http Request to any url and format returned response.
	 * @param string $url
	 * @param string $method (get | post)
	 * @param array $body
	 * @param array $headers
	 * @param string $bodyType
	 * @return array response
	 * @throws Exception
	*/
	public static function send($url, $method, $body = null, $headers = [], $bodyType = 'json') {
		try{
			$headers = count($headers) == 0 ? setDefaultHeaders() : $headers;
			$httpClient = new Client(['verify' => config('httphelper.verify_ssl')]);
			$response = $httpClient->request($method, $url, setOptionsArray($method, $headers, $body, $bodyType));
			if($response->getStatusCode() >= 200 && $response->getStatusCode() < 300){
				return handleResponse($response);
			}else{
				return handleErrorResponse($response);
			}
		}catch(\Exception $e){
		    throw new \Exception($e->getMessage());
		}
	}
}
