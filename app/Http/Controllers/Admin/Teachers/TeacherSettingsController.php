<?php
namespace App\Http\Controllers\Admin\Teachers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Alkoumi\LaravelHijriDate\Hijri;
use App\Models\Student_parent;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class TeacherSettingsController extends Controller{
    public function index(){
        $data = Teacher::where('is_new','!=','rejected')->orderBy('id','desc')->get();
        return view('admin.web_settings.teachers.teachers_settings' ,compact('data'));
    }
    public function new_join(){
        $data = Teacher::where('is_new','y')->orderBy('id','asc')->get();
        return view('admin.web_settings.teachers.teachers_settings' ,compact('data'));
    }
    public function change_status($id){
        $teacher = Teacher::find($id);
        if($teacher->status == 'unactive'){
            $teacher->status = 'active';
            $teacher->save();
            Alert::success(trans('s_admin.activation'), trans('s_admin.actived_s'));
            return redirect()->back();
        }else{
            $teacher->status = 'unactive';
            $teacher->save();
            Alert::success(trans('s_admin.activation'), trans('s_admin.un_actived_s'));
            return redirect()->back();
        }
    }
    public function reject($id){
        $teacher = Teacher::find($id);
        $teacher->is_new = 'rejected';
        $teacher->save();
        Alert::success(trans('s_admin.join_orders'), trans('s_admin.rejected_s'));
        return redirect()->back();
    }
    public function accept($id){
        $teacher = Teacher::find($id);
        $teacher->is_new = 'accepted';
        $teacher->save();
        Alert::success(trans('s_admin.join_orders'), trans('s_admin.accepted_s'));
        return redirect()->back();
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
            $data['is_verified'] = '1';
            $teacher = Teacher::create($data);
            Alert::success(trans('admin.add'), trans('s_admin.added_s'));
            return back();
        }
    }
    public function edit($id)
    {
        $data = Teacher::findOrFail($id);
        return view('admin.web_settings.teachers.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        $input = $this->validate(\request(),
            [
                'first_name_ar' => 'required',
                'qualification' => 'required',
                'last_name_ar' => 'required',
                'mid_name_ar' => 'required',
                'nationality' => 'required',
                'ident_num' => 'required',
                'phone' => 'required',
                'date_of_birth' => '',
                'save_quran_num' => '',
                'main_lang' => '',
                'i_pan' => '',
                'bio_ar' => '',
                'bio_en' => '',
                'image' => '',
            ]);
        $input['first_name_en'] = $request->first_name_ar;
        $input['mid_name_en'] = $request->mid_name_ar;
        $input['last_name_en'] = $request->last_name_ar;
        $data['user_name'] = $request->first_name_ar ." ".$request->mid_name_ar." ".$request->last_name_ar;

        $selected_date = $request->date_of_birth ;
        $year = \Carbon\Carbon::parse($selected_date)->format('Y');
        if ($year < 1900) {
            $year = \Carbon\Carbon::parse($selected_date)->format('Y');
            $month = \Carbon\Carbon::parse($selected_date)->format('m');
            $day = \Carbon\Carbon::parse($selected_date)->format('d');
            $date = Hijri::DateToGregorianFromDMY($day, $month, $year);
            $input['date_of_birth'] = $date;
        } else {
            $to_date = \Carbon\Carbon::parse($selected_date)->format('Y-m-d');
            $input['date_of_birth'] = $to_date;
        }
        if($request->image != null){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/teachers'), $fileNewName);
            $input['image'] = $fileNewName;
        }
        if( $request->password != null && $request->password_confirmation != null ){
            if($request->password == $request->password_confirmation ){
                $input['password'] =  \Hash::make($request->password);
                Alert::success(trans('s_admin.success'), "تم تغيير كلمة المرور بنجاح ");
            }else{
                Alert::error(trans('s_admin.error'),  "لا يوجد تطابق بين كلمه المرور وتأكيد كلمه المرور");
                return back();
            }
        }
        Teacher::where('id',$id)->update($input);
        Alert::success(trans('s_admin.personal_info'), trans('s_admin.proileupdated_s'));
        return back();
    }

    public function details( $id)
    {
        $data = Student::findOrFail($id);
        $parent_data = Student_parent::where('student_id', $id)->first();
        return view('teacher.episode.student_details', compact('data', 'parent_data'));
    }

    public function study_teachers()
    {
        $data = Teacher::where('member',1)->get();
        return view('admin.web_settings.teachers.teachers_settings', compact('data'));
    }

    public function make_member( $id)
    {
        $data = Teacher::findOrFail($id);
        if($data->member == 0){
            $data->member = 1;
        }else{
            $data->member = 0;
        }
        $data->save();
        Alert::success(trans('s_admin.success'), trans('admin.statuschanged'));
        return back();
    }
}
