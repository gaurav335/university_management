<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $length = strlen($this->adhaar_card_no);
        if ($length != 12 && $length != 16)
        {
            return $rules['adhaar_card_no'] = 'size:12';
        }
        return $rules = [
            'name' => 'required',
            'email'=>'required|unique:users,email,id,deleted_at,NULL',
            'contact_no' => 'required|min:10|max:15|unique:users,contact_no,id,deleted_at,NULL',
            'adhaar_card_no' => 'required|unique:users,adhaar_card_no,id,deleted_at,NULL',
            'gender' => 'required',
            'password'=>'required',
            'address' => 'required',
        ];
    }

    public function messages(){
        return [
            "adhaar_card_no.size" => "Please Valid Your Adhaar Card Number",
        ];
    }
}
