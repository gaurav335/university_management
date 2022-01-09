<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\CollegeDataTable;

class CollegeController extends Controller
{
    public function collegeIndex(CollegeDataTable $collegedatatable)
    {
        return $collegedatatable->render('admin.college.index');
    }
}
