<?php

namespace App\Http\Controllers\Admin\Mails;

use App\Models\Admin_notification;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Episode;

class EpisodeMailController extends Controller
{
    public function long_episodes()
    {
        $data = Admin_notification::where('message_type','long_episode')->orderBy('created_at','desc')->get();
        $new_Data['readed'] = '1';
        Admin_notification::where('message_type','long_episode')->where('readed','0')->orderBy('created_at','desc')->update($new_Data);
        return view('admin.Mails.index', compact('data'));
    }
}
