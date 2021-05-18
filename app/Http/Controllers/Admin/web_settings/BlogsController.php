<?php

namespace App\Http\Controllers\Admin\web_settings;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogsController extends Controller
{
    //Slider Actions
    public function index(){
        $blogs = Blog::get();
        return view('admin.web_settings.out_website_settings.blogs' ,compact('blogs') );
    }

    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp',
                'title_ar' => 'required',
                'title_en' => 'required',
                'desc_ar' => 'required',
                'desc_en' => 'required',
            ]);
        if ($request['image'] != null)
        {
            // This is Image Information ...
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            // Move Image To Folder ..
            $fileNewName = 'img_' . time() . '.' . $ext;
            $file->move(public_path('uploads/blogs'), $fileNewName);
            $data['image'] = $fileNewName;
        }else{
            $data['image'] = 'default.png';
        }
        Blog::create($data);
        Alert::success(trans('admin.add'), trans('admin.addedsuccess'));
        return back();
    }

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
        $player = Blog::where('id', $id)->first();
        $player->delete();
        session()->flash('success',  trans('admin.deleteSuccess'));
        return back();
    }
}
