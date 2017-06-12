<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Twitt;
use App\Event;
use Thujohn\Twitter\Facades\Twitter;
use App\Services\EventBuilder;
use App\Services\TwitterService;

class TwitterEventUpdater extends Command
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
        $TwitterService = new TwitterService;
        $EventBuilder = new EventBuilder;
        $lastTwitt = Twitt::orderBy('_id', 'desc')->first();
        if($lastTwitt==NULL){
            $id='000000000000000000000000';
        }
        else $id=$lastTwitt->id;
        $TwitterService->updateTwittsCollection();
        $EventBuilder->buildEvents($id);
    }
}
