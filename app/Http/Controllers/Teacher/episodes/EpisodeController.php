<?php

namespace App\Http\Controllers\Teacher\episodes;

use App\Http\Controllers\Controller;
use App\Models\Admin_notification;
use App\Models\Episode_course_days;
use App\Models\Episode_restart_request;
use App\Models\Episode_section;
use App\Models\Episode_student;
use App\Models\Episode_teacher;
use App\Models\Notification;
use App\Models\Plan_section_degree;
use App\Models\Student;
use App\Models\Student_parent;
use App\Models\Student_section_evaluation;
use App\Models\Subject_evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Episode;
use Carbon\Carbon;

class EpisodeController extends Controller
{
    public function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }

    public function makeValidate($inputs, $rules)
    {
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return $this->validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }

    public function index()
    {
        $teacher_id = auth::guard('teacher')->user()->id ;
        $update_data['readed'] = '1';
        Notification::where('teacher_id',$teacher_id)->where('message_type','notify_start_epo')->where('readed','0')->update($update_data);

        $data = Episode::where('teacher_id', $teacher_id)->where('deleted', '0')->get();
        $additional_episodes = Episode_teacher::where('teacher_id', $teacher_id)->get();
        return view('teacher.episodes.index', compact('data','additional_episodes'));
    }
    public function new_epo()
    {
        $teacher_id = auth::guard('teacher')->user()->id ;
        $data = Episode::where('teacher_id', auth()->guard('teacher')->user()->id)->where('teacher_view',0)->where('deleted', '0')->get();
        $input['teacher_view'] = 1;
        Episode::where('teacher_id', auth()->guard('teacher')->user()->id)->where('teacher_view',0)->where('deleted', '0')->update($input);
        $additional_episodes = Episode_teacher::where('teacher_id', $teacher_id)->get();
        return view('teacher.episodes.index', compact('data','additional_episodes'));
    }

    public function zoom($id)
    {
        $data = Episode::whereId($id)->first();
        return view('teacher.episodes.zoom',compact('data'));
    }
    public function zoom_meeting()
    {
        return view('teacher.episodes.meeting');
    }
    public function epo_students($epo_id)
    {
        $data = Episode::where('episode_id', $epo_id)->first();
        return view('teacher.episodes.epo_students', compact('data'));
    }
    public function epo_student_degrees($stud_id,$epo_id)
    {
        $sections = Episode_section::where('episode_id',$epo_id)->select('id')->get()->toArray();
        $data = Plan_section_degree::where('student_id',$stud_id)
            ->wherein('section_id',$sections)
            ->orderBy('created_at','desc')
            ->get();
        return view('teacher.episodes.student_degrees',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function make_come(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input, [
            'student_id' => 'required',
            'section_id' => 'required'
        ]);
        if (!is_array($validate)) {
            $degree_exists = Plan_section_degree::where('student_id',$request->student_id)->where('type','absence')->where('section_id',$request->section_id)->first();
            if($degree_exists == null){
                $input['type'] = 'absence';
                $input['degree'] = 'absence';
                $degree_created = Plan_section_degree::create($input);
                if ($degree_created != null) {
                    return response(['status' => false, 'msg' => trans('s_admin.absence_done')]);
                } else {
                    return response(['status' => false, 'msg' => trans('s_admin.absence_not')]);
                }
            }else{
                $degree_exists->delete();
                return response(['status' => true, 'msg' => trans('s_admin.absence_removed')]);
            }
        } else {
            return response(['status' => false, 'msg' => $validate]);
        }
    }

    public function restart_episode(Request $request)
    {
        $teacher_id = auth::guard('teacher')->user()->id ;
        $input = $request->all();
        $validate = $this->makeValidate($input, [
            'section_id' => 'required',
        ]);
        if (!is_array($validate)) {
            $exist = Episode_restart_request::where('section_id',$request->section_id)->where('teacher_id',$teacher_id)->first();
            if($exist == null){
                $data['teacher_id'] = $teacher_id ;
                $data['section_id'] = $request->section_id ;
                Episode_restart_request::create($data);
                Alert::success(trans('s_admin.request_s'), trans('s_admin.wait_admin_to_approve'));
                return back();
            }else{
                Alert::warning(trans('s_admin.warning'), trans('s_admin.request_exist'));
                return back();
            }

        }
    }

    public function make_link_all(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input, [
            'section_id' => 'required'
        ]);
        if (!is_array($validate)) {
            $section = Episode_section::findOrFail($request->section_id);
            if($section != null){
                if($section->link_all == 1){
                    $section->link_all = 0;
                }else{
                    $section->link_all = 1;
                }
                if ($section->save()) {
                    return response(['status' => true, 'msg' => trans('s_admin.change_episode_s')]);
                }
            }
        } else {
            return response(['status' => false, 'msg' => $validate]);
        }
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input, [
            'episode_id' => 'required',
            'epo_link' => 'required'
        ]);
        if (!is_array($validate)) {
            $data['episode_id'] = $request->episode_id;
            $data['epo_link'] = $request->epo_link;

            $mytime = Carbon::now();
            $today = Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
            $data['epo_date'] = $today;
            $data['status'] = 'started';
            $data['start_time'] =$mytime ;
            $new_section = Episode_section::create($data);
            if ($new_section != null) {

                $data_start['order_num'] = 0 ;
                $data_start['finish'] = 0 ;
                Episode_student::where('episode_id',$request->episode_id)->update($data_start);

                Alert::success(trans('s_admin.added'), trans('s_admin.new_epo_started'));
                return back();
            } else {
                Alert::error(trans('s_admin.added'), trans('s_admin.not_started'));
                return back();
            }
        } else {
            Alert::error(trans('s_admin.added'), $validate);
            return back();
        }
    }

    public function end_epo(Request $request)
    {
        $teacher_id = auth::guard('teacher')->user()->id ;
        $mytime = Carbon::now();
        $today = Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');

        $epo_section = Episode_section::findOrFail($request->section_id);

        $epo_section->end_time = $mytime;
        $epo_section->status = 'ended';
        if($epo_section->save()){

            $s_date = date('Y-m-d', strtotime($epo_section->start_time));

            $s_Time = $epo_section->Episode->time_to;
            $epo_basic_end = $s_date . ' ' . $s_Time;
            $final_epo_basic_end = date("Y-m-d H:i", strtotime($epo_basic_end));
            $final_end_carbon = Carbon::createFromFormat('Y-m-d H:i', $final_epo_basic_end);

            $end_after_fifteen = $final_end_carbon->subMinute(15);

            if($end_after_fifteen < $mytime){
                $data['teacher_id'] = $teacher_id ;
                $data['episode_id'] = $epo_section->episode_id ;
                $data['section_id'] = $request->section_id ;
                $data['type'] = 'teacher' ;
                $data['message_type'] = 'long_episode' ;
                $data['title_ar'] = 'أمتدت الحلقة';
                $data['title_en'] = 'episode Stretched';
                $data['message_ar'] = 'ان الحلقة ' .  $epo_section->Episode->name_ar  . ' أمتدت من ' .$final_epo_basic_end . ' الى' .$mytime;
                $data['message_en'] = 'episode ' .  $epo_section->Episode->name_ar  . ' Stretched from ' .$final_epo_basic_end . ' to ' .$mytime;
                Admin_notification::create($data);
            }

            //reset student sorting
            $data_start['order_num'] = 0 ;
            $data_start['finish'] = 0 ;
            Episode_student::where('episode_id',$epo_section->episode_id)->update($data_start);

            $abs_Count = Plan_section_degree::where('section_id',$request->section_id)->where('type','absence')->get()->count();
            $attens_count = count($epo_section->Episode->Students) - $abs_Count ;
            $input['come_num'] = $attens_count;
            Episode_section::where('id',$request->section_id)->update($input);
            Alert::success(trans('s_admin.added'), trans('s_admin.new_epo_ended'));
            return redirect(route('t_episodes.index'));
        }
    }


    public function show($id)
    {
        $data = Episode::where('deleted', '0')->where('id', $id)->first();
        $mytime = Carbon::now();
        $today = Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
        $section_data = Episode_section::where('epo_date', $today)->where('episode_id', $id)->first();

        $course_data = Episode_course_days::where('episode_id', $data->id)->where('date', $today)->first();
        if($course_data ==  null){
            Alert::alert(trans('s_admin.warning'), trans('s_admin.day_ended'));
            return redirect(route('t_episodes.index'));
        }
        if($section_data != null) {
            if ($section_data->status == 'ended') {
                Alert::alert(trans('s_admin.warning'), trans('s_admin.epo_ended'));
                return redirect(route('t_episodes.index'));
            }
        }
        return view('teacher.episodes.start_episode', compact('data', 'section_data'));
    }
    public function next_turn($section_id)
    {
        $epo_sec = Episode_section::find($section_id);
        $epo_sec->order_num = $epo_sec->order_num + 1 ;
        $epo_sec->save();
        Alert::success(trans('s_admin.next_turn'), trans('s_admin.next_turn_s'));
        return back();
    }


    public function edit_link(Request $request)
    {
        $epo_sec = Episode_section::find($request->section_id);
        $epo_sec->epo_link = $request->epo_link ;
        $epo_sec->save();
        Alert::success(trans('s_admin.episode_link'), trans('s_admin.updated_s'));
        return back();
    }

    public function update_link($id)
    {
        $data = Episode_section::where('id', $id)->first();
        $data->epo_link = 'new_link';
        $data->save();
        return view('teacher.episodes.start_episode', compact('data', 'section_data'));
    }


    public function get_student_info($id,$episode_id)
    {
        $data = Student::findOrFail($id);
        $parent_data = Student_parent::where('student_id', $id)->first();

        return view('teacher.episodes.student_details', compact('data', 'parent_data','episode_id'));
    }

    public function give_degree(Request $request)
    {
        $data['student_id'] = $request->student_id;
        $data['plan_id'] = $request->plan_id;
        $data['section_id'] = $request->section_id;
        $data['errors_num'] = $request->total;
        $data['plan_type'] = $request->type;
        if ($request->type == 'new') {
            $subject_evaluate = Subject_evaluation::where('subject_id', $request->subject_id)->where('type', 'daily')->first();
        }elseif ($request->type == 'tracomy'){
            $subject_evaluate = Subject_evaluation::where('subject_id', $request->subject_id)->where('type', 'tracomy')->first();
        }elseif ($request->type == 'revision'){
            $subject_evaluate = Subject_evaluation::where('subject_id', $request->subject_id)->where('type', 'tracomy')->first();
        }
        if($subject_evaluate != null) {
            if ($request->total == $subject_evaluate->excellent) {
                $data['degree'] = 'excellent';
            }else if ($request->total == $subject_evaluate->very_good) {
                $data['degree'] = 'very_good';
            }else if ($request->total == $subject_evaluate->good) {
                $data['degree'] = 'good';
            }else if ($request->total >= $subject_evaluate->not_pathing) {
                $data['degree'] = 'not_pathing';
            }else if ($request->total == 0) {
                $data['degree'] = 'excellent';
            }
        }else{
            Alert::alert(trans('s_admin.evaluate_daily'), trans('s_admin.admin_should_make_eva'));
        }

        $exist_abs = Plan_section_degree::where('student_id',$request->student_id)->where('section_id',$request->section_id)->where('type','absence')->first();
        if($exist_abs == null) {
            $student = Plan_section_degree::create($data);
            if ($student != null) {
                $updated_data['status'] = 'ended';
                Student_section_evaluation::where('section_id', $request->section_id)->where('student_id', $request->student_id)->where('status', 'new')->update($updated_data);
                Alert::success(trans('admin.add'), trans('s_admin.evaluated_s'));
            }
        }else{
            Alert::alert(trans('s_admin.absence'), trans('s_admin.this_stud_absence'));
        }
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function make_evaluate(Request $request)
    {
        $exist_abs = Plan_section_degree::where('student_id',$request->student_id)->where('section_id',$request->section_id)->where('type','absence')->first();
        if($exist_abs == null) {
            $result = null ;
            foreach ($request->error_types as $key => $error_type){
                if($request->quantitys[$key] > 0){
                    $data['student_id'] = $request->student_id ;
                    $data['section_id'] = $request->section_id ;
                    $data['errors'] = $request->quantitys[$key] ;
                    $data['errortype_id'] = $error_type ;
                    $result = Student_section_evaluation::create($data);
                }
            }

            if ($result != null) {
                Alert::success(trans('admin.add'), trans('s_admin.added_s'));
            }else{
                Alert::error(trans('s_admin.not_added'), trans('s_admin.no_evaluate_to_add'));
            }
            return back();
        }else{
            Alert::alert(trans('s_admin.absence'), trans('s_admin.this_stud_absence_now'));
            return back();
        }
    }

    public function make_far_learn_evaluate(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'student_id' => 'required',
                'section_id' => 'required',
                'plan_id' => 'required',
                'degree' => 'required'
            ]);

        $exist_abs = Plan_section_degree::where('student_id',$request->student_id)->where('section_id',$request->section_id)->where('type','ask')->first();
        if($exist_abs == null) {
            if($request->plan_id == 0){
                Alert::error(trans('s_admin.not_evaluated'), trans('s_admin.this_stud_no_question'));
                return back();
            }
            $data['student_id'] = $request->student_id;
            $data['section_id'] = $request->section_id;
            $data['plan_id'] = $request->plan_id;
            $data['degree'] = $request->degree;
            $data['errors_num'] = 0;
            $data['type'] = 'ask';
            $result = Plan_section_degree::create($data);
            if ($result != null) {
                Alert::success(trans('admin.add'), trans('s_admin.added_s'));
            }
            return back();
        }else{
            Alert::error(trans('s_admin.not_evaluated'), trans('s_admin.this_student_evaluate_before'));
            return back();
        }
    }

    public function blank_page()
    {
        return view('teacher.episodes.blank_page');
    }

    public function delete_evaluate($id)
    {
        Student_section_evaluation::where('id',$id)->delete();
        Alert::success(trans('admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }

}
