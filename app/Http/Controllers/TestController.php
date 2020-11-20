<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use guzzleHttp\Exception\RequestException;

class TestController extends Controller
{
    public function searchData(Request $request){
        $client = new Client();
        $query = $request->keyword;
        $req = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=ca4fad88b0d648419b318b6dedea128f&q='.$query);
        $response = $req->getBody();
        $result= json_decode($response);
        return view('welcome',['artikel'=>$result->articles]);
        
    }
}
