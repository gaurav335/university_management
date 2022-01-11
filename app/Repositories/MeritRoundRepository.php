<?php

namespace App\Repositories;

use App\Interfaces\MeritRoundInterface;
use App\Models\MeritRound;


class MeritRoundRepository implements MeritRoundInterface
{
    public function addMeritround($data)
    {
        $addmeritround=MeritRound::create([
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
}