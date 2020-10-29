<?php

if (! function_exists('setOptionsArray')) {

	/**
	 * set Default options array ('headers', 'body', etc)
	 *
	 * @param  string  $method
	 * @param  array   $headers
	 * @param  array   $body
	 * @param  string  $bodyType
	 * @return array
	 */
	function setOptionsArray($method, $headers, $body, $bodyType)
	{
		$options =  [
			'headers' 			=> $headers,
			'connect_timeout'	=> config('httphelper.connect_timeout'),
			'http_errors'		=> false,
		];
		if(strtolower($method) == 'get'){
			if($body && count($body) > 0)
				$options [] = ['query' => $body];
		}else{
			if($body && count($body) > 0){
				switch ($bodyType) {
					case 'form_params':
						$options [] = ['form_params' => $body];
						break;

					case 'multipart':
						$options [] = ['multipart' => $body];
						break;

					default:
						$options [] = ['json' => $body];
						break;
				}
			}
		}
		return $options;
	}
}


if (! function_exists('handleResponse')) {

	/**
	 * decode and format success response before return.
	 *
	 * @param  response  $response
	 * @return array
	 */
	function handleResponse($response){
		$contents = (array) json_decode($response->getBody()->getContents());
		return [
			'status'	=> $response->getStatusCode(),
			'message'	=> $response->getReasonPhrase(),
			'data'		=> $contents,
		];
	}
}

if (! function_exists('handleErrorResponse')) {

	/**
	 * decode and format error response before return.
	 *
	 * @param  response  $response
	 * @return array
	 */
	function handleErrorResponse($response){
		return [
			'status'	=> $response->getStatusCode(),
			'message'	=> $response->getReasonPhrase(),
		];
	}
}

if (! function_exists('setDefaultHeaders')) {

	/**
	 * set Default headers array if no headers found
	 *
	 * @return array
	 */

	function setDefaultHeaders()
	{
		return [
			'Content-Type' 	=> 'application/json',
			'Accept'		=> '*/*'
		];
	}
}
