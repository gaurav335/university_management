<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentInterface;
use App\Models\Subject;
use App\Models\Course;
use App\Models\CollegeCourse;
use App\Models\StudentMarks;
use Illuminate\Support\Facades\Auth;

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
        return view("student.marksheet",compact('subject','subjectmarks','userid'));
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
        return view("student.admissionform",compact('college'));
    }

    public function addAdminssionForm(Request $request)
    {
        return $this->student->addAdminssionForm($request);
    }
}
