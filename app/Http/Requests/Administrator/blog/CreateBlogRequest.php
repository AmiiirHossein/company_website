<?php

namespace App\Http\Requests\Administrator\blog;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
            'alt'=>['required', 'max:100'],
            'subject'=>['required', 'max:300'],
            'body'=>['required', 'max:3000'],
            'title'=>['required', 'max:200'],
            'description'=>['required', 'max:1000'],
            'keywords'=>['required', 'max:1000'],
        ];
    }
}
