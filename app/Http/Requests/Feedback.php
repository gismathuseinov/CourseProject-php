<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Feedback extends FormRequest
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
            'message_title' => ['required','string','max:40'],
            'email' => ['required','email','max:30'],
            'message_body' => ['required','string','max:100']
        ];
    }
    public function messages()
    {
        return [
            'message_title.required' => 'Message Title must be required',
            'message_title.string' => 'Message Title value only string',
            'message_title.max' => 'Message Title value max 40 symbol',

            'message_body.required' => 'Message body must be required',
            'message_body.string' => 'Message body value only string',
            'message_body.max' => 'Message body value max 100 symbol',

            'email.required' => 'Email must be required',
            'email.max' => 'Email value max 30 symbol',

        ];
    }
}
