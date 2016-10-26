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
		$this->redirect_uri = env('google_api_redirect_uris');
        $this->javascript_origins = env('google_api_javascript_origins');
        $this->token = session()->get('access_token');
        $this->token_expires = session()->get('access_token_expires');

		$this->url = '';

    }


//Callback Code
public function oauth2callback2(Request $request)
    {   

       $oauthData = [
            'grant_type'=> 'authorization_code',
            'code' => $request->code,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
        ];

        $this->url = $this->token_uri;

        return dd($this->sendDataPost($oauthData));
    }


    //Получаем токен
    public function getToken()
    {   

        if(isset($this->token) && $this->token_expires > time()) {
            return $this->token;
        }

        return $this->oauth2();
    }

    public function oauth2()
    {
        $action = [
        'client_id'=>$this->client_id,
        'scope'=>'https://www.google.com/m8/feeds/',
        'response_type' => 'code',
        'redirect_uri' => $this->redirect_uri,
        'v' => '3.0',
        ];

        $this->url = $this->auth_uri;

        return $this->sendData($action);
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

    public function sendDataPost($action)
    {
        $client = new Client([
            'curl' => [
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ],
        ]);

        $response = $client->post($this->url.'?'.urldecode(http_build_query($action)))->getBody()->getContents();
        return $response;
    }

    public function contacts()
    {

        return $this->getToken();
        #session()->put('code', '123');
        #session()->save();

    	#return dd(session()->all());

		$action = [
		'client_id'=>$this->client_id,
		'scope'=>'https://www.google.com/m8/feeds/',
		'response_type' => 'code',
        'redirect_uri' => $this->redirect_uri,
		];

		$response = $this->sendData($action);

		#return json_decode($response);

		return $response;


    }

public function oauth2callback(Request $request)
{
    // get data from request
    $code = $request->get('code');

    // get google service
    $googleService = \OAuth::consumer('Google');

    // check if code is valid

    // if code is provided get user data and sign in
    if ( ! is_null($code))
    {
        // This was a callback request from google, get the token
        $token = $googleService->requestAccessToken($code);
        return dd($token);
        // Send a request with it
        // $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

        // $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
        // echo $message. "<br/>";

        // //Var_dump
        // //display whole array.
        // dd($result);
    }
    // if not ask for permission first
    else
    {
        // get googleService authorization
        $url = $googleService->getAuthorizationUri();

        // return to google login url
        return redirect((string)$url);
    }
}

}
