<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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

            'title' => 'required',
            'status' => 'required',


        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'image.required' => 'Please upload photo or music or video!',
            'status.required' => 'Please fill out status!',


        ];
    }
}
