<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeritRoundRequest extends FormRequest
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
                'start_date'=>'required',
                'end_date'=>'required',
                'merit_result_declare_date'=>'required',
            ];
        }else{
            return [
                'round_no'=>'required',
                'course_id'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
                'merit_result_declare_date'=>'required',
            ];
        }
    }
}
