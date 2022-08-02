<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.category.index');
    }
    public function store(Request $a){
        $file=$a->file('image');
        $filename='pra'.time().'.'.$a->image->extension();
        $file->move("upload/",$filename);
        $data=new category();
        $data->name=$a->title;
        $data->image=$filename;
        $data->save();
        return redirect('admin/category');
    }
    public function display()
    {
        $data=category::latest()->get();
        return view('admin/category/index',compact('data'));
    }
    public function view($id)
    {
        $data=category::find($id);
        return view('admin/category/view',compact('data'));
    }
    public function edit($id)
    {
        $data=category::find($id);
        return view('admin/category/edit',compact('data'));
    }
    public function update(request $a)
    {
        $update=category::find($a->id);
        if(isset ($a->image))
        {
        $file=$a->file('image');
        $filename = 'pra'.time().'.'.$a->image->extension();
        $file->move("upload/",$filename);
        }
        else
        {
        $filename=$update->image;
        }
        $update->name=$a->title;
        $update->image=$filename;
        $update->save();
        return redirect('admin/category')->with('message','DATA UPDATED');
    }
    public function delete($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect('admin/category');
    }
}
