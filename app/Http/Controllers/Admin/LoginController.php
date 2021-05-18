<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Student_parent;
use Carbon\Carbon;
use Alkoumi\LaravelHijriDate\Hijri;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class   LoginController extends Controller
{
    public function __construct()
    {
        if(\Auth::guard('web')->check()){
            return redirect('/home');
        }else if(\Auth::guard('teacher')->check()){
            return redirect('teacher/home');
        }else if(\Auth::guard('student')->check()){
            return redirect('student/home');
        }
    }
    public function login(Request $request){
        $remeber=Request('Remember')==1? true:false ;

        if(auth::guard('web')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) ){
            //Check if active user or not
            if(Auth::user()->status != 'active'){
                Auth::logout();
                session()->flash('danger', trans('admin.not_auth'));
                return redirect('login');
            }else{
                return redirect('/home');
            }
        }else{
            session()->flash('danger',trans('admin.invaldemailorpassword'));
          return redirect('login');
        }
    }

    public function login_both(Request $request){
        $remeber=Request('Remember')==1? true:false ;
        if(auth::guard('teacher')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) ){
            if(auth()->guard('teacher')->user()->is_verified == '0'){
                $email = auth()->guard('teacher')->user()->email ;
                Auth::guard('teacher')->logout();
                Alert::warning(trans('s_admin.warning'), trans('s_admin.you_should_active'));
                $person_type = 'teacher';
                return view('front.login.verify_email' ,compact('email','person_type'));
            }
            if(auth()->guard('teacher')->user()->is_new == 'y'){
                Auth::guard('teacher')->logout();
                Alert::warning(trans('s_admin.confirmation_acc'), trans('s_admin.you_not_accepted_yet'));
                return back();
            }
            if(auth()->guard('teacher')->user()->is_new == 'rejected'){
                Auth::guard('teacher')->logout();
                Alert::warning(trans('s_admin.confirmation_acc'), trans('s_admin.you_rejected'));
                return back();
            }
            //Check if active user or not
            if(auth()->guard('teacher')->user()->status != 'active'){
                Auth::guard('teacher')->logout();
                Alert::warning(trans('s_admin.activation'), trans('s_admin.you_not_active'));
                return back();
            }else{
                Alert::success(trans('admin.login_done'), trans('admin.hello'));
                return redirect('teacher/home');
            }
        }else if(auth::guard('student')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) ){
            if(auth()->guard('student')->user()->parent_data == 'not_complete'){
                $student_id = auth()->guard('student')->user()->id;
                Auth::guard('student')->logout();
                Alert::warning(trans('s_admin.warning'), trans('admin.you_should_complete_parent_data'));
                return redirect(url('/'.$student_id.'/student_parent'));
            }
            if(auth()->guard('student')->user()->is_verified == '0'){
                $email = auth()->guard('student')->user()->email ;
                Auth::guard('student')->logout();
                Alert::warning(trans('s_admin.warning'), trans('s_admin.you_should_active'));
                $person_type = 'student';
                return view('front.login.verify_email' ,compact('email','person_type'));
            }
            if(auth()->guard('student')->user()->complete_data == 1){
                if(auth()->guard('student')->user()->is_new == 'y'){
                    Auth::guard('student')->logout();
                    Alert::warning(trans('s_admin.confirmation_acc'), trans('s_admin.you_not_accepted_yet'));
                    return back();
                }
            }
            if(auth()->guard('student')->user()->is_new == 'rejected'){
                Auth::guard('student')->logout();
                Alert::warning(trans('s_admin.confirmation_acc'), trans('s_admin.you_rejected'));
                return back();
            }
            //Check if active user or not
            if(auth()->guard('student')->user()->status != 'active'){
                Auth::guard('student')->logout();
                Alert::warning(trans('s_admin.activation'), trans('s_admin.you_not_active'));
                return back();
            }else{
                Alert::success(trans('admin.login_done'), trans('admin.hello'));
                return redirect('student/home');
            }
        }else if(auth::guard('web')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) ){
            //Check if active user or not
            if(auth()->guard('web')->user()->status != 'active'){
                Auth::logout();
                Alert::error(trans('admin.login'), trans('s_admin.pass_email_wrong_title'));
                return back();
            }else{
                Alert::success(trans('admin.login_done'), trans('admin.hello'));
                return redirect('/home');
            }
        }else{
            Alert::error(trans('admin.not_auth2'), trans('admin.invaldemailorpassword'));
            return back();
        }
    }

    public function sign_up($type){
        $types = $type;
        return view('front.login.teacher_login' , compact('types'));
    }
    public function verify_email(){
        return view('front.login.verify_email');
    }
    public function teacher_verify_email(){
        return view('front.login.verify_email');
    }

    public function show_login(){
        return view('front.login');
    }
    public function store(Request $request , $type){
        $data = $this->validate(\request(),
            [
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'first_name_ar' => 'required',
                'mid_name_ar' => 'required',
                'last_name_ar' => 'required',
                'gender' => 'required',
                'email' => 'required|unique:teachers,email|unique:students,email|unique:users,email',
                'main_lang' => 'required',
                'date_of_birth' => 'required',
                'country' => 'required',
                'phone' => 'required',
                'qualification' => 'required',
                'nationality' => 'required',
                'country_code' => 'required',
            ]);
        if($request['password'] != null  && $request['password_confirmation'] != null ){
            $selected_date = $request->date_of_birth ;
            $year = \Carbon\Carbon::parse($selected_date)->format('Y');
            if ($year < 1900) {
                $year = \Carbon\Carbon::parse($selected_date)->format('Y');
                $month = \Carbon\Carbon::parse($selected_date)->format('m');
                $day = \Carbon\Carbon::parse($selected_date)->format('d');
                $date = Hijri::DateToGregorianFromDMY($day, $month, $year);
                $data['date_of_birth'] = $date;
            } else {
                $to_date = \Carbon\Carbon::parse($selected_date)->format('Y-m-d');
                $data['date_of_birth'] = $to_date;
            }



            //to git out children people
            $age = \Carbon\Carbon::parse($data['date_of_birth'])->age;
            if($age < 11){
                Alert::error(trans('s_admin.error'), trans('s_admin.you_are_less_than'));
                return back();
            }
            $data['password'] = bcrypt(request('password'));
            $data['first_name_en'] = $request->first_name_ar;
            $data['mid_name_en'] = $request->mid_name_ar;
            $data['last_name_en'] = $request->last_name_ar;
            $data['user_name'] = $request->first_name_ar ." ".$request->mid_name_ar." ".$request->last_name_ar;
            $code = rand(1000, 9999);
            if($type == 'teacher_far_learn' || $type == 'teacher_mogmaa_dorr'){
                if($type == 'teacher_far_learn'){
                    $data['epo_type'] = 'far_learn';
                }else if($type == 'teacher_mogmaa_dorr') {
                    if($request->gender == 'male'){
                        $data['epo_type'] = 'mogmaa';
                    }else if($request->gender == 'female'){
                        $data['epo_type'] = 'dorr';
                    }
                }
                $data['job_name'] = $request->job_name;
                $teacher = Teacher::create($data);
                $teacher->code = $code;
                if($teacher->save()){
                    $email = $request->email;
                    Mail::raw('your activation code is: ' . $code .'  رابط الموقع هنا :  '.env('APP_URL'), function ($message) use ($email) {
                        $message->subject(trans('s_admin.title'));
                        $message->from('far_learn@maqrah.info', 'online learning');
                        $message->to($email);
                    });
                }
            }else if($type == 'far_learn'){
                $data['epo_type'] = 'far_learn';
                $data['status'] = 'active';
                $data['is_new'] = 'y';
                $data['interview'] = 'y';
//                $data['level_id'] = $request->level_id;
                $student = Student::create($data);
                if($student->save()){
                    $age = \Carbon\Carbon::parse($data['date_of_birth'])->age;
                    if($age < 18){
                        $student->parent_data = 'not_complete';
                        $student->save();
                        return redirect(url('/'.$student->id.'/student_parent'));
                    }else{
                        $student->parent_data = 'complete';
                        $student->code = $code;
                        if($student->save()){
                            $email = $request->email;
                            Mail::raw('your activation code is: ' . $code .'  رابط الموقع هنا : '.env('APP_URL'), function ($message) use ($email) {
                                $message->subject(trans('s_admin.title'));
                                $message->from('far_learn@maqrah.info', 'online learning');
                                $message->to($email);
                            });
                        }
                    }
                }
            }else if($type == 'mogmaa_dorr'){
                if($request->gender == 'male'){
                    $data['epo_type'] = 'mogmaa';
                }else if($request->gender == 'female'){
                    $data['epo_type'] = 'dorr';
                }
                $data['status'] = 'active';
                $student = Student::create($data);
                $student->code = $code;
                if($student->save()){
                    $age = \Carbon\Carbon::parse($data['date_of_birth'])->age;
                    if($age < 18){
                        $student->parent_data = 'not_complete';
                        $student->save();
                        return redirect(url('/'.$student->id.'/student_parent'));
                    }
                    $email = $request->email;
                    Mail::raw('your activation code is: ' . $code .'  رابط الموقع هنا :  '.env('APP_URL') , function ($message) use ($email) {
                        $message->subject(trans('s_admin.title'));
                        $message->from('far_learn@maqrah.info', 'online learning');
                        $message->to($email);
                    });
                }
            }
            if($type == 'teacher_far_learn' || $type == 'teacher_mogmaa_dorr') {
                Alert::success(trans('admin.addedsuccess'), trans('s_admin.request_added'));
                $person_type = 'teacher';
//              return redirect(route('teacher_verify_email'));
                return view('front.login.verify_email' ,compact('email','person_type'));
            }else{
                Alert::success(trans('admin.addedsuccess'), trans('s_admin.see_email_verification'));
//              return redirect(route('verify_email'));
                $person_type = 'student';
                return view('front.login.verify_email' ,compact('email','person_type'));
            }
        }
    }

    public function student_parent($student_id){
        $selected_student_id = $student_id;
        return view('front.login.student_parent' ,compact('selected_student_id'));
    }
    public function store_parent(Request $request){
        $data = $this->validate(\request(),
            [
                'user_name' => 'required',
                'phone' => 'required',
                'home_phone' => 'required',
                'relation' => 'required',
                'address' => 'required',
                'student_id' => 'required'
            ]);
        $parent = Student_parent::create($data);
        $parent->save();
        if($parent->save()){
            $code = rand(1000, 9999);
            $student_data['code'] = $code;
            $student_data['parent_data'] = 'complete';
            Student::where('id',$request->student_id)->update($student_data);
            $stud = Student::find($request->student_id);
            $email = $stud->email;
            Mail::raw('رمز التحقق : ' . $code .'  رابط الموقع هنا :  '.env('APP_URL'), function ($message) use ($email) {
                $message->subject(trans('s_admin.title'));
                $message->from('far_learn@maqrah.info', 'online learning');
                $message->to($email);
            });
            Alert::success(trans('s_admin.warning'), trans('admin.user_create_success'));
//            return redirect(route('verify_email'));
            $person_type = 'student';
            return view('front.login.verify_email' ,compact('email','person_type'));
        }
    }
    public function verify_account(Request $request){
        $data = $this->validate(\request(),
            [
                'email' => 'required',
                'type' => 'required',
                'code' => 'required'
            ]);
        if($request->type == 'student') {
            $student = Student::where('email', $request->email)->where('code', $request->code)->first();
            if ($student != null) {
                $student->is_verified = '1';
                $student->code = null;
                $student->save();
                if ($student->epo_type == 'far_learn') {
                    Alert::success(trans('s_admin.warning'), trans('s_admin.activation_done_far_learn'));
                } else {
                    Alert::success(trans('s_admin.warning'), trans('s_admin.login_to_continue'));
                }
                return redirect('/');
            } else {
                Alert::error(trans('s_admin.warning'), trans('admin.wrong_code'));
                return back();
            }
        }else if($request->type == 'teacher'){
            $teacher = Teacher::where('email', $request->email)->where('code',$request->code)->first();
            if($teacher != null){
                $teacher->is_verified = '1';
                $teacher->code = null;
                $teacher->save();
                Alert::success(trans('s_admin.warning'), trans('admin.activation_done'));
                return redirect('/');
            }else{
                Alert::error(trans('s_admin.warning'), trans('admin.wrong_code'));
                return back();
            }
        }
    }
    public function resend_verify(Request $request){
        $type = $request->type;
        $email = $request->email;
        if($type == 'teacher'){
            $user = Teacher::where('email',$email)->first();
        }else if($type == 'student'){
            $user = Student::where('email',$email)->first();
        }
        if($user != null){
            if($user->is_verified == '0'){
                $code = rand(1000, 9999);
                $user->code = $code;
                if($user->save()){
                    Mail::raw('رمز التحقق : ' . $code .'  التوجه لموقع التعليم عن بعد  وتسجيل الدخول لكتابه رمز التحقق من الرابط : '.env('APP_URL'), function ($message) use ($email) {
                        $message->subject(trans('s_admin.title'));
                        $message->from('far_learn@maqrah.info', 'online learning');
                        $message->to($email);
                    });
                    Alert::success(trans('s_admin.resend'), trans('s_admin.resend_done'));
                    $person_type = $type;
                    return view('front.login.verify_email' ,compact('email','person_type'));
                }else{
                    Alert::error(trans('s_admin.error'), trans('s_admin.wrong'));
                    $person_type = $type;
                    return view('front.login.verify_email' ,compact('email','person_type'));
                }
            }else{
                Alert::warning(trans('s_admin.warning'), trans('s_admin.this_email_active'));
                $person_type = $type;
                return view('front.login.verify_email' ,compact('email','person_type'));
            }
        }else{
            Alert::error(trans('s_admin.error'), trans('admin.no_email_found'));
            $person_type = $type;
            return view('front.login.verify_email' ,compact('email','person_type'));
        }
    }


    public function Forgetpassword(){

        return view('front.login.forgetpassword');
    }

    public function logout(){
        $user = Auth::user();
        Auth::logout();
        return redirect('/');
    }

}
