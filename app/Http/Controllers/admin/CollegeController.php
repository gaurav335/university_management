<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\CollegeDataTable;
use App\Interfaces\CollegeInterface;
use App\Http\Requests\CollegeRequest;

class CollegeController extends Controller
{
    protected $college;

    public function __construct(CollegeInterface $college)
    {
        $this->college = $college;
    }

    public function collegeIndex(CollegeDataTable $collegedatatable)
    {
        return $collegedatatable->render('admin.college.index');
    }

    public function addCollege(CollegeRequest $request)
    {
        return $this->college->addCollege($request);
    }

    public function editCollege(Request $request)
    {
        return $this->college->editCollege($request);
    }

    public function updateCollege(CollegeRequest $request)
    {
        return $this->college->updateCollege($request);
    }

    public function deleteCollege(Request $request)
    {
        return $this->college->deleteCollege($request);
    }

    public function statusCollege(Request $request)
    {
        return $this->college->statusCollege($request);
    }
}
