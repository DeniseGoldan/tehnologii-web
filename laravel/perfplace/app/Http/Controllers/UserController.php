<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateNamesRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateContactInformationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;	
use App\User;
use Mail;
use Session;

class UserController extends Controller
{
    public function show($id) {
    	$user = User::find($id);
    	return $user;
    }

    public function editNames(UpdateNamesRequest $request) {

        $user = Auth::user();
        $user->username = $request->input('username');
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->save();
                     
        $saved_user = User::find(Auth::user()->id);
        if ($saved_user->username == $user->username 
            && $saved_user->firstName == $user->firstName
            && $saved_user->lastName == $user->lastName){            
            Session::flash('success','Your name fields have been successfully updated!');
        } else {
            Session::flash('problem', 'Your name fields could not be updated...');
        }

        return redirect('/profile');
    }

    public function changePassword(ChangePasswordRequest $request) {

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $current_password = Auth::User()->password; 

        if (Hash::check($request->input('password'), $current_password)){
            Session::flash('success','Your password has been successfully changed!');
        } else {
            Session::flash('problem', 'Your password could not be updated...');
        }

        return redirect('/profile');
    }

    public function editContactInformation(UpdateContactInformationRequest $request) {
        
        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();

        $saved_user = User::find(Auth::user()->id);
        if ( $saved_user->phone == $user->phone 
            && $saved_user->email == $user->email){            
            Session::flash('success','Your contact information has been successfully updated!');
        } else {
            Session::flash('problem', 'Your contact information could not be updated...');
        }

        return redirect('/profile');
    }

/*
    public function contactUser (Request $request) {

    	$this->validate($request,
            [
        		'emailFrom' => 'required|email',
        		'content' => 'min:20'
            ]
            );

    	$data = array (
            'emailFrom' => $request->emailFrom,
    		'content' => $request->content
            );

    	   Mail::send('emails.contact', $data, function($message) use ($data){
        		$message->from($data['emailFrom']);
        		$message->to("andrei.harpa.ah@gmail.com");
        		$message->subject('Someone is interested in your Property');
    	   });

    	Session::flash('success','Your email was sent');
    	return redirect('/');﻿
    }
    */
}
