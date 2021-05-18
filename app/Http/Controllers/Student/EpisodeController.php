<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Episode_section;
use App\Models\Episode_student;
use App\Models\Notification;
use App\Models\Plan\Plan_new;
use App\Models\Plan\Plan_revision;
use App\Models\Plan\Plan_tracomy;
use App\Models\Plan_episode_day;
use App\Models\Plan_section_degree;
use App\Models\Student;
use App\Models\Student_section_evaluation;
use App\Models\Subject;
use App\Models\Subject_evaluation;
use App\Models\Subject_level;
use App\Models\Teacher;
use App\Models\Teacher_rate;
use App\Rate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Episode;
use Carbon\Carbon;
use App\Models\Student_Questions_episode;
class EpisodeController extends Controller
{
    public function validationErrorsToString($errArray){
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value)
        {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }
    public function makeValidate($inputs, $rules){
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return $this->validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }

    public function create()
    {

    }

    public function Store_Student_Question_episode(Request $request){
        $student_id = Auth::guard('student')->id();
        $data = new Student_Questions_episode;
        $data->episode_id = $request->episode_id;
        $data->episode_course_id = $request->course_date_id;
        $data->from_surah_id = $request->from_surah_id;
        $data->from_num =$request->from_num;
        $data->to_surah_id = $request->to_surah_id;
        $data->to_num = $request->to_num;
        $data->student_id = $student_id ;
        if($data->save()){
            $last_student = Episode_student::where('episode_id',$request->episode_id)->orderBy('order_num','desc')->first();
            $stud_epo = Episode_student::where('student_id',$student_id)->where('episode_id',$request->episode_id)->first();
            $stud_epo->order_num = $last_student->order_num + 1 ;
            $stud_epo->save();
        }
      return  redirect('student/my_episodes/'.$request->episode_id);
    }

    public function show($id)
    {
        $data = Episode::where('deleted','0')->where('id',$id)->first();
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
        $section_data = Episode_section::where('epo_date',$today)->where('episode_id',$id)->first();

        if($section_data ==  null){
            Alert::alert(trans('s_admin.warning'), trans('s_admin.day_ended'));
            return redirect(route('student.my_episodes'));
        }
        $last_student = Episode_student::where('episode_id',$id)->orderBy('order_num','desc')->first();
        $stud_epo = Episode_student::where('student_id', auth()->guard('student')->user()->id)->where('episode_id',$id)->first();
        if($stud_epo->order_num == 0){
            $stud_epo->order_num = $last_student->order_num + 1 ;
            $stud_epo->save();
        }
        if($section_data->status == 'ended'){
            Alert::alert(trans('s_admin.warning'), trans('s_admin.epo_ended'));
            return redirect(route('student.my_episodes'));
        }
        return view('student.episodes.start_episode' ,compact('data','section_data') );
    }

    public function edit($id)
    {
        //
    }
    public function my_episodes()
    {
        $stud_id = auth::guard('student')->user()->id ;
        $update_data['readed'] = '1';
        Notification::where('student_id',$stud_id)->where('message_type','notify_start_epo')->orWhere('message_type','reject_epo_request')->where('readed','0')->update($update_data);
        $data = Episode_student::where('student_id',$stud_id)
            ->where('deleted','0')
            ->get();
        $update_epo_data['student_view'] = '1';
        Episode_student::where('student_id',$stud_id)
            ->where('student_view','0')
            ->update($update_epo_data);
        return view('student.episodes.my_episodes',compact('data'));
    }
    public function my_episode_degrees($id)
    {
        $sections = Episode_section::where('episode_id',$id)->select('id')->get()->toArray();
        $data = Plan_section_degree::where('student_id',auth::guard('student')->user()->id)
            ->wherein('section_id',$sections)
            ->orderBy('created_at','desc')
            ->get();
        return view('student.episodes.epo_degrees',compact('data'));
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function get_subjects(Request $request,$id)
    {
        $data = Subject::where('level_id',$id)->get();
        return view('student.profile.parts.subjects',compact('data'));
    }
    public function get_subject_levels(Request $request,$id)
    {
        $data = Subject_level::where('subject_id',$id)->get();
        return view('student.profile.parts.subject_levels',compact('data'));
    }
    public function make_rate(Request $request)
    {

        $student_id = auth()->guard('student')->user()->id ;
        $exists_rate = Teacher_rate::where('student_id',$student_id)->where('teacher_id',$request->teacher_id)->first();
        if($exists_rate == null){
            if($request->rating != null) {
                $data['student_id'] = $student_id;
                $data['teacher_id'] = $request->teacher_id;
                $data['rate'] = $request->rating;
                Teacher_rate::create($data);

                $total_rates = Teacher_rate::where('teacher_id',$request->teacher_id)->get();
                $sum_rates = $total_rates->sum('rate');
                $count_rates = count($total_rates);
                if($count_rates == 0){
                    $new_rate = 0 ;
                }else{
                    $new_rate = $sum_rates / $count_rates ;
                }

                $floatVal = floatval($new_rate);
                // If the parsing succeeded and the value is not equivalent to an int
                if($floatVal && intval($floatVal) != $floatVal){
                    $teacher_data['rate'] =  number_format((float)$new_rate, 1, '.', '');
                }else{
                    $teacher_data['rate'] = $new_rate ;
                }
                Teacher::where('id',$request->teacher_id)->update($teacher_data);

                Alert::success(trans('s_admin.rating'), trans('s_admin.rate_s'));
                return back();
            }else{
                Alert::error(trans('s_admin.not_rated'), trans('s_admin.should_select_Star'));
                return back();
            }
        }else{
            Alert::error(trans('s_admin.not_rated'), trans('s_admin.rate_exists'));
            return back();
        }
    }
    public function destroy($id)
    {

    }
}
