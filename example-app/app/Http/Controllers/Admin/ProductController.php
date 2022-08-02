<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\productimage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $a){
        $cat = Category::all();
        $file=$a->file('product_image');
        $filename='pro'.time().'.'.$a->product_image->extension();
        // $file->move('upload/',$filename);

        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(685, 854);
        $image_resize->save(public_path('upload/'.$filename));

        $data=new product();
        $data->product_name=$a->product_name;
        $data->product_description=$a->product_description;
        $data->product_image=$filename;
        $data->product_price=$a->product_price;
        $data->quantity=$a->quantity;
        $data->category_id=$a->category_id;
        $data->save();
        return redirect('admin/product');
    }

    public function display(){
        $data=product::latest()->get();
        $cat = category::all();
        return view('admin/product/index',compact('data','cat'));
    }

    public function view($id){
        $data=product::find($id);
        return view('admin/product/view',compact('data'));
    }
    public function edit($id)
    {
        $data=product::find($id);
        $cat = category::all();
        return view('admin/product/edit',compact('data','cat'));
    }

    public function update(request $a)
    {
        $update=product::find($a->id);
        if(isset($a->product_image))
        {
            $file=$a->file('product_image');
            $filename='pro'.time().'.'.$a->product_image->extension();
            // $file->move('upload/',$filename);

        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(685, 854);
        $image_resize->save(public_path('upload/'.$filename));
        }
        else
        {
            $filename=$update->product_image;
        }
        $update->product_name=$a->product_name;
        $update->product_description=$a->product_description;
        $update->product_image=$filename;
        $update->product_price=$a->product_price;
        $update->quantity=$a->quantity;
        $update->save();
        return redirect('admin/product');
    }
    public function delete($id)
    {
        $data=product::find($id);
        $destination = 'upload/'.$data->product_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $data->delete();
        return redirect('admin/product');
    }
    public function add_image($id)
    {
        $a=product::find($id);
        $image_data=productimage::where('product_id',$id)->get();
        return view('admin.product.product_image',compact('a','image_data'));
    }
    public function image_update(request $a)
    {
        // echo "<pre>";
        // print_r($id->all());
            $update=new productimage();
            $file=$a->file('image');
            $filename='pro'.time().'.'.$a->image->extension();
            $file->move('upload/',$filename);
            $update->product_id=$a->id;
            $update->product_image=$filename;
            $update->save();
            return redirect('admin/product');
    }

    public function add_image_delete($id)
    {
        $data=productimage::find($id);
        $destination = 'upload/'.$data->product_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $data->delete();
        return redirect('admin/product');
    }
}
