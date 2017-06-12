<?php
namespace App\Services;
use App\Twitt;
use Thujohn\Twitter\Facades\Twitter;
class TwitterService{
	

	public function updateTwittsCollection()
	{
        $hashtags = array("pollution","noise","criminality");
        // twitter text regex form
        $patterns = array();
        $patterns[0] = '/#([A-Za-z0-9]+[A-Za-z0-9]+)/';
        $patterns[1] = '/#/';

        foreach ($hashtags as $hashtag) {

            $currentSearchHashtags = "#PerfectPlaceFinder,#".$hashtag;
            $json = Twitter::getSearch(['q' => $currentSearchHashtags, 'format' => 'json', 'count' => 100]);
            $result = json_decode($json, true);
            $numberOfTwitts = count($result['statuses']);

            for ($index = 0; $index < $numberOfTwitts; $index++) {

                try {
                    $twittId = $result['statuses'][$index]['id'];
                    $fullText = $result['statuses'][$index]['text'];
                    $address = trim(preg_replace($patterns, "", $fullText));
                    if(count(Twitt::where('twittId',$twittId)->get())==0){
                        $twittData = array();
                        $twittData['twittId'] = $twittId;
                        $twittData['type'] = $hashtag;
                        $twittData['text'] = $address;
                        $newTwitt = Twitt::create($twittData);
                    }

                } catch (Exception $e) {
                    //
                }
            }
        }
    }
}