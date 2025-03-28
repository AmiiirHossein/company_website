<?php

namespace App\Http\Requests\Administrator\TopHeader;

use Illuminate\Foundation\Http\FormRequest;

class CreateTopHeaderRequest extends FormRequest
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
            'email' => ['required', 'max:200'],
            'phone' => ['required', 'max:200'],
            'instagram' => ['required', 'max:200'],
            'facebook' => ['required', 'max:200'],
            'twitter' => ['required', 'max:200'],
        ];
    }
}
