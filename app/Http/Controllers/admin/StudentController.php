<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\StudentDataTable;

class StudentController extends Controller
{
    public function studentIndex(StudentDataTable $studentdatatable)
    {
        return $studentdatatable->render('admin.student.studentindex');
    }
}
