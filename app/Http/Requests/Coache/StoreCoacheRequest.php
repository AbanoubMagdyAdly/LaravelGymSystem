<?php

namespace App\Http\Requests\Coache;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoacheRequest extends FormRequest
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
                'email'=>'required|unique:coaches|email',
                'gender'=>'required|',
                'date_of_birth'=>'required',
          
        ];
    }
    public function messages()
    {
        return [
        'email.required' => 'Please Fill out This email!',
        'name.required' => 'Please Fill out This name!',
         'email.unique' => 'Sorry,This Email is already exist!',
         'email.email' => 'Please enter a valid Email',
         'gender.required' => 'Please Fill out This gender!',
         
         'date_of_birth.required' => 'Please Fill out This date of birth!',
        ];
    }
}
