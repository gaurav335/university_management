<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universitie;
use Illuminate\Support\Facades\Auth;



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
}
