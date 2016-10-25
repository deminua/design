<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiClientController extends Controller
{

//http://valerij.pp.ua/import-gmail-contacts/
    public function __construct()
    {
        $this->middleware('api');

		$this->client_id = env('google_api_client_id');
		$this->project_id = env('google_api_project_id');
		$this->auth_uri = env('google_api_auth_uri');
		$this->token_uri = env('google_api_token_uri');
		$this->auth_provider_x509_cert_url = env('google_api_auth_provider_x509_cert_url');
		$this->client_secret = env('google_api_client_secret');
		$this->redirect_uris = env('google_api_redirect_uris');
		$this->javascript_origins = env('google_api_javascript_origins');

		$this->url = $this->auth_uri;

    }

public function getNewToken(Request $request)
    {   

	$oauthData = [
		'code' => $authCode,
		'client_id' => $this->client_id,
		'client_secret' => $this->client_secret,
		'redirect_uri' => $this->redirect_uri,
		'grant_type' => 'authorization_code',
    ];



        $client = new Client([
            'curl' => [
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ],
        ]);

		return $client->get($this->link($action))->getBody()->getContents();
	}

public function oauth2callback(Request $request)
    {   
        return $request->code;
    }

    public function sendData($action)
    {
        $client = new Client([
            'curl' => [
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ],
        ]);

		$response = $client->get($this->url.'?'.http_build_query($action))->getBody()->getContents();
		return $response;
    }

    public function contacts()
    {
    	
		$action = [
		'client_id'=>$this->client_id,
		'scope'=>'https://www.google.com/m8/feeds/',
		'response_type' => 'code',
		];

		$response = $this->sendData($action);

		#return json_decode($response);

		return $response;


    }
}
