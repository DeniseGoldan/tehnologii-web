<?php
namespace App\Services;
use App\Event;
use App\Twitt;
class EventBuilder {

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
	 	$bounds = isset($response['results'][0]['geometry']['bounds']) ? $response['results'][0]['geometry']['bounds'] : null;
	 	$viewport=isset($response['results'][0]['geometry']['viewport']) ? $response['results'][0]['geometry']['viewport'] : null;
	 	if($viewport!=null){
	 		$limits = $viewport;
	 	}
	 	else $limits = $bounds;
	    $upperLatitude = $limits['northeast']['lat'];
	    $upperLongitude = $limits['northeast']['lng'];

	    $lowerLatitude = $limits['southwest']['lat'];
	    $lowerLongitude = $limits['southwest']['lng'];
	 	$randLatitude = $this->float_rand($lowerLatitude,$upperLatitude);
	 	$randLongitude= $this->float_rand($lowerLongitude,$upperLongitude);
	 	for($i = 0; $i < count($response['results'][0]['address_components']); $i++) {
              if($response['results'][0]['address_components'][$i]['types'][0] == "country") {
                $country =  $response['results'][0]['address_components'][$i]['long_name'];
              }
              if($response['results'][0]['address_components'][$i]['types'][0] == "locality") {
               	$city =  $response['results'][0]['address_components'][$i]['long_name'];
              }
            }
	    $array = array(
	        'randomLatitude'=> $randLatitude,
	        'randomLongitude' => $randLongitude,
	        'country'=>$country,
	        'city'=>$city
	    );
	 
	    return $array;
	}

	public function buildEventFromTweet($id){
		$twitt = Twitt::find($id);
		$location = $this->lookup($twitt->text);
		$mark = new Event;
		$mark->latitude = $location['randomLatitude'];			
		$mark->longitude= $location['randomLongitude'];
		$mark->country = $location['country'];
		$mark->city= $location['city'];
		$mark->type= $twitt->type;
		$mark->save();
	}

	public function buildEvents($id){
		echo $id;
		$twitts = Twitt::where('_id','>',$id)->get();
		foreach($twitts as $twitt){
			echo 'papansi';
			$this->buildEventFromTweet($twitt->id);
		}
	}

}