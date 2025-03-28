<?php

namespace App\Http\Requests\Administrator\faq;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
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
            'title'=> ['required','max:100'],
            'description' => ['required', 'max:1000'],
            'faq_one' => ['required', 'max:100'],
            'faq_desc_one' => ['required', 'max:1000'],
            'faq_two' => ['required', 'max:100'],
            'faq_desc_two' => ['required', 'max:1000'],
            'faq_three' => ['required', 'max:100'],
            'faq_desc_three' => ['required', 'max:1000'],
        ];
    }
}
