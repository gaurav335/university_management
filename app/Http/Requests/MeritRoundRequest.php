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
                'start_date'=>'required|unique:merit_rounds,start_date,'.$id.',id,deleted_at,NULL',
                'end_date'=>'required|unique:merit_rounds,end_date,'.$id.',id,deleted_at,NULL',
                'merit_result_declare_date'=>'required|unique:merit_rounds,merit_result_declare_date,'.$id.',id,deleted_at,NULL',
            ];
        }else{
            return [
                'start_date'=>'required|unique:merit_rounds,start_date,NULL,id,deleted_at,NULL',
                'end_date'=>'required|unique:merit_rounds,end_date,NULL,id,deleted_at,NULL',
                'merit_result_declare_date'=>'required|unique:merit_rounds,merit_result_declare_date,NULL,id,deleted_at,NULL',
            ];
        }
    }
}
