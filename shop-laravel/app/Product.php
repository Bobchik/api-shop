<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Product extends Model
{
//    private static $token;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getToken()
    {
        $client = new Client();
        $request = $client->request('POST', '192.168.33.11:8080/api/login', [
            'form_params' => [
                'name' => env('API_NAME'),
                'email' => env('API_EMAIL'),
                'password' => env('API_PASSWORD')
            ]
        ]);

        $response = $request->getBody();
        $arr = json_decode($response, true);

        session(['api_token' => $arr['data']['token']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function getAllProducts(): array
    {
        if(session('api_token') == null) {
            $this->getToken();
        }

        $client = new Client();
        $request = $client->request('GET', '192.168.33.11:8080/api/products', [
            'headers' => [
                'Authorization' => 'Bearer '.session('api_token')
            ]
        ]);
        $response = $request->getBody();
        $products = json_decode($response);

        return $products;

    }
}
