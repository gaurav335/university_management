<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\CourseDataTable;
use App\Interfaces\CourseInterface;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    protected $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    public function courseIndex(CourseDataTable $coursedatatable)
    {
        return $coursedatatable->render('admin.course.courseindex');
    }

    public function addCourse(CourseRequest $request)
    {
        return $this->course->addCourse($request);
    }

    public function editCourse(Request $request)
    {
        return $this->course->editCourse($request);
    }

    public function updateCourse(CourseRequest $request)
    {
        return $this->course->updateCourse($request);
    }

    public function deleteCourse(Request $request)
    {
        return $this->course->deleteCourse($request);
    }

    public function statusCourse(Request $request)
    {
        return $this->course->statusCourse($request);
    }
}
