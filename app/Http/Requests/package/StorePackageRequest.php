<?php

namespace App\Http\Requests\package;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name' => 'required',//unique validation
            'price' => 'required|min:1000|numeric',
            'capacity'=>'required|min:4|numeric',
        ];

    }
    // public function message()
    // {
    //     return[
    //         'name.required'=>'name reopp',
    //     ];
    // }
}
