<?php

namespace App\Http\Requests\Administrator\team;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
            'alt'=>['required', 'max:100'],
            'name'=>['required','max:100'],
            'job'=>['required','max:100'],
            'instagram'=>['required', 'max:200'],
            'facebook'=>['required', 'max:200'],
            'twitter'=>['required', 'max:200'],
            'linkedin'=>['required', 'max:200'],
        ];
    }
}
