<?php
namespace App\Http\Controllers\Front;
use App\Models\Episode;
use App\Models\Subject_level;
use App\Models\Teacher;
use Spatie\Permission\Models\Model_has_role;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class EpisodesController extends Controller{

    public function show($type){
        if($type == 'door' || $type == 'mogmaa'){
            $data = Episode::where('active','y')->where('teacher_id' ,'!=', null)->where('type',$type)->where('deleted','0')->paginate(8);
        }else if($type == 'all'){
            $data = Episode::where('active','y')->where('teacher_id' ,'!=', null)->where('deleted','0')->paginate(8);
        }else{
            $data = Episode::where('active','y')->where('teacher_id' ,'!=', null)->where('type','mqraa')->where('gender',$type)->where('deleted','0')->paginate(8);
        }
        return view('front.episodes.index',compact('data','type'));
    }
    public function search(Request $request){
        $type = $request->type;
        $result = Episode::query();
        $result = $result->where('active','y')->where('deleted','0')->where('teacher_id','!=',null);

        if($request->teacher_name  != null){
            $teacher_ids = Teacher::where('first_name_ar', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('user_name', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('mid_name_ar', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('last_name_ar', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('first_name_en', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('mid_name_en', 'like', '%' . $request->teacher_name . '%')
                                ->orWhere('last_name_en', 'like', '%' . $request->teacher_name . '%')->pluck('id')->toArray();
        $result = $result->whereIn('teacher_id', $teacher_ids);
        }
        if($request->epo_type  != null){
            if ($request->epo_type != 'on') {
                $result = $result->where('type', $request->epo_type);
            }
        }
        if ($request->gender != 'on') {
            $result = $result->where('gender', $request->gender);
        }
        if ($request->level_id != 'on') {
            $result = $result->where('level_id', $request->level_id);
        }
        if ($request->cost != 'on') {
            $result = $result->where('cost', $request->cost);
        }
        $search_query = $result;
        $data = $result->paginate(8);
        Alert::success(trans('s_admin.episodes'), trans('s_admin.search_done'));
        return view('front.episodes.index',compact('data','search_query','type'));
    }

    public function get_subject_levels(Request $request,$id)
    {
        $data = Subject_level::where('subject_id',$id)->get();
        return view('front.login.parts.subject_levels',compact('data'));
    }
    public function teacher_details(Request $request,$id)
    {
        $data = Teacher::where('id',$id)->first();
        return view('front.episodes.teacher_details',compact('data'));
    }
}
