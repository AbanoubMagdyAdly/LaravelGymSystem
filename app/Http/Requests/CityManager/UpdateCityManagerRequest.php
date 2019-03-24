<?php

namespace App\Http\Requests\CityManager;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateCityManagerRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,' .$this->id,
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
         'avatar_image.image'=>'Uploaded file is not a valid image. Only JPG and JPEG  files are allowed'
        ];
    }
}
