<?php

namespace App\Http\Controllers\Admin\episodes;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Exception;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subject::where('deleted','0')->orderBy('id','asc')->get();
        return view('admin.episodes.levels.subjects.index' ,compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'amount_num' => 'required',
                'level_id' => 'required',
            ]);
        Subject::create($data);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Subject::where('level_id',$id)->where('deleted','0')->orderBy('id','asc')->get();
        return view('admin.episodes.levels.subjects.index' ,compact('data','id') );
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
    public function update(Request $request)
    {
        $input['name_ar'] = $request->name_ar;
        $input['name_en'] = $request->name_en;
        $input['amount_num'] = $request->amount_num;
        Subject::where('id',$request->id)->update($input);
        Alert::success(trans('s_admin.update'), trans('s_admin.updted_s'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Subject::where('id', $id)->delete();
            Alert::success(trans('admin.delete'), trans('s_admin.deleted_s'));
        }catch(Exception $exception){
            Alert::error(trans('admin.delete'), trans('s_admin.ther_some_data_on_it'));
        }
        return back();
    }
}
