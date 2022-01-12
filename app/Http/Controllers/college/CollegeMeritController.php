<?php

namespace App\Http\Controllers\college;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CollegeMeritInterface;
use App\DataTables\college\CollegeMeritDataTable;
use App\Models\Course;
use App\Http\Requests\CollegeeritRoundReuest;
use App\Models\MeritRound;

class CollegeMeritController extends Controller
{
    protected $collegemerit;

    public function __construct(CollegeMeritInterface $collegemerit)
    {
        $this->collegemerit = $collegemerit;
    }

    public function collegemeritIndex(CollegeMeritDataTable $collegemeritdatatable)
    {
        $cours = Course::where('status',1)->get();
        $merit = MeritRound::where('status',1)->get();
        return $collegemeritdatatable->render('college.collegemerit.collegemeritindex',compact('cours','merit'));
    }

    public function selectMeritRound(Request $request)
    {
        return $this->collegemerit->selectMeritRound($request);
    }

    public function addMeritRound(CollegeeritRoundReuest $request)
    {
        return $this->collegemerit->addMeritRound($request);
    }

    public function editMeritRound(Request $request)
    {
        return $this->collegemerit->editMeritRound($request);
    }

    public function updateMeritRound(CollegeeritRoundReuest $request)
    {
        return $this->collegemerit->updateMeritRound($request);
    }

    public function deleteMeritRound(Request $request)
    {
        return $this->collegemerit->deleteMeritRound($request);
    }
}
