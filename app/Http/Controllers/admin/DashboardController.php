<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universitie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function adminprofile()
    {
        $admin= Universitie::where('id',Auth::user()->id)->first();
        return view('admin.auth.adminprofile',compact('admin'));
    }

    public function adminprofileupdate(Request $request)
    {
        $updateprofile=Universitie::where('id',Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'contact_no'=>$request->contact_no,
                'address'=>$request->address,
            ]);

        if ($updateprofile) {
            return response()->json('1');
        } else {
            return response()->json('0');
        }
    }

    public function changePassword()
    {
        return view('admin.auth.changepassword');
    }
    public function resetPassword(Request $request)
    {
            $request->validate([
                'oldpassword'=>'required',
                'newpassword'=>'required',
                'confirmpassword'=>'required|same:newpassword'
            ]);

           $adminData= Universitie::where('id',Auth::user()->id)->first();
           if(Hash::check($request->oldpassword, $adminData->password))
           {
               $newPass=bcrypt($request->newpassword);
               $update=Universitie::where('id',Auth::user()->id)->update(['password'=>$newPass]);
               if($update)
               {
                   Auth::guard('admin')->logout();
                   return redirect()->route('admin.logins')->with('success','Password Update Successfully...');
               }
           }
           else
           {
            return back()->with('danger','Old Password does not match');

           }

    }
}