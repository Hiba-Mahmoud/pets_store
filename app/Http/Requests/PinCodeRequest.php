<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PinCodeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'pin_code' => 'required|string|max:4|min:4|regex:/^[0-9]+$/'
        ];
    }
}