<?php

namespace App\Http\Controllers\Student;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Alkoumi\LaravelHijriDate\Hijri;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Models\Student;

class HomeController extends Controller
{

    public function sendEmail()
    {
        $credentials = ['email' => 'asd09505@gmail.com'];
        $response = Password::sendResetLink($credentials, function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    public function index()
    {
        if(auth::guard('student')->user()->complete_data == 0){
            $data = Student::where('id',auth::guard('student')->user()->id)->first();

            return view('student.profile.index',compact('data'));
        }else{
            return view('student.home');
        }

    }

    public function ChangePasswordStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'curr_pass' => 'required' ,
        ]);

        $pass = Student::find(Auth::guard('student')->id())->password;
        if(\Hash::check($request->curr_pass, $pass) ){
            $data =   Student::find(Auth::guard('student')->id());
            $data->password = \Hash::make($request->password);
            $data->save();
            Alert::success(trans('s_admin.success'), "تم تغيير كلمة المرور بنجاح ");

            return back()->with('message',trans('s_admin.pass_changed'));

        }else{
            Alert::error(trans('s_admin.error'),  "كلمة المرور الحالية غير صحيحة ");

            return back()->with('message','كلمة المرور الحالية غير صحيحة   ');
        }
    }
    public function profile()
    {
        $data = Student::where('id',auth::guard('student')->user()->id)->first();
        return view('student.profile.index',compact('data'));
    }
    public function change_pass()
    {
        $data = Student::where('id',auth::guard('student')->user()->id)->first();
        return view('student.profile.index',compact('data'));
    }
    public function update_profile(Request $request)
    {
        $input = $this->validate(\request(),
            [
                'qualification' => 'required',
                'first_name_ar' => 'required',
                'last_name_ar' => 'required',
                'country_code' => 'required',
                'nationality' => 'required',
                'mid_name_ar' => 'required',
                'ident_num' => 'required',
                'level_id' => 'required',
                'phone' => 'required',
                'district_id' => 'required',
                'image' => '',
                'subject_id' => '',
                'date_of_birth' => '',
                'save_quran_num' => '',
                'save_quran_limit' => '',
                'subject_level_id' => '',
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
            $file->move(public_path('uploads/students'), $fileNewName);
            $input['image'] = $fileNewName;
        }
        $student =  Student::where('id',auth::guard('student')->user()->id)->first();
        if($student->epo_type  != 'far_learn'){
            if($student->interview == 'y'){
                unset($input['save_quran_num']);
                unset($input['save_quran_limit']);
                unset($input['level_id']);
                unset($input['subject_id']);
                unset($input['subject_level_id']);
            }
        }
        $data = Student::where('id',auth::guard('student')->user()->id)->update($input);
        if($data > 0){
            $student->complete_data = '1';
            $student->save();
            if($student->epo_type != 'far_learn'){
                if($student->interview == 'y'){
                    Alert::warning(trans('s_admin.update'), trans('s_admin.updated_s'));
                    return redirect(url('/student/home'));
                }else{
                    Auth::logout();
                    Alert::warning(trans('s_admin.warning'), trans('s_admin.will_contact_with_u'));
                    return redirect(url('/'));
                }
            }
            Alert::success(trans('s_admin.personal_info'), trans('s_admin.proileupdated_s'));
            return redirect(route('student_home'));
        }else{

        }
        return view('student.profile.index',compact('data'));
    }

    public function logout(){
        $user = Auth::guard('student')->user();
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
