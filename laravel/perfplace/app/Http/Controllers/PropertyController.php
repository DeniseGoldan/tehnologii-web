<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Validate Request

        // "bail" =  stop running validation rules on an attribute after the first validation failure
        $this->validate($request, array(
                'title' => 'bail|required|max:200',
                'description' => 'bail|required|max:400',
                'numberOfRooms' => 'min:1|max:100',
                'surface' => 'bail|required|min:0|max:1000',
                'price' => 'bail|required|min:0|max:1000000000',
                'latitude' => 'bail|required|min:-85.05115|max:85',
                'longitude' => 'bail|required|min:-180|max:180'
            ));

        // Save the property to the database
        $property = null;
        $fields = $request->get('propertyType');
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
        $property->transactionType = $request->get('transactionType');
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->save();

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
