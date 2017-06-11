<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Twitt;
use Thujohn\Twitter\Facades\Twitter;

class TwitterHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitts:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the database with the newest tweets.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $hashtags = array("pollution","noise","attack");
        // twitter text regex form
        $patterns = array();
        $patterns[0] = '/#([A-Za-z0-9]+[A-Za-z0-9]+)/';
        $patterns[1] = '/#/';

        foreach ($hashtags as $hashtag) {

            $currentSearchHashtags = "#PerfectPlaceFinder,#".$hashtag;
            $json = Twitter::getSearch(['q' => $currentSearchHashtags, 'format' => 'json', 'count' => 100]);
            $result = json_decode($json, true);
            $numberOfTweets = $result['search_metadata']['count'];

            for ($index = 0; $index < $numberOfTweets; $index++) {

                try {

                    $fullText = $result['statuses'][$index]['text'];
                    $address = trim(preg_replace($patterns, "", $fullText));

                    // Add twitt to database
                    $twittData = array();
                    $twittData['type'] = $hashtag;
                    $twittData['text'] = $address;
                    $newTwitt = Twitt::create($twittData);  

                } catch (Exception $e) {
                    // do nothing
                }
            }
        }
    }
}
