<?php
namespace App\Services;
class ReverseGeocoder{
    

    public static function getCityAndCountry($latitude,$longitude)
    {
        $response= file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&sensor=true_or_false');
        $response =  json_decode($response, true);
        $city = null;
        $country = null;
        for($i = 0; $i < count($response['results'][0]['address_components']); $i++) {
              if($response['results'][0]['address_components'][$i]['types'][0] == "country") {
                $country =  $response['results'][0]['address_components'][$i]['long_name'];
              }
              if($response['results'][0]['address_components'][$i]['types'][0] == "locality") {
                $city =  $response['results'][0]['address_components'][$i]['long_name'];
              }
            }
        $array = array(
            'country'=>$country,
            'city'=>$city
        );
        return $array;
    }
}