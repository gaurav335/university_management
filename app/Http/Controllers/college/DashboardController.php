<?php

namespace App\Http\Controllers\college;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ColleUpdateProfileReuest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('college.index');
    }

    public function profileUpdate()
    {
        $college= College::where('id',Auth::user()->id)->first();
        return view('college.auth.collegeprofile',compact('college'));
    }
    public function update(ColleUpdateProfileReuest $request)
    {
        if($request->file('logo')=="")
        {
            $logo=explode('college-logo/',Auth::user()->logo)[1];
        }
        else
        {
            $logo=uploadFile($request->file('logo'),'college-logo');
        }

        $update=College::where('id',Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'address'=>$request->address,
            'logo'=>$logo
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

    public function changePassword()
    {
        return view('college.auth.changepassword');
    }

    public function resetPassword(Request $request)
    {
        $collegeData = College::where('id', Auth::user()->id)->first();

        if (Hash::check($request->oldpassword, $collegeData->password)) {
            $new = bcrypt($request->newpassword);
            $update = College::where('id', Auth::user()->id)->update(['password' => $new]);
            if ($update) {
                Auth::guard('college')->logout();

                return redirect()->route('college.logins')->with('success', 'Password Update Successfully...');
            }
        } else {
            return back()->with('danger', 'Old Password does not match');
        }
    }
}
