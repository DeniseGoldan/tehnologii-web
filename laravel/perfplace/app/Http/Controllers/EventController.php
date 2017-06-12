<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Input;
use App\Console\Commands\TwitterEventUpdater;
use App\Services\ReverseGeocoder;
class EventController extends Controller
{
    public function getEvents(){
    	$events = Event::where('country',Input::get('country'))->where('city',Input::get('city'))->where('type',Input::get('type'))->select('latitude','longitude')->get();
    	return response()->json($events);
    }
    private function degreesToRadians($degrees) {
        return ($degrees * pi() / 180.0);
    }

    private function radiansToDegrees($radians) {
        return ($radians * 180 / pi());
    }

    public function isInRadius($latitude1,$longitude1,$latitude2,$longitude2,$radius){
    	if($this->calculateDistance($latitude1,$longitude1,$latitude2,$longitude2)<=$radius)
    		return true;
    	else return false;
    }

	public function calculateDistance($latitude1,$longitude1,$latitude2,$longitude2){
		$EARTH_RADIUS = 6371000; // in meters
        $latitudeInRadians1 = $this->degreesToRadians($latitude1);
        $latitudeInRadians2 = $this->degreesToRadians($latitude2);
        $deltaLatitudeInRadians = $this->degreesToRadians($latitude2-$latitude1);
        $deltaLongitudeInRadians = $this->degreesToRadians($longitude2-$longitude1);
		$a = pow(sin($deltaLatitudeInRadians/2),2)+cos($latitudeInRadians1)*cos($latitudeInRadians2)*pow(sin($deltaLongitudeInRadians/2),2);
        $c = 2 * atan2(sqrt($a),sqrt(1-$a));

        $distance = $EARTH_RADIUS * $c;

        return $distance;
    }

    public function computeScore($latitude,$longitude){
    	$cityAndCountry=ReverseGeocoder::getCityAndCountry($latitude,$longitude);
    	$eventsInSearchArea = Event::where('city',$cityAndCountry['city'])->where('country',$cityAndCountry['country'])->get();
    	$pollutionRate =0;
    	$noiseRate =0;
    	$criminalityRate =0;
    	foreach ($eventsInSearchArea as $event) {
    		if($event->type == 'pollution'){
    			if($this->isInRadius($latitude,$longitude,$event->latitude,$event->longitude,500)==true){
    				$pollutionRate = $pollutionRate+1;
    			}
    	
    		}
    		if($event->type == 'noise'){
    			if($this->isInRadius($latitude,$longitude,$event->latitude,$event->longitude,200)==true){
    				$noiseRate = $noiseRate+1;
    			}
    				
    		}
    		if($event->type == 'criminality'){
    			if($this->isInRadius($latitude,$longitude,$event->latitude,$event->longitude,100)==true){
    				$criminalityRate = $criminalityRate+1;
    			}
    		}
    	}
    	$array = array(
    		"location" =>array(
    			"latitude" => $latitude,
    			"longitude"=>$longitude,
    			"city" => $cityAndCountry['city'],
    			"country" => $cityAndCountry['country']
    			),
    		"scores" =>array(
    			"pollution"=>$pollutionRate,
    			"noise"=>$noiseRate,
    			"criminality"=>$criminalityRate
    			)
    		);
    	return $array;
    }
    public function restResponse(){
    	$latitude = Input::get('latitude');
    	$longitude = Input::get('longitude');
    	if(Input::get('latitude')==null||Input::get('longitude')==null||count(Input::all())>2){
			return response()->json(["message"=>"Wrong query parameters"],400);
    	}	
    	else return response()->json($this->computeScore($latitude,$longitude),200);

    }
}
