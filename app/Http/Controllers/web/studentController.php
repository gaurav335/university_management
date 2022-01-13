<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentInterface;
use App\Models\Subject;
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
}
