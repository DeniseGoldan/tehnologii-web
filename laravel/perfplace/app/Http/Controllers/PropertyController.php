<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\UploadRequest;
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
                'title' => 'bail|required|min:5|max:100',
                'description' => 'bail|required|min:10|max:400',
                'numberOfRooms' => 'bail|required|integer|between:1,100',
                'surface' => 'bail|required|integer|between:1,10000',
                'price' => 'bail|required|integer|between:0,1000000000',
                'latitude' => 'bail|required|between:-85.05115,85',
                'longitude' => 'bail|required|between:-180, 180'
            ));

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
        echo "<pre>";
       // var_dump($request);
        echo "</pre>";
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $counter=0;
            foreach($files as $file){
                $counter++;
                // $extension = $file->getClientOriginalExtension();
                $filename=$property->id.'_'.$counter;
                $path = $file->storeAs('propertyPictures',$filename);

                var_dump($path);
            }
        }

        /*
        if (!empty($product['images'])) {
            $product['images'] = $picture;
        } else {
            unset($product['images']);
        }
        */
        
         Session::flash('success','The new property has been succesfully saved!');

        //////////////////////////////
       //return redirect('userProperties');

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
