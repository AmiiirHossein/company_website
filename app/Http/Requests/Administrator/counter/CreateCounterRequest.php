<?php

namespace App\Http\Requests\Administrator\counter;

use Illuminate\Foundation\Http\FormRequest;

class CreateCounterRequest extends FormRequest
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
            'image' => ['required', 'image','mimes:jpg,png,jpeg', 'max:5000'],
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:100'],
        ];
    }
}
