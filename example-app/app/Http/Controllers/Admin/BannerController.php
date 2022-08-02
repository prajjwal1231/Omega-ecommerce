<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\category;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
         return view('admin.banner.index');
    }

    public function store(Request $a){
        $file=$a->file('image');
        $filename="bann".time().'.'.$a->image->extension();
        $file->move('upload-banner/',$filename);
        $data = new banner();
        $data->title=$a->title;
        $data->description=$a->description;
        $data->image=$filename;
        $data->save();
        return redirect('admin/banner');
    }

    public function display(){
        $data=banner::latest()->get();
        return view('admin/banner/index',compact('data'));
    }

    public function view($id){
        $data=banner::find($id);
        return view('admin/banner/view',compact('data'));
    }

    public function edit($id){
        $data=banner::find($id);
        return view('admin/banner/edit',compact('data'));
    }

    public function update(Request $a){
        $update=banner::find($a->id);
        if(isset ($a->image))
        {
        $file=$a->file('image');
        $filename = 'pra'.time().'.'.$a->image->extension();
        $file->move("upload-banner/",$filename);
        }
        else
        {
        $filename=$update->image;
        }
        $update->title=$a->title;
        $update->description=$a->description;
        $update->image=$filename;
        $update->save();
        return redirect('admin/banner')->with('message','DATA UPDATED');
    }

    public function delete($id){
        $data=banner::find($id);
        $data->delete();
        return redirect('admin/banner');
    }
}
