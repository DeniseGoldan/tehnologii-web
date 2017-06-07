<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Apartment;
use App\House;
use App\User;
use Session;
use Storage;
use App\Support\Collection;
use Auth;

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
    public function getFiltered(){
        $houses = House::where('country','=',Input::country())->where('city','=',Input::city());
    }

    public function showAll() {
        $houses = House::all();
        $apartments = Apartment::all();
        $mergedCollections = $houses->merge($apartments);
        $properties = ( new Collection( $mergedCollections ) )->paginate(5);
        return view ('pages.results')->withProperties($properties);
    }

    public function showUserProperties() {
        $houses = House::all()->where('userId', Auth::user()->id);
        $apartments = Apartment::all()->where('userId', Auth::user()->id);
        $mergedCollections = $houses->merge($apartments);
        $properties = ( new Collection( $mergedCollections ) )->paginate(5);
        return view ('pages.userProperties')->withProperties($properties);
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
        $keyValueArray['userId'] = Auth::user()->id;
        $property = null;

        if(strcmp($fields,'apartment')==0) {
            $keyValueArray['floorNumber'] = $request->floorNumber;
            $property = Apartment::create($keyValueArray);
        } else {
            $keyValueArray['numberOfFloors'] = $request->numberOfFloors;
            $property = House::create($keyValueArray);
        }

        for($i=1;$i<=5;$i++){
            if($request->hasFile('image'.$i)){
                $file = $request->file('image'.$i);
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = $property->id.'_'.$i.'.'.$extension;
                $path = $file->storeAs('public/propertyPictures', $filename);   
            }
        }
        
        Session::flash('success','The new property has been succesfully saved!');
        return redirect('myProperties');
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
        $property = null;
        if($house != null){
            $property = $house;
        }
        else if($apartment != null) {
            $property = $apartment;
        }
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
        $house = null;
        $house = House::find($id);
        $apartment = null;
        $apartment = Apartment::find($id);
        $property = null;
        if($house != null){
            $property = $house;
        }
        else if($apartment != null) {
            $property = $apartment;
        }
        return view('pages.editProperty')->with('property',$property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePropertyRequest $request, $id){
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
        $propertyType = $property->propertyType;

        $property->title = $request->input('title');
        $property->propertyTypeitle = $request->input('propertyType');
        $property->description = $request->input('description');
        $property->numberOfRooms = $request->input('numberOfRooms');
        $property->surface = $request->input('surface');;
        $property->price = $request->input('price');
        $property->transactionType = $request->input('transactionType');
        $property->latitude = $request->input('latitude');
        $property->longitude = $request->input('longitude');
        $property->country = $request->input('country');
        $property->city = $request->input('city');
        $property->address = $request->input('address');
        if(strcmp($propertyType,'apartment')==0) {
            $property->floorNumber = $request->input('floorNumber');
            $property->numberOfFloors = null;
        } else {
            $property->numberOfFloors = $request->input('numberOfFloors');
            $property->floorNumber = null;
        }

        $property->save();

          for($i=1;$i<=5;$i++){
            if($request->hasFile('image'.$i)){
                $file = $request->file('image'.$i);
                $extension = strtolower($file->getClientOriginalExtension());
                $filename = $property->id.'_'.$i.'.'.$extension;
                $path = $file->storeAs('public/propertyPictures', $filename);   
            }
        }

         Session::flash('success','The new property has been succesfully modified!');
         return redirect('myProperties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
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
        for($i = 1 ; $i<=5 ; $i++){
            $path = $property->getImagePath($i);
            if($path !=false){

                Storage::delete($path);
            }
        }
        $property->delete();
    }
}
