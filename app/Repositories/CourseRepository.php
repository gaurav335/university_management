<?php

namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;


class CourseRepository implements CourseInterface
{
    public function addCourse($data)
    {
        $addcourse=Course::create([
            'name'=>$data->name,
            'status' => 1
        ]);

        if($addcourse)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function editCourse($data)
    {
            $coursedata=Course::where('id',$data->id)->first();
            return $coursedata;
    }

    public function updateCourse($data)
    {
        $update=Course::where('id',$data->id)->update([
            'name'=>$data->name,
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

    public function deleteCourse($data)
    {
        $deleteCourse=Course::where('id',$data->id)->delete();
        if($deleteCourse)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function statusCourse($data)
    {
        return statusChanges($data,'Course');
    }
}