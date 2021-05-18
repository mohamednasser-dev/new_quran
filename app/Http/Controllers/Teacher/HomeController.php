<?php

namespace App\Http\Controllers\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Alkoumi\LaravelHijriDate\Hijri;
use Illuminate\Http\Request;
use App\Models\Teacher;

class HomeController extends Controller
{

    public function index()
    {
        return view('teacher.home');
    }


    public function profile()
    {

        $data = Teacher::where('id',auth::guard('teacher')->user()->id)->first();
        return view('teacher.profile.index',compact('data'));
    }
    public function change_pass()
    {
        $data = Teacher::where('id',auth::guard('teacher')->user()->id)->first();
        return view('teacher.profile.index',compact('data'));
    }

    public function ChangePasswordTeacher(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'curr_pass' => 'required' ,
        ]);

        $pass = Teacher::find(Auth::guard('teacher')->id())->password;
        if(\Hash::check($request->curr_pass, $pass) ){
            $data =   Teacher::find(Auth::guard('teacher')->id());
            $data->password = \Hash::make($request->password);
            $data->save();
            Alert::success(trans('s_admin.success'), "تم تغيير كلمة المرور بنجاح ");

            return back()->with('message',trans('s_admin.pass_changed'));

        }else{
            Alert::error(trans('s_admin.error'),  "كلمة المرور الحالية غير صحيحة ");

            return back()->with('message','كلمة المرور الحالية غير صحيحة   ');
        }
    }
    public function update_profile(Request $request)
    {
        $input = $this->validate(\request(),
            [
                'first_name_ar' => 'required',
                'qualification' => 'required',
                'last_name_ar' => 'required',
                'country_code' => 'required',
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
        Teacher::where('id',auth::guard('teacher')->user()->id)->update($input);
        Alert::success(trans('s_admin.personal_info'), trans('s_admin.proileupdated_s'));
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        $user = Auth::guard('teacher')->user();
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
