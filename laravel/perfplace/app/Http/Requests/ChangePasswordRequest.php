<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ChangePasswordRequest extends FormRequest
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
                'password' => 'required|same:password|min:8|max:255',
                'password_confirmation' => 'required|same:password'
                ];
        return $rules;
    }
}