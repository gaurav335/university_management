<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class RagistrtionController extends Controller
{

    protected $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function ragistration()
    {
        return view("student.ragistration");
    }

    public function studentRag(UserRequest $request)
    {
        return $this->student->studentRag($request);
    }

    public function checkStudentEmail(Request $request)
    {
        return $this->student->checkStudentEmail($request);
    }

    public function checkStudentContactNo(Request $request)
    {
        return $this->student->checkStudentContactNo($request);
    }

    public function profileUpdate()
    {
        $user= User::where('id',Auth::user()->id)->first();
        return view('student.userprofile',compact('user'));
    }

    public function update(UserProfileRequest $request)
    {
        $update=User::where('id',Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'dob'=>$request->dob,
            'adhaar_card_no'=>$request->adhaar_card_no,
            'gender'=>$request->gender,
            'address'=>$request->address,
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
        return view('student.changepassword');
    }

    public function resetPassword(Request $request)
    {
        $userData = User::where('id', Auth::user()->id)->first();

        if (Hash::check($request->oldpassword, $userData->password)) {
            $new = bcrypt($request->newpassword);
            $update = User::where('id', Auth::user()->id)->update(['password' => $new]);
            if ($update) {
                Auth::guard('web')->logout();

                return redirect()->route('logins')->with('success', 'Password Update Successfully...');
            }
        } else {
            return back()->with('danger', 'Old Password does not match');
        }
    }
}
