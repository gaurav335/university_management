<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\StudentDataTable;
use App\DataTables\Admin\AddmissionDataTable;
use App\Models\User;
use App\Models\College;
use App\Models\Course;
use App\Models\Addmissions;

class StudentController extends Controller
{
    public function studentIndex(StudentDataTable $studentdatatable)
    {
        return $studentdatatable->render('admin.student.studentindex');
    }

    public function studentView(Request $request)
    {
        $id = decryptString($request->id);
        $student = User::where('id',$id)->first();
        $addmisssion = Addmissions::where('user_id',$id)->get();
        foreach($addmisssion as $add)
        {
            $college = College::whereIn('id',$add->college_id)->get();
        }
        $course = Course::where('id',$add->course_id)->get();
        return view('admin.student.studentview',compact('student','addmisssion','college','course'));
    }

    public function addmissionIndex(AddmissionDataTable $addmissiondatatable)
    {
        return $addmissiondatatable->render('admin.student.addmissionindex');
    }
}
