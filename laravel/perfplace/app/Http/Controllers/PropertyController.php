<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Apartment;
use App\House;
use App\User;
use Session;
use App\Support\Collection;

class PropertyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view('pages.home');
    }

    public function indexByFilter(Request $request) {
        $propertyTypes = $request->input('propertyType');
        $results = array();
        foreach ($propertyTypes as $type) {
            if(type == 'apartmentCheck'){
                // -- NOT IMPLEMENTED --
            }
        }
    }

    public function showAll() {

        $houses = House::all();
        $apartments = Apartment::all();
        $mergedCollections = $houses->merge($apartments);
        $properties = ( new Collection( $mergedCollections ) )->paginate(5);
        return view ('pages.results')->withProperties($properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $request) {

        // Save the property to the database
        $property = null;
        $fields = $request->get('propertyType');
        $keyValueArray = array();
        $keyValueArray['title'] = $request->title;
        $keyValueArray['propertyType'] = $request->propertyType;
        $keyValueArray['description'] =  $request->description;
        $keyValueArray['numberOfRooms'] = $request->numberOfRooms;
        $keyValueArray['surface'] = $request->surface;
        $keyValueArray['price'] = $request->price;
        $keyValueArray['transactionType'] = $request->transactionType;
        $keyValueArray['latitude'] = $request->latitude;
        $keyValueArray['longitude'] = $request->longitude;
        $keyValueArray['country'] = $request->country;
        $keyValueArray['city'] = $request->city;
        $keyValueArray['address'] = $request->address;
        $property = null;

        if(strcmp($fields,'apartment')==0) {
            $keyValueArray['floorNumber'] = $request->floorNumber;
            $property = Apartment::create($keyValueArray);
        } else {
            $keyValueArray['numberOfFloors'] = $request->numberOfFloors;
            $property = House::create($keyValueArray);
        }

        $picture = '';
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $counter=0;
            foreach($files as $file){
                $counter++;
                // Convert file extension to lower before adding them to the database
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = $property->id.'_'.$counter.'.'.$extension;
                $path = $file->storeAs('public/propertyPictures', $filename);   
            }
        }
        Session::flash('success','The new property has been succesfully saved!');
        return redirect('userProperties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $house = null;
        $house = House::find($id);
        $apartment = null;
        $apartment = Apartment::find($id);
        if($house != null){
            $property = $house;
        }
        else if($apartment != null) {
            $property = $apartment;
        }
        if(isset($property))
            $user = User::find($property->userId);
        return view('pages.property')->with('property',$property)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $house = null;
        $house = House::find($request->id);
        $apartment = null;
        $apartment = Apartment::find($request->id);
        if($house != null){
            $property = $house;
        }
        else if($apartment != null) {
            $property = $apartment;
        }

        $fields = $request->get('propertyType');
        $keyValueArray = array();
        $keyValueArray['title'] = $request->title;
        $keyValueArray['propertyType'] = $request->propertyType;
        $keyValueArray['description'] =  $request->description;
        $keyValueArray['numberOfRooms'] = $request->numberOfRooms;
        $keyValueArray['surface'] = $request->surface;
        $keyValueArray['price'] = $request->price;
        $keyValueArray['transactionType'] = $request->transactionType;
        $keyValueArray['latitude'] = $request->latitude;
        $keyValueArray['longitude'] = $request->longitude;
        $keyValueArray['country'] = $request->country;
        $keyValueArray['city'] = $request->city;
        $keyValueArray['address'] = $request->address;
        $property = null;

        if(strcmp($fields,'apartment')==0) {
            $keyValueArray['floorNumber'] = $request->floorNumber;
            $property = Apartment::create($keyValueArray);
        } else {
            $keyValueArray['numberOfFloors'] = $request->numberOfFloors;
            $property = House::create($keyValueArray);
        }
        for($i = 1 ; $i<=5 ; $i++){
            if($property->getImage($i)!=false){
                Storage::delete($property->getImage($i));
            }
        }

        $picture = '';
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $counter=0;
            foreach($files as $file){
                $counter++;
                // Convert file extension to lower before adding them to the database
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = $property->id.'_'.$counter.'.'.$extension;
                $path = $file->storeAs('public/propertyPictures', $filename);   
            }
        }
        Session::flash('success','The new property has been succesfully modified!');
        return redirect('userProperties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
