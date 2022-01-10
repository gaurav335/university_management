<?php

namespace App\Repositories;

use App\Interfaces\CollegeInterface;
use App\Models\College;
use Illuminate\Support\Facades\Hash;
use App\Mail\CollegeSendMail;
use Illuminate\Support\Facades\Mail;


class CollegeRepository implements CollegeInterface
{
    public function addCollege($data)
    {
        $logo = uploadFile($data->file('logo'),'college-logo');
        $addCollege=College::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'contact_no'=>$data->contact_no,
            'address'=>$data->address,
            'password'  => Hash::make($data['password']),
            'logo'=>$logo,
            'status' => true
        ]);

        Mail::to($data->email)->send(new CollegeSendMail($addCollege));


        if($addCollege)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function editCollege($data)
    {
            $collegedata=College::where('id',$data->id)->first();
            return $collegedata;
    }

    public function updateCollege($data)
    {
        $collegeupdate=College::where('id',$data->id)->first();
        if($data->file('logo')=='')
        {
            $logo=$collegeupdate->getRawOriginal('logo');
        }
        else {

            if (!empty($collegeupdate->logo)) {
                $logo_name = $collegeupdate->getRawOriginal('logo');

                if (file_exists(public_path('storage/college-logo/' . $logo_name))) {
                    @unlink(public_path('storage/college-logo/' . $logo_name));
                }
            }
            $logo=uploadFile($data->file('logo'),'college-logo');

        }

        $update=College::where('id',$data->id)->update([
            'name'=>$data->name,
            'email'=>$data->email,
            'contact_no'=>$data->contact_no,
            'address'=>$data->address,
            'logo'=>$logo,
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

    public function deleteCollege($data)
    {
        $deleteCollege=College::where('id',$data->id)->delete();
        if($deleteCollege)
        {
            return response()->json('1');
        }
        else
        {
            return response()->json('0');
        }
    }

    public function statusCollege($data)
    {
        return statusChanges($data,'College');
    }
}