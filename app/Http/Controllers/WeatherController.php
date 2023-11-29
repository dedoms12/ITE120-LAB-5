<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = '0617566657c0a120dbc3c035d80159db';
        $city = $request->input('city');

        if (!$city) {
            // You may want to handle this case differently, e.g., redirect back with an error message
            return view('weather', ['error' => 'Please enter a city']);
        }

        $response = Http::get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}");

        $weatherData = $response->json();

        return view('weather', [
            'weatherData' => $weatherData,
            'weatherConditionCode' => isset($weatherData['weather'][0]['id']) ? $weatherData['weather'][0]['id'] : null,
        ]);
    }
}
