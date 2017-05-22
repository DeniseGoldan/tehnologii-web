<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Apartment;
use App\House;
use Session;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.home');
    }

    public function indexByUserId($id)
    {
        
    }

    public function indexByFilter(Request $request)
    {
        $propertyTypes = $request->input('propertyType');
        $results = array();
        foreach ($propertyTypes as $type) {
            if(type == 'apartmentCheck'){
                
            }
        }

    }

    public function showAll(){
        $properties = Apartment::all();
        //$properties = $properties[]=House::all();
        return view('pages.results')->withProperties($properties);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $request)
    {
        // Validate Request

        // "bail" =  stop running validation rules on an attribute after the first validation failure

        // Save the property to the database
        $property = null;
        $fields = $request->get('propertyType');
        $keyValueArray = array();
        $keyValueArray['title'] = $request->title;
        $keyValueArray['description'] =  $request->description;
        $keyValueArray['numberOfRooms'] = $request->numberOfRooms;
        $keyValueArray['surface'] = $request->surface;
        $keyValueArray['price'] = $request->price;
        $keyValueArray['transactionType'] = $request->transactionType;
        $keyValueArray['latitude'] = $request->latitude;
        $keyValueArray['longitude'] = $request->longitude;
        $keyValueArray['address'] = $request->address;
        $property=null;
        if(strcmp($fields,'apartment')==0){
            $keyValueArray['floorNumber'] = $request->floorNumber;
            $property = Apartment::create($keyValueArray);
        }else{
            $keyValueArray['numberOfFloors'] = $request->numberOfFloors;
            $property = House::create($keyValueArray);
        }

       
        //////////////////////////////
        $picture = '';
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $counter=0;
            foreach($files as $file){
                $counter++;
                $extension = $file->getClientOriginalExtension();
                $filename=$property->id.'_'.$counter.'.'.$extension;
                $path = $file->storeAs('propertyPictures',$filename);   

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
    public function show($id)
    {
        $apartment = Apartment::find($id);
        $house = House::find($id);
        if(isset($apartment))
        {
             return View::make('apartment.show')
            ->with('apartment', $apartment);
        }
        if(isset($house))
        {
             return View::make('house.show')
            ->with('house', $apartment);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
