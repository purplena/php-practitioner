<?php

namespace App\Core;

class Weather
{
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
            'date'        => date('d/m/Y', $data['dt']),
            'temperature' => round($data['main']['temp']),
            'wind'        => round($data['wind']['speed']),
            'icon_url'    => "http://openweathermap.org/img/wn/{$data['weather'][0]['icon']}@2x.png",
            'description' => $data['weather'][0]['description']
        ];
    }

    public static function generateTomorrowDate()
    {
        $now = new \DateTime();
        $tomorrow = $now->modify('+1 day');
        $tomorrow->setTime(12, 0, 0);
        return $tomorrow->format('Y-m-d H:i:s');
    }

    public static function tomorrow()
    {
        $data = self::getData(self::buildUrl('forecast'));
        $tomorrow = [];
        foreach ($data['list'] as $item) {
            if ($item['dt_txt'] == self::generateTomorrowDate()) {
                $tomorrow = [
                    'date'         => date('d/m/Y', $item['dt']),
                    'temperature'  => round($item['main']['temp']),
                    'wind'         => round($item['wind']['speed']),
                    'icon_url'     => "http://openweathermap.org/img/wn/{$item['weather'][0]['icon']}@2x.png",
                    'description'  => $item['weather'][0]['description']
                ];
            }
        }
        return $tomorrow;
    }

    public static function weather()
    {
        return [
            'today'     => self::today(),
            'tomorrow'  => self::tomorrow()
        ];
    }
}
