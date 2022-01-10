<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
        $id = $this->id;
        if($this->id != Null){
            return [
                'name' => 'required',
                'email'=>'required|unique:colleges,email,'.$id.',id,deleted_at,NULL',
                'contact_no' => 'required|min:10|max:15',
                'address' => 'required',
                'logo' => 'required',
            ];
        }else{
            return [
                'name' => 'required',
                'email'=>'required|unique:colleges,email,NULL,id,deleted_at,NULL',
                'password' => 'required|min:6',
                'contact_no' => 'required|min:10|max:15',
                'address' => 'required',
                'logo' => 'required',
            ];
        }
    }
}
