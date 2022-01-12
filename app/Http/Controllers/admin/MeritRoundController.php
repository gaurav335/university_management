<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\MeritRoundDataTable;
use App\Interfaces\MeritRoundInterface;
use App\Http\Requests\MeritRoundRequest;
use App\Models\Course;

class MeritRoundController extends Controller
{
    protected $meritround;

    public function __construct(MeritRoundInterface $meritround)
    {
        $this->meritround = $meritround;
    }

    public function MeritroundIndex(MeritRoundDataTable $meritRounddataTable)
    {
        $cours = Course::where('status',1)->get();
        return $meritRounddataTable->render('admin.setting.meritroundindex',compact('cours'));
    }

    public function addMeritround(MeritRoundRequest $request)
    {
        return $this->meritround->addMeritround($request);
    }

    public function editMeritround(Request $request)
    {
        return $this->meritround->editMeritround($request);
    }

    public function updateMeritround(MeritRoundRequest $request)
    {
        return $this->meritround->updateMeritround($request);
    }

    public function deleteMeritround(Request $request)
    {
        return $this->meritround->deleteMeritround($request);
    }

    public function statusMeritround(Request $request)
    {
        return $this->meritround->statusMeritround($request);
    }

}
