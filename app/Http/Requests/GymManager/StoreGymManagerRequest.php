<?php

namespace App\Http\Requests\GymManager;

use Illuminate\Foundation\Http\FormRequest;

class StoreGymManagerRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|',
            'password_confirmation' => 'required|same:password',
            'avatar_image'=>'mimes:jpeg,jpg ',
        ];
    }

    public function messages()
    {
        return [
        'email.required' => 'Please Fill out This Field!',
        'name.required' => 'Please Fill out This Field!',
         'email.unique' => 'Sorry,This Email is already exist!',
         'email.email' => 'Please enter a valid Email',
         'password.required' => 'Please Fill out This Field!',
         'password.min' => 'Your password is too short',
         'password_confirmation.required' => 'Please Fill out This Field!',
         'password_confirmation.same' => 'Password confirmation does not match password!',
         'avatar_image.image'=>'Uploaded file is not a valid image. Only JPG and JPEG  files are allowed'
        ];
    }
}
