<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class keystore extends FormRequest
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
            'key' => 'bail|required|unique:keys|max:30',
           // 'photo'=>'image|required'

        ];
    }
    public function messages()
    {
        return [
            'key.unique'=> __('messages.exisit'),
            'key.max'=> __('messages.longkey'),
        ];

    }
}
