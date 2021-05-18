<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\District;
use App\Models\Job_name;
use App\Models\Nationality;
use App\Models\Qualification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SignUpController extends Controller
{
    /**
qualification
     */
    public function qualification_index()
    {
        $data = Qualification::where('deleted','0')->orderBy('id','desc')->get();
        return view('admin.settings.sign_up.qualification', compact('data'));
    }
    public function qualification_store(Request $request)
    {
        $input = $request->all();
        Qualification::create($input);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }
    public function qualification_update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        Qualification::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }
    public function qualification_delete(Request $request,$id)
    {
        $input['deleted'] = '1';
        Qualification::where('id',$id)->update($input);
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }

    /**
    nationality
     */
    public function nationality_index()
    {
        $data = Nationality::where('deleted','0')->orderBy('id','desc')->get();
        return view('admin.settings.sign_up.nationality', compact('data'));
    }
    public function nationality_store(Request $request)
    {
        $input = $request->all();
        Nationality::create($input);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }
    public function nationality_update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        Nationality::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }
    public function nationality_delete(Request $request,$id)
    {
        $input['deleted'] = '1';
        Nationality::where('id',$id)->update($input);
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }

    /**
    job_names
     */
    public function job_name_index()
    {
        $data = Job_name::where('deleted','0')->orderBy('id','desc')->get();
        return view('admin.settings.sign_up.job_name', compact('data'));
    }
    public function job_name_store(Request $request)
    {
        $input = $request->all();
        Job_name::create($input);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }
    public function job_name_update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        Job_name::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }
    public function job_name_delete(Request $request,$id)
    {
        $input['deleted'] = '1';
        Job_name::where('id',$id)->update($input);
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }

    /**
    country
     */
    public function country_index()
    {
        $data = Country::where('deleted','0')->orderBy('id','desc')->get();
        return view('admin.settings.sign_up.country', compact('data'));
    }
    public function country_store(Request $request)
    {
        $input = $request->all();
        Country::create($input);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }
    public function country_update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        Country::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }
    public function country_delete(Request $request,$id)
    {
        $input['deleted'] = '1';
        Country::where('id',$id)->update($input);
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }

    //for district crud
    public function district_index()
    {
        $data = District::where('deleted','0')->orderBy('id','desc')->get();
        return view('admin.settings.sign_up.district', compact('data'));
    }
    public function district_store(Request $request)
    {
        $input = $request->all();
        District::create($input);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }
    public function district_update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        District::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }
    public function district_delete(Request $request,$id)
    {
        $input['deleted'] = '1';
        District::where('id',$id)->update($input);
        Alert::success(trans('s_admin.delete'), trans('s_admin.deleted_s'));
        return back();
    }
}
