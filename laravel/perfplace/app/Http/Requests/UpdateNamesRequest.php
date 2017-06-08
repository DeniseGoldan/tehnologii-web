<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateNamesRequest extends FormRequest
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
        // "bail" =  stop running validation rules on an attribute after the first validation failure
        $rules = 
                [
                'username' => 'bail|required|min:3|max:50',
                'firstName' => 'bail|required|min:3|max:50',
                'lastName' => 'bail|required|min:3|max:50'
                ];
        return $rules;
    }
}