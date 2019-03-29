<?php

namespace App\Http\Requests\Trainee;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:trainees',
            'password' => 'required|string|min:6|max:10|same:password_confirmation',
            'password_confirmation' => 'required|same:password',
            'image' => 'required',
            'gender' => 'required',
            'date_of_birth'=> 'required'
        ];
    }
}
