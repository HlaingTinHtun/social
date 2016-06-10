<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        return [


            'name' => 'required|string',
            'image'=>'required',
            'email' => 'required|email',
            'password' => 'required|'


            //
        ];
    }
        public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'image.required'=>'Image is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',


        ];
    }

}
