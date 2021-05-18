<?php

namespace App\Http\Controllers\Admin\Students;

use App\Models\Web_setting;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Model_has_role;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\Student_parent;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Episode_student;

class StudentSettingsController extends Controller
{
    public function index()
    {
        $data = Student::where('is_new', '!=', 'rejected')->orderBy('status', 'desc')->get();
        return view('admin.web_settings.students.students_settings', compact('data'));
    }
    public function store(Request $request){
        $data = $this->validate(\request(),
            [
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'first_name_ar' => 'required',
                'mid_name_ar' => 'required',
                'last_name_ar' => 'required',
                'gender' => 'required',
                'level_id' => 'required',
                'subject_id' => '',
                'subject_level_id' => '',
                'nationality' => 'required',
                'main_lang' => 'required',
                'qualification' => 'required',
                'country' => 'required',
                'email' => 'required|unique:teachers,email|unique:students,email|unique:users,email',
            ]);
        if($request['password'] != null  && $request['password_confirmation'] != null ){
            $data['password'] = bcrypt(request('password'));
            $data['first_name_en'] = $request->first_name_ar;
            $data['mid_name_en'] = $request->mid_name_ar;
            $data['last_name_en'] = $request->last_name_ar;
            if($request->epo_type == 'far_learn'){
                $data['epo_type'] = 'far_learn';
            }else if($request->epo_type == 'mogmaa_dorr') {
                if($request->gender == 'male'){
                    $data['epo_type'] = 'mogmaa';
                }else if($request->gender == 'female'){
                    $data['epo_type'] = 'dorr';
                }
            }
            $data['is_new'] = 'accepted';
            $data['interview'] = 'y';
            $data['parent_data'] = 'complete';
            $data['admin_view'] = '1';
            $data['admin_view'] = '1';
            $data['admin_view'] = '1';
            $data['is_verified'] = '1';
            $student = Student::create($data);
            Alert::success(trans('admin.add'), trans('s_admin.added_s'));
            return back();
        }
    }

    public function new_join()
    {
        $data = Student::where('admin_view', 0)->orderBy('id', 'asc')->get();
        if (count($data) == 0) {
            $data = Student::orderBy('id', 'asc')->get();
        }
        $input['admin_view'] = 1;
        Student::where('admin_view', 0)->update($input);
        return view('admin.web_settings.students.students_settings', compact('data'));
    }

    public function change_status($id)
    {
        $student = Student::find($id);
        if ($student->status == 'unactive') {
            $student->status = 'active';
            $student->save();
            Alert::success(trans('s_admin.activation'), trans('s_admin.actived_s'));
            return redirect()->back();
        } else {
            $student->status = 'unactive';
            $student->save();
            Alert::success(trans('s_admin.activation'), trans('s_admin.un_actived_s'));
            return redirect()->back();
        }
    }

    public function reject($id)
    {
        $student = Student::find($id);
        $student->is_new = 'rejected';
        if ($student->save()) {
            $email = $student->email;
            $settings = Web_setting::where('id',1)->first();
            $title = $settings->title_ar;
            Mail::raw('تم رفضك من قبل الادارة - بموقع  ' . $title  . '  رابط الموقع هنا :  ' . env('APP_URL'), function ($message) use ($email,$title)  {
                $message->subject($title);
                $message->from('far_learn@maqrah.info', 'online learning');
                $message->to($email);
            });
            Alert::success(trans('s_admin.join_orders'), trans('s_admin.rejected_s'));
            return redirect()->back();
        }
    }
    public function accept($id)
    {
        $student = Student::find($id);
        if ($student->is_verified == 1) {
            $student->is_new = 'accepted';
            if ($student->save()) {
                $email = $student->email;
                $settings = Web_setting::where('id',1)->first();
                $title = $settings->title_ar;
                Mail::raw('تم قبولك بموقع  ' . $title  . '  رابط الموقع هنا :  ' . env('APP_URL'), function ($message) use ($email,$title)  {
                    $message->subject($title);
                    $message->from('far_learn@maqrah.info', 'online learning');
                    $message->to($email);
                });
                Alert::success(trans('s_admin.join_orders'), trans('s_admin.accepted_s'));
                return redirect()->back();
            }

        } else {
            Alert::warning(trans('s_admin.warning'), trans('s_admin.he_not_verified_yet'));
            return redirect()->back();
        }
    }

    public function show($type)
    {
        $data = Student::where('epo_type', $type)->where('is_new', '!=', 'rejected')->orderBy('status', 'asc')->get();
        return view('admin.web_settings.students.students_settings', compact('data'));
    }

    public function details($type, $id)
    {
        $data = Student::findOrFail($id);
        $parent_data = Student_parent::where('student_id', $id)->first();
        return view('admin.web_settings.students.details', compact('data', 'parent_data'));
    }

    public function edit($type, $id)
    {
        $data = Student::find($id);
        return view('admin.web_settings.students.edit_student_subject', compact('data'));
    }

    public function update_subject_data(Request $request)
    {
        $subject_data['level_id'] = $request->level_id;
        $subject_data['subject_id'] = $request->subject_id;
        $subject_data['subject_level_id'] = $request->subject_level_id;
        $subject_data['interview'] = 'y';
        $subject_data['is_new'] = 'accepted';
        Student::where('id', $request->id)->update($subject_data);

        $student = Student::findOrFail($request->id);
        $email = $student->email;
        Mail::raw('تم قبول حسابك من جهه الادارة ....... تستطيع تسجيل الدخول للوحة التحكم الان .... ' . '  رابط الموقع هنا :  ' . env('APP_URL'), function ($message) use ($email) {
            $message->subject(trans('s_admin.title'));
            $message->from('far_learn@maqrah.info', 'online learning');
            $message->to($email);
        });
        Alert::success(trans('s_admin.subject'), trans('s_admin.subject_placed'));
        return redirect()->back();
    }

    public function place_episode(Request $request)
    {
        $data['student_id'] = $request->id;
        $data['episode_id'] = $request->episode_id;

        Episode_student::create($data);
        $student = Student::findOrFail($request->id);
        $email = $student->email;
        Mail::raw('تم أضافتك لحلقة جديدة ....... تستطيع تسجيل الدخول للوحة التحكم الان .... ' . '  رابط الموقع هنا :  ' . env('APP_URL'), function ($message) use ($email) {
            $message->subject(trans('s_admin.title'));
            $message->from('far_learn@maqrah.info', 'online learning');
            $message->to($email);
        });
        Alert::success(trans('s_admin.episode'), trans('s_admin.episode_placed'));
        return redirect()->back();
    }

    public function destroy_student_epo($id)
    {
        $epo = Episode_student::find($id);
        $epo->delete();
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return redirect()->back();
    }

    public function change_student_epo(Request $request)
    {
        $epo = Episode_student::find($request->stud_epo_id);
        $epo->episode_id = $request->episode_id;
        $epo->save();
        Alert::success(trans('s_admin.change_episode'), trans('s_admin.change_episode_s'));
        return redirect()->back();
    }
    public function change_student_epo_type($id){
        $student = Student::find($id);
        if($student->epo_type == 'far_learn' ){
            if($student->gender == 'male'){
                $student->epo_type = 'mogmaa';
            }else if($student->epo_type == 'female'){
                $student->epo_type = 'dorr';
            }
        }else if($student->epo_type == 'dorr' || $student->epo_type == 'mogmaa'){
            $student->epo_type = 'far_learn';
        }
        $student->save();
        Alert::success(trans('s_admin.change_epos_type'), trans('s_admin.change_epos_type_s'));
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $subject_data['level_id'] = $request->level_id;
        $subject_data['subject_id'] = $request->subject_id;
        $subject_data['subject_level_id'] = $request->subject_level_id;
        $subject_data['interview'] = 'y';
        Student::where('id', $request->id)->update($subject_data);
        Alert::success(trans('s_admin.edit'), trans('s_admin.updated_s'));
        return redirect()->back();
    }
}
