<?php
namespace App\Http\Controllers\Admin\web_settings;
use App\Models\Student;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Model_has_role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web_setting;
use App\Models\Slider;

class Web_SettingsController extends Controller{

    public function index(){
        $data = Web_setting::findOrFail(1);
        return view('admin.web_settings.index' ,compact('data'));
	}
	public function teacher_settings(){
        $data = Teacher::orderBy('status','desc')->get();
        return view('admin.web_settings.teachers_settings' ,compact('data'));
	}
	public function student_settings(){
        $data = Student::orderBy('status','desc')->get();
        return view('admin.web_settings.students_settings' ,compact('data'));
	}
	public function join_orders_rejected(){
        $teacher_data = Teacher::where('is_new','rejected')->orderBy('id','desc')->paginate(15);
        $student_data = Student::where('is_new','rejected')->orderBy('id','desc')->paginate(15);
        return view('admin.web_settings.reject_join_orders' ,compact('teacher_data','student_data'));
	}
	public function update(Request $request , $id){

        $data = $this->validate(\request(),
            [
                'title_ar' => 'required',
                'title_en' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address_ar' => 'required',
                'address_en' => 'required',
                'facebook' => 'required',
                'twiter' => 'required',
                'youtube' => 'required',
                'insta' => 'required',
                'linked_in' => 'required',
                'color' => 'required',
            ]);
        if($request->logo_ar != null){
            $file = $request->file('logo_ar');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/logo'), $fileNewName);
            $data['logo_ar'] = $fileNewName;
        }
        if($request->logo_en != null){
            $file = $request->file('logo_en');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/logo'), $fileNewName);
            $data['logo_en'] = $fileNewName;
        }
        if($request->admin_logo_ar != null){
            $file = $request->file('admin_logo_ar');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/logo'), $fileNewName);
            $data['admin_logo_ar'] = $fileNewName;
        }
        if($request->admin_logo_en != null){
            $file = $request->file('admin_logo_en');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/logo'), $fileNewName);
            $data['admin_logo_en'] = $fileNewName;
        }
        $user = Web_setting::findOrFail($id)->update($data);
        Alert::success(trans('admin.update'), trans('admin.updatSuccess'));
        return back();
    }


}
