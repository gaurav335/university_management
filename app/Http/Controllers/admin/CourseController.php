<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\CourseDataTable;


class CourseController extends Controller
{
    public function courseIndex(CourseDataTable $coursedatatable)
    {
        return $coursedatatable->render('admin.course.courseindex');
    }
}
