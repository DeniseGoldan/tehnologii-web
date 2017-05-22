<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $rules = 
                [
                'title' => 'bail|required|min:5|max:100',
                'description' => 'bail|required|min:10|max:400',
                'numberOfRooms' => 'bail|required|integer|between:1,100',
                'surface' => 'bail|required|integer|between:1,10000',
                'price' => 'bail|required|integer|between:0,1000000000',
                'latitude' => 'bail|required|between:-85.05115,85',
                'longitude' => 'bail|required|between:-180, 180'
                ];
            
        $photos = count($this->input('images'));
        foreach(range(0, $photos) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,bmp,png|max:3096';
        }
 
        return $rules;
    }
}
