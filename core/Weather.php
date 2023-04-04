<?php

namespace App\Core;

class Weather
{
    // const API_KEY = env('API_WEATHER_KEY');
    const LATITUDE = 42.70085587186303;
    const LONGITUDE = 2.8940680732394544;
    const UNITS = "metric";

    public static function buildUrl($value)
    {
        return "https://api.openweathermap.org/data/2.5/$value?lat=" . self::LATITUDE . "&lon=" . self::LONGITUDE . "&units=" . self::UNITS . "&appid=" . env('API_WEATHER_KEY');
    }

    public static function getData($url)
    {
        return json_decode(file_get_contents($url), true);
    }

    public static function today()
    {
        $data = self::getData(self::buildUrl('weather'));

        return [
            'today' => [
                'date' => date('d/m/Y', $data['dt']),
                'temperature' => round($data['main']['temp']),
                'wind' => round($data['wind']['speed']),
                'icon_url' => "http://openweathermap.org/img/wn/{$data['weather'][0]['icon']}@2x.png",
                'description' => $data['weather'][0]['description']
            ]
        ];
    }

    public static function tomorrow()
    {
        $data = self::getData(self::buildUrl('forecast'));

        return [
            'tomorrow' => [
                'date' => date('d/m/Y', $data['list'][9]['dt']),
                'temperature' => round($data['list'][9]['main']['temp']),
                'wind' => round($data['list'][9]['wind']['speed']),
                'icon_url' => "http://openweathermap.org/img/wn/{$data['list'][9]['weather'][0]['icon']}@2x.png",
                'description' => $data['list'][9]['weather'][0]['description']
            ]
        ];
    }

    public static function weather()
    {
        return array_merge(self::today(), self::tomorrow());
    }
}
