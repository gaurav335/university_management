<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentInterface;
use App\Models\Subject;
use App\Models\Course;
use App\Models\CollegeCourse;
use App\Models\Addmissions;
use App\Models\StudentMarks;
use App\Models\AddmissionConfimation;
use Illuminate\Support\Facades\Auth;
use DateTime;

class studentController extends Controller
{
    protected $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function marksheet(Request $request)
    {
        $subject = Subject::where('status',1)->get();
        $subjectmarks = StudentMarks::with('subjectid')->where('user_id',Auth::user()->id)->get();
        $userid = StudentMarks::where('user_id',Auth::user()->id)->first();
        $userMerit = Addmissions::where('user_id',Auth::user()->id)->first();
        return view("student.marksheet",compact('subject','subjectmarks','userid','userMerit'));
    }

    public function addStudentMarks(Request $request)
    {
        return $this->student->addStudentMarks($request);
    }

    public function updateStudentMarks(Request $request)
    {
        return $this->student->updateStudentMarks($request);
    }

    public function course(Request $request)
    {
        $course = Course::where('status',1)->get();
        return view("student.course",compact('course'));
    }

    public function admissionform(Request $request)
    {
        $college = CollegeCourse::with('collegeName')->where('course_id',$request->id)->get();
        $course = Course::where('id',$request->id)->first();
        $userid = Addmissions::where('user_id',Auth::user()->id)->get();
        $usercheckcourse = Addmissions::where('user_id',Auth::user()->id)->where('course_id',$request->id)->first();
        return view("student.admissionform",compact('college','course','userid','usercheckcourse'));
    }

    public function addAdminssionForm(Request $request)
    {
        return $this->student->addAdminssionForm($request);
    }

    public function myAddmission(Request $request)
    {
    
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        $userid = Addmissions::where('user_id',Auth::user()->id)->get();
        $addmissionconfirmation = [];
        foreach($userid as $user)
        {
            $addmission= AddmissionConfimation::with('roundDeclarationDate','admissionData','collegeName')->where('addmission_id',$user->id)->get();
            if($addmission)
            {
                $addmissionconfirmation[]=$addmission;
            }
            $userAddmissionConfirom= AddmissionConfimation::with('roundDeclarationDate','admissionData','collegeName')->where('status',1)->where('addmission_id',$user->id)->first();
        }
        return view("student.myadddmissiob",compact('addmissionconfirmation','today','userAddmissionConfirom'));
    }

    public function confirmAddmission(Request $request)
    {
        $add = Addmissions::where('id',$request->id)->update(['status' => $request->status]);
        $add = AddmissionConfimation::where('id',$request->acid)->update(['status' => $request->status,'confirmation_type'=>'M']);
        $addInfo = Addmissions::where('id',$request->id)->first();

        if($addInfo->status == "0")
        {
            return response()->json('0');
        } else {
            return response()->json('1');
        }
    }
}
