<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\SubjectDataTable;


class SubjectController extends Controller
{
    public function subjectIndex(SubjectDataTable $subjectdataTable)
    {
        return $subjectdataTable->render('admin.setting.subjectindex');
    }
}
