<?php

namespace App\Http\Controllers\college;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\college\CollegeCourseDataTable;
use App\Models\Course;
use App\Interfaces\CollegeCourseInterface;
use App\Http\Requests\CollegeCourseRequest;

class CollegeCourseController extends Controller
{
    protected $collegecourse;

    public function __construct(CollegeCourseInterface $collegecourse)
    {
        $this->collegecourse = $collegecourse;
    }

    public function collegecourseIndex(CollegeCourseDataTable $collegecourseDataTable)
    {
        $cours = Course::where('status',1)->get();
        return $collegecourseDataTable->render('college.collegecourse.collegecourseindex',compact('cours'));
    }

    public function addCollegeCourse(CollegeCourseRequest $request)
    {
        return $this->collegecourse->addCollegeCourse($request);
    }

    public function editCollegeCourse(Request $request)
    {
        return $this->collegecourse->editCollegeCourse($request);
    }

    public function updateCollegeCourse(CollegeCourseRequest $request)
    {
        return $this->collegecourse->updateCollegeCourse($request);
    }

    public function deleteCollegeCourse(Request $request)
    {
        return $this->collegecourse->deleteCollegeCourse($request);
    }
}
