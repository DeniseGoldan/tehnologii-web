<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;	
use Mail;
use Session;
class UserController extends Controller
{
    public function show($id){
    	$user = User::find($id);
    	return $user;
    }
    public function contactUser	(Request $request){
    	$this->validate($request,[
    		'emailFrom' => 'required|email',
    		'content' => 'min:20']);
    	$data = array
    	('emailFrom' => $request->emailFrom,
    		'content' => $request->content);
    	Mail::send('emails.contact',$data,	function($message) use ($data){
    		$message->from($data['emailFrom']);
    		$message->to("andrei.harpa.ah@gmail.com");
    		$message->subject('Someone is interested in your Property');
    	});
    	Session::flash('success','Your email was sent');
    		return redirect('/');﻿
    }
}
