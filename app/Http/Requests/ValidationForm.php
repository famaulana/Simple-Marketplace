<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationForm extends FormRequest
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
            'mobile_number' => 'required|min:7|max:12|regex:/(["0"]["8"]["1"][0-9])\w+/',
            'value' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'mobile_number.regex' => 'First character must "081"',
        ];
    }
}
