<?php

namespace App\Http\Controllers\Admin\episodes;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Episode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DorrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = College::where('type','dorr')->where('deleted','0')->get();
        return view('admin.episodes.college.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.episodes.college.create' );
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
                'type' => 'required'
            ]);
        College::create($data);
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
        $data = Episode::where('college_id',$id)->where('deleted','0')->get();
        return view('admin.episodes.college.episodes',compact('data'));
    }

    public function episodes($id)
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
}
