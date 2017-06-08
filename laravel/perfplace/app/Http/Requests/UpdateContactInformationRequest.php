<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateContactInformationRequest extends FormRequest
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
                'phone' => 'bail|required|min:10|max:25',
                'email' => 'bail|required|email|min:3|max:50',
                ];
        return $rules;
    }
}