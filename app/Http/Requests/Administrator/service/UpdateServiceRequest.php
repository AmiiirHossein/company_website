<?php

namespace App\Http\Requests\Administrator\service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'image'=> 'mimes:jpeg,jpg,png,gif,webp|max:1000',
            'alt' => ['required', 'max:100'],
            'service_title_one'=> ['required', 'max:100'],
            'service_desc_one'=> ['required', 'max:300'],
            'link_one'=> ['required', 'max:200'],
            'service_title_two'=> ['required', 'max:100'],
            'service_desc_two'=> ['required', 'max:300'],
            'link_two'=> ['required', 'max:200'],
            'service_title_three'=> ['required', 'max:100'],
            'service_desc_three'=> ['required', 'max:300'],
            'link_three'=> ['required', 'max:200'],
        ];
    }
}
