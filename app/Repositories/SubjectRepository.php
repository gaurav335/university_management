<?php

namespace App\Repositories;

use App\Interfaces\SubjectInterface;
use App\Models\CommanSetting;
use App\Models\Subject;

class SubjectRepository implements SubjectInterface
{
    public function addSubject($data)
    {
        $addcourse=CommanSetting::create([
            'subject_id'=>$data->subject_id,
            'marks'=>$data->marks,
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

    public function editSubject($data)
    {
            $subdata=CommanSetting::where('id',$data->id)->first();
            return $subdata;
    }

    public function updateSubject($data)
    {
        $update=CommanSetting::where('id',$data->id)->update([
            'marks'=>$data->marks,
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

    public function deleteSubject($data)
    {
        $deletesubject=CommanSetting::where('id',$data->id)->delete();
        if($deletesubject)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function adminSubjectStatus($data)
    {
        return statusChanges($data,'Subject');
    }
}