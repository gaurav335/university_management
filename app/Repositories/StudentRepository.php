<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
}