<?php

namespace App\Http\Controllers\Admin\Reports\Data;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Episode;
use App\Models\Episode_day;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MogmaaController extends Controller
{
    public function index()
    {
        return view('admin.reports.data.mogmaa');
    }
}
