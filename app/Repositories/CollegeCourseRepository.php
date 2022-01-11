<?php

namespace App\Repositories;

use App\Interfaces\CollegeCourseInterface;
use App\Models\CollegeCourse;
use Illuminate\Support\Facades\Auth;

class CollegeCourseRepository implements CollegeCourseInterface
{
    public function addCollegeCourse($data)
    {
        $addcollegecourse=CollegeCourse::updateOrCreate(['course_id'=>$data->course_id],[
            'college_id'=>Auth::user()->id,
            'course_id'=>$data->course_id,
            'reserved_seat'=>$data->reserved_seat,
            'merit_seat'=>$data->merit_seat,
            'seat_no'=>$data->reserved_seat + $data->merit_seat,
        ]);

        if($addcollegecourse)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function editCollegeCourse($data)
    {
            $collegecoursedata=CollegeCourse::where('id',$data->id)->first();
            return $collegecoursedata;
    }

    public function updateCollegeCourse($data)
    {
        $update=CollegeCourse::where('id',$data->id)->update([
            'course_id'=>$data->course_id,
            'reserved_seat'=>$data->reserved_seat,
            'merit_seat'=>$data->merit_seat,
            'seat_no'=>$data->reserved_seat + $data->merit_seat,
        ]);

        if($update)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function deleteCollegeCourse($data)
    {
        $deleteCollegecourse=CollegeCourse::where('id',$data->id)->delete();
        if($deleteCollegecourse)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }
}