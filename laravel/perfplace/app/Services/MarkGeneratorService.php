<?php
namespace App\Services;
use MarkOnGMap;

class MarkGeneratorService

{
	public function float_rand($Min, $Max, $round=0){
    //validate input

    $randomfloat = $Min + mt_rand() / mt_getrandmax() * ($Max - $Min);
    if($round>0)
        $randomfloat = round($randomfloat,$round);
 
    return $randomfloat;
	}
	public function lookup($string){
	 
	   	$string = str_replace (" ", "+", urlencode($string));
	   	$details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
	 
	   $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $details_url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   $stringJSON = curl_exec($ch);
	   $response = json_decode($stringJSON, true);
	 
	   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
	   if ($response['status'] != 'OK') {
	    return null;
	   }
	 
	   print_r($stringJSON);
	 	$bounds = $response['results'][0]['geometry']['bounds'];
	    $upperLatitude = $bounds['northeast']['lat'];
	    $upperLongitude = $bounds['northeast']['lng'];

	    $lowerLatitude = $bounds['southwest']['lat'];
	    $lowerLongitude = $bounds['southwest']['lng'];
	 	$randLatitude = $this->float_rand($lowerLatitude,$upperLatitude);
	 	$randLongitude= $this->float_rand($lowerLongitude,$upperLongitude);
	    $array = array(
	        'randomLatitude'=> $randLatitude,
	        'randLongitude' => $randLongitude
	    );
	 
	    return $array;
	}

}