<?php

namespace App\Http\Controllers\college;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeritRound;
use DateTime;
use App\Interfaces\CollegeMeritInterface;
use App\DataTables\college\StudentDataTable;
use App\DataTables\college\AdmissionRejectedDataTable;
use App\DataTables\college\AdmissionConfirmDataTable;

class StudentController extends Controller
{
    protected $student;

    public function __construct(CollegeMeritInterface $student)
    {
        $this->student = $student;
    }

    public function studentIndex(StudentDataTable $studentdatatable)
    {
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        $meritRound = MeritRound::where('status', '1')->where('merit_result_declare_date',$today)->first();
        return $studentdatatable->render('college.student.studentindex',compact('meritRound'));
    }

    public function roundDeclare(Request $request)
    {
        return $this->student->roundDeclare($request);
    }

    public function confirmAddmissionIndex(AdmissionConfirmDataTable $confirmDatatable)
    {
        return $confirmDatatable->render('college.addmission.confirmaddmission');
    }

    public function rejectedAddmissionIndex(AdmissionRejectedDataTable $rejctedDatatable)
    {
        return $rejctedDatatable->render('college.addmission.rejectedaddmission');
    }

    public function rejctedConfirmation(Request $request)
    {
        return $this->student->rejctedConfirmation($request);
    }
}
