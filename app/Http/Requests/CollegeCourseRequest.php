<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeCourseRequest extends FormRequest
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
                'reserved_seat' => 'required',
                'merit_seat' => 'required',
            ];
        }else{
            return [
                'course_id' => 'required',
                'reserved_seat' => 'required',
                'merit_seat' => 'required',
            ];
        }
    }
}
