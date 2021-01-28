<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];

        if(!empty($this->segment(2))){
            if(empty($this->password)){
                unset($rules['password']);
            }
        }
        return $rules;
    }
}
