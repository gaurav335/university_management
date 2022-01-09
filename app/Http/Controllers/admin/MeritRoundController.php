<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\Admin\MeritRoundDataTable;

class MeritRoundController extends Controller
{
    public function MeritroundIndex(MeritRoundDataTable $meritRounddataTable)
    {
        return $meritRounddataTable->render('admin.setting.meritroundindex');
    }
}
