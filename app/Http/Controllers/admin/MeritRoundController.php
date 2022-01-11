<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\MeritRoundDataTable;
use App\Interfaces\MeritRoundInterface;
use App\Http\Requests\MeritRoundRequest;

class MeritRoundController extends Controller
{
    protected $meritround;

    public function __construct(MeritRoundInterface $meritround)
    {
        $this->meritround = $meritround;
    }

    public function MeritroundIndex(MeritRoundDataTable $meritRounddataTable)
    {
        return $meritRounddataTable->render('admin.setting.meritroundindex');
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

}
