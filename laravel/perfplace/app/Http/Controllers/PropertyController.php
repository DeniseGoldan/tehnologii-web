<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\House;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Apartment::all();
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
    public function store(Request $request)
    {

        $property = null;
        $fields = $request->get('propertyType',0);
        if(strcmp($fields,'apartment')==0){
            $property = new Apartment;
            $property->floorNumber = $request->floorNumber;
        }else{
            $property = new House;
            $property->numberOfFloors = $request->numberOfFloors;
        }
        $property->title = $request->title;
        $property->description = $request->description;
        $property->numberOfRooms = $request->numberOfRooms;
        $property->surface = $request->surface;
        $property->price = $request->price;
        $property->transactionType = $request->transactionType;
        $property->save();
        
        return redirect()->route('properties.index');

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
        //
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
