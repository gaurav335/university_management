<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\SubjectDataTable;
use App\Models\Subject;
use App\Interfaces\SubjectInterface;
use App\Http\Requests\SubjectMeriteRequest;

class SubjectController extends Controller
{
    protected $subject;

    public function __construct(SubjectInterface $subject)
    {
        $this->subject = $subject;
    }

    public function subjectIndex(SubjectDataTable $subjectdataTable)
    {
        $subject = Subject::all();
        return $subjectdataTable->render('admin.setting.subjectindex',compact('subject'));
    }

    public function addSubject(SubjectMeriteRequest $request)
    {
        return $this->subject->addSubject($request);
    }

    public function editSubject(Request $request)
    {
        return $this->subject->editSubject($request);
    }

    public function updateSubject(Request $request)
    {
        return $this->subject->updateSubject($request);
    }

    public function deleteSubject(Request $request)
    {
        return $this->subject->deleteSubject($request);
    }
}
