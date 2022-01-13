<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\StudentInterface;

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

    public function studentRag(Request $request)
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
}
