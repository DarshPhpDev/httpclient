<?php

namespace DarshPhpDev\HttpHelper;

use Illuminate\Support\ServiceProvider;

class HttpClientServiceProvider extends ServiceProvider{


	public function boot()
	{
		$this->mergeConfig();
		$this->publishConfig();
	}

	public function register()
	{
		//
	}

	protected function publishConfig()
	{
    	$this->publishes([
    	       __DIR__.'/config/httpclient.php' => config_path('httpclient.php')
       	], 'httpclient');
	}

	protected function mergeConfig()
	{
		$this->mergeConfigFrom( 
			__DIR__.'/config/httpclient.php', 'httpclient' 
		);
	}
}