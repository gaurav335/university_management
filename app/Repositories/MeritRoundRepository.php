<?php

namespace App\Repositories;

use App\Interfaces\MeritRoundInterface;
use App\Models\MeritRound;


class MeritRoundRepository implements MeritRoundInterface
{
    public function addMeritround($data)
    {
        $countdate=MeritRound::where(['course_id'=>$data->course_id,'start_date'=>$data->start_date])->count();
        if($countdate>=1)
        {
            return response()->json('3');
        }
        $count=MeritRound::where(['round_no'=>$data->round_no,'course_id'=>$data->course_id])->count();
        if($count>=1)
        {
            return response()->json('2');
        }
        $addmeritround=MeritRound::create([
            'round_no'=>$data->round_no,
            'course_id'=>$data->course_id,
            'start_date'=>$data->start_date,
            'end_date'=>$data->end_date,
            'merit_result_declare_date'=>$data->merit_result_declare_date,
        ]);

        if($addmeritround)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function editMeritround($data)
    {
            $meritdata=MeritRound::where('id',$data->id)->first();
            return $meritdata;
    }

    public function updateMeritround($data)
    {
        $update=MeritRound::where('id',$data->id)->update([
            'start_date'=>$data->start_date,
            'end_date'=>$data->end_date,
            'merit_result_declare_date'=>$data->merit_result_declare_date
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

    public function deleteMeritround($data)
    {
        $deletemerit=MeritRound::where('id',$data->id)->delete();
        if($deletemerit)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function statusMeritround($data)
    {
        return statusChanges($data,'MeritRound');
    }
}