<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Input;
use App\Console\Commands\TwitterEventUpdater;
class EventController extends Controller
{
    public function getEvents(){
    	$events = Event::where('country',Input::get('country'))->where('city',Input::get('city'))->where('type',Input::get('type'))->select('latitude','longitude')->get();
    	return response()->json($events);
    }
    public function getTweets(){
    	$helper=new TwitterEventUpdater;
    	$helper->handle();
    }
}
