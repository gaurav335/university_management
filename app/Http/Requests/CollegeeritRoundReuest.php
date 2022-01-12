<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeeritRoundReuest extends FormRequest
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
                'merit' => 'required',
            ];
        }else{
            return [
                'course_id' => 'required',
                'merit_round_id' => 'required',
                'merit' => 'required',
            ];
        }
    }
}
