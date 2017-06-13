<?php
namespace App\Http\Controllers;
use App\Apartment;

class PagesController extends Controller{
	public function getIndex(){
		return view('pages.home');
	}

	public function getSingleProperty(){
		return view('pages.property');
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