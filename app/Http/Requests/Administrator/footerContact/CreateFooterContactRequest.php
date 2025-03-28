<?php

namespace App\Http\Requests\Administrator\footerContact;

use Illuminate\Foundation\Http\FormRequest;

class CreateFooterContactRequest extends FormRequest
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
            'address' => ['required', 'max:100'],
            'phone' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
        ];
    }
}
