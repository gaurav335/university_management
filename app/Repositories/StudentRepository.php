<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\User;
use App\Models\Addmissions;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentMarks;
use App\Models\CommanSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DateTime;   

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
        $userid = StudentMarks::where('user_id',Auth::user()->id)->first();
        if($userid == null){
            return response()->json('3');
        }else{
            $studentmark = StudentMarks::with('comman_seting_data')->where('user_id', Auth::user()->id)->get();
            $merit = 0;
            $comtotal = 0;
            foreach ($studentmark as $marks) {
                if ($marks->obtain_mark != null) {
                    if (isset($marks->comman_seting_data['marks'])) {
                        $total = ($marks->obtain_mark * $marks->comman_seting_data['marks'] ?? 0) / 100;
                        $merit = $merit + $total;
                        $comtotal = $comtotal + $marks->comman_seting_data['marks'];
                    }
                } else {
                    return response()->json('3');
                }
            }
        }
        $firstmerit = round($merit / $comtotal * 100, 2);
        $admisionCode = generateStudentCode($data->id,strtoupper(substr($data->name,0,3)));
        $date = new DateTime();
        $colllege = (array)$data->college_id;
        $admissionForm=Addmissions::create([
            'user_id'=>Auth::user()->id,
            'merit'=>$firstmerit,
            'college_id'=>$colllege,
            'course_id'=>$data->id,
            'addmission_date'=>$date->format('Y-m-d'),
            'addmission_code'=>$admisionCode,
            'status'=>1,
        ]);
        if($admissionForm)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }
}