<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use guzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function getData(){
        $client=new Client();
        $request=$client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=ca4fad88b0d648419b318b6dedea128f');
        $response=$request->getBody();
        $result=json_decode($response);
        return view('welcome',['artikel'=>$result->articles]);
    }
    
}
