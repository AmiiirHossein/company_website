<?php

namespace App\Http\Requests\Administrator\footerService;

use Illuminate\Foundation\Http\FormRequest;

class CreateFooterServiceRequest extends FormRequest
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
            'image'=> ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5000'],
            'alt'=> ['required', 'max:100'],
            'title'=>['required', 'max:100'],
            'link'=>['required', 'max:200'],
            'author'=>['required', 'max:100']
        ];
    }
}
