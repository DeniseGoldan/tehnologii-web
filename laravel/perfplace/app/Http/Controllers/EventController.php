<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Input;
class EventController extends Controller
{
    public function getEvents(){
    	$events = Event::where('country',Input::get('country'))->where('city',Input::get('city'))->where('type',Input::get('type'))->get();
    	return response()->json($events);
    }
}
