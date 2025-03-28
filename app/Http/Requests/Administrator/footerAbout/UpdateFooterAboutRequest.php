<?php

namespace App\Http\Requests\Administrator\footerAbout;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterAboutRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:500'],
            'instagram' => ['required', 'max:200'],
            'facebook' => ['required', 'max:200'],
            'twitter' => ['required', 'max:200'],
        ];
    }
}
