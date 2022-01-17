<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentMarks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentRepository implements StudentInterface
{
    public function checkStudentEmail($data)
    {
        $email = User::where('email', $data->email)->first();
        if (!empty($email)) {
            return "false";
        } else {
            return "true";
        }        
    }

    public function checkStudentContactNo($data)
    {
        $contactno = User::where('contact_no', $data->contact_no)->first();
        if (!empty($contactno)) {
            return "false";
        } else {
            return "true";
        }        
    }

    public function studentRag($data)
    {
        $studentrag=User::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'contact_no'=>$data->contact_no,
            'address'=>$data->address,
            'dob'=>$data->dob,
            'gender'=>$data->gender,
            'adhaar_card_no'=>$data->adhaar_card_no,
            'password'  => Hash::make($data['password']),
        ]);

        if($studentrag)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function addStudentMarks($data)
    {
        $sub=count($data['subject']);
        $user=Auth::user()->id;
        for($i=0;$i<$sub;$i++)
        {
            $addstudentmarks = StudentMarks::create([
                'subject_id'=>$data['subject'][$i],
                'user_id'=>$user,
                'total_mark'=>'100',
                'obtain_mark'=>$data['obtain_mark'][$i],
            ]);
        }
                 
        if($addstudentmarks)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function updateStudentMarks($data)
    {
        $sub=count($data['id']);
        for($i=0;$i<$sub;$i++)
        {
            $updatestudentmarks = StudentMarks::where('id',$data['id'][$i])->update([
                'obtain_mark'=>$data['obtain_mark'][$i],
            ]);
        }
                 
        if($updatestudentmarks)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function addAdminssionForm($data)
    {

    }
}