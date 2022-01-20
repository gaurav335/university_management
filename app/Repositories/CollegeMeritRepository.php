<?php

namespace App\Repositories;

use App\Interfaces\CollegeMeritInterface;
use App\Models\CollegeMerit;
use Illuminate\Support\Facades\Auth;
use App\Models\MeritRound;
use App\Models\Addmissions;
use App\Models\AddmissionConfimation;


class CollegeMeritRepository implements CollegeMeritInterface
{
    public function selectMeritRound($data)
    {
        return  MeritRound::where('course_id', $data->id)->where('status',1)->get();
    }

    public function addMeritRound($data)
    {
        $count=CollegeMerit::where(['course_id'=>$data->course_id,'merit_round_id'=>$data->merit_round_id,'college_id'=>Auth::user()->id])->count();
        if($count>=1)
        {
            return response()->json('2');
        }
        $addmeritround=CollegeMerit::create([
            'college_id'=>Auth::user()->id,
            'course_id'=>$data->course_id,
            'merit_round_id'=>$data->merit_round_id,
            'merit'=>$data->merit,
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

    public function editMeritRound($data)
    {
            $meritdata=CollegeMerit::where('id',$data->id)->first();
            return $meritdata;
    }

    public function updateMeritRound($data)
    {
        $update=CollegeMerit::where('id',$data->id)->update([
            'merit'=>$data->merit,
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

    public function deleteMeritRound($data)
    {
        $deletemerit=CollegeMerit::where('id',$data->id)->delete();
        if($deletemerit)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function roundDeclare($data)
    {
        $idArray = explode(',', $data->id);
        if($data->id == null)
        {
            return response()->json('2');
        }
        foreach ($idArray as $admissions) {
            $admission = Addmissions::where('id',$admissions)->first();
            AddmissionConfimation::create([
                'addmission_id' => $admission->id,
                'confirm_college_id' =>Auth::user()->id,
                'confirm_round_id' => $data->did,
                'confirm_merit' => $admission->merit,
                'status'=>2
            ]);
        }
       
            return response()->json('1');
    }
}
