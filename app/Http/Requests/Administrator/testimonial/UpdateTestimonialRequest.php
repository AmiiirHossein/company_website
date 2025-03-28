<?php

namespace App\Http\Requests\Administrator\testimonial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:5000'],
            'alt' => ['required', 'max:100'],
            'name'=> ['required', 'max:100'],
            'job' => ['required', 'max:100'],
            'description' => ['required', 'max:1000'],
        ];
    }
}
