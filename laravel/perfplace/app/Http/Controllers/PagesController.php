<?php

namespace App\Http\Controllers;

class PagesController extends Controller{
	public function getIndex(){
		return view('pages.home');
	}

	public function getAddNewProperty(){
		return view('pages.add');
	}

	public function getSingleProperty(){
		return view('pages.property');
	}

	public function getUserProfile(){
		return view('pages.user');
	}

	public function getUserRegister(){
		return view('pages.register');
	}

	public function getPropertyResults(){
		return view('pages.results');
	}

	public function getUserProperties(){
		return view('pages.userProperties');
	}

	public function getEditProperty(){
		return view('pages.editProperty');
	}

	public function getMap(){
		return view('pages.map');
	}
}