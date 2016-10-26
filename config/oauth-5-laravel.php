<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',
	/**
	 * Consumers
	 */
	'consumers' => [

		'Google' => [
			'client_id'     => env('google_api_client_id'),
			'client_secret' => env('google_api_client_secret'),
			'scope'         => ['https://www.google.com/m8/feeds/'],
		],

	]

];