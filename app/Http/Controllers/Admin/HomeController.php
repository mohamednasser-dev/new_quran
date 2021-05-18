<?php
namespace App\Http\Controllers\Admin;
use App\Models\Episode;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Model_has_role;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class HomeController extends Controller{

    public function index()
    {
        $year = Carbon::now()->year ;
        // For admin users Total paper Chart11
        $students = Student::where('is_new','accepted')->where('is_verified','1')->where('complete_data','1')->get()->count();
        $teachers = Teacher::where('is_new','accepted')->where('is_verified','1')->get()->count();
        $students_numbers = json_encode($students);
        $teachers_numbers = json_encode($teachers);

        $accepted_students = Student::where('is_new','accepted')->where('is_verified','1')->where('complete_data','1')->get()->count();
        $rejected_students = Student::where('is_new','rejected')->get()->count();
        $acc_students_numbers = json_encode($accepted_students);
        $rej_students_numbers = json_encode($rejected_students);

        $episode_names[0] = trans('s_admin.student_number') ;
        $episode_names[1] = trans('s_admin.teachers_number') ;
        $people_names = json_encode($episode_names);

        $episode_names_rejected[0] = trans('s_admin.accepteds') ;
        $episode_names_rejected[1] = trans('s_admin.rejecteds') ;
        $episode_names_rejected = json_encode($episode_names_rejected);


        // For admin users Total paper Chart12 -------------------------------------------------------------------------------------
        $mqraa_epo = Episode::where('deleted','0')->where('type','mqraa')->get()->count();
        $mogmaa_epo = Episode::where('deleted','0')->where('type','mogmaa')->get()->count();
        $dorr_epo = Episode::where('deleted','0')->where('type','dorr')->get()->count();

        $mqraa_epo = json_encode($mqraa_epo);
        $mogmaa_epo = json_encode($mogmaa_epo);
        $dorr_epo = json_encode($dorr_epo);

        $episode_names[0] = trans('s_admin.episode_mqraa') ;
        $episode_names[1] = trans('s_admin.mogmaa_epos') ;
        $episode_names[2] = trans('s_admin.nav_dorr_epo') ;
        $episode_mqraa_name = json_encode($episode_names);

        //for admin chart5
            //students
                $students_by_month = Student::where('is_new','accepted')->where('interview','y')->where('is_verified','1')->where('complete_data','1')->whereYear('created_at',$year)
                    ->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                ->groupby('year','month')
                ->get();
                $student_arr[0] = "";
                $student_arr[1] = "";
                $student_arr[2] = "";
                $student_arr[3] = "";
                $student_arr[4] = "";
                $student_arr[5] = "";
                $student_arr[6] = "";
                $student_arr[7] = "";
                $student_arr[8] = "";
                $student_arr[9] = "";
                $student_arr[10] = "";
                $student_arr[11] = "";
                $student_arr[12] = "";

                foreach ($students_by_month as $key => $row) {
                    $student_month_count[$key] = $row->data;
//                    $months[$key] = date('F', strtotime($row->month)) ;
                    $months[$key] = $row->month ;
                    $years[$key] = $row->year;
                    $new_month = $row->month - 1 ;
                    $student_arr[$new_month] = $row->data ;
                }

                $teacher_arr[0] = "";
                $teacher_arr[1] = "";
                $teacher_arr[2] = "";
                $teacher_arr[3] = "";
                $teacher_arr[4] = "";
                $teacher_arr[5] = "";
                $teacher_arr[6] = "";
                $teacher_arr[7] = "";
                $teacher_arr[8] = "";
                $teacher_arr[9] = "";
                $teacher_arr[10] = "";
                $teacher_arr[11] = "";
                $teacher_arr[12] = "";
            //teachers
                $teachers_by_month = Teacher::where('is_new','accepted')->where('is_verified','1')->whereYear('created_at',$year)
                    ->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
                    ->groupby('year','month')
                    ->get();
                foreach ($teachers_by_month as $key => $row) {
                    $teachers_month_count[$key] = $row->data;
//                    $student_row = $student_month_count[$key] ;
                    $new_month = $row->month - 1 ;
                    $teacher_arr[$new_month] = $row->data ;
                }
                $student_month_count = json_encode($student_month_count);
                $teachers_month_count = json_encode($teachers_month_count);
                $months = json_encode($months);
                $years = json_encode($years);
                $student_arr = json_encode($student_arr);
                $teacher_arr = json_encode($teacher_arr);


        return view('admin.home',compact('year','rej_students_numbers','acc_students_numbers','episode_names_rejected','student_arr','teacher_arr','teachers_month_count','years','months','student_month_count','people_names','students_numbers','teachers_numbers','mqraa_epo','mogmaa_epo','dorr_epo','episode_mqraa_name'));
    }

    public function profile()
    {
        $data = User::where('id',auth()->user()->id)->first();
        return view('admin.profile.index',compact('data'));
    }


    public function store_profile(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'name' => 'required',
                'phone' => ''
            ]);
        if ($request['image'] != null)
        {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('/elrwda/uploads/certifications'), $fileNewName);
            $data['image'] = $fileNewName;
        }else{
            $data['image'] = 'default_cert.png';
        }
        $data['phone'] = $request->phone;
        User::where('id',auth()->user()->id)->update($data);
        Alert::success(trans('s_admin.personal_info'), trans('s_admin.proileupdated_s'));
        return back();
    }

    public function update_pass(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'curr_pass' => 'required' ,
        ]);
        $pass = User::find(auth()->user()->id)->password;
        if(\Hash::check($request->curr_pass, $pass) ){
            $data =   User::find(auth()->user()->id);
            $data->password = \Hash::make($request->password);
            $data->save();
            Alert::success(trans('s_admin.success'), "تم تغيير كلمة المرور بنجاح ");
            return back()->with('message',trans('s_admin.pass_changed'));
        }else{
            Alert::error(trans('s_admin.error'),  "كلمة المرور الحالية غير صحيحة ");
            return back()->with('message','كلمة المرور الحالية غير صحيحة   ');
        }
    }

}
