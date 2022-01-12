<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ColleUpdateProfileReuest extends FormRequest
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
        $id = Auth::user()->id;
        
            return [
                'name' => 'required',
                'email'=>'required|unique:colleges,email,'.$id.',id,deleted_at,NULL',
                'contact_no' => 'required|max:10|unique:colleges,contact_no,'.$id.',id,deleted_at,NULL',
                'address' => 'required',
            ];
    }
}
