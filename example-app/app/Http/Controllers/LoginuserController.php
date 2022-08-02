<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginuserController extends Controller
{
    public function login_user()
    {
        return view('frontend.login');
    }

    public function sign_up(Request $a){
        // print_r($a->all());
        // die;
        // $this->validate($a, [
        //     'name'=>'required',
        //     'email'=>'required | unique:users',
        //     'password'=>'required',
        // ]);
        $data = $a->all();
        $userCount = User::where('email',$data['email'])->count();
        if($userCount>0){
            // Toastr::error('Email already exists');
            return redirect()->back();
        }
        else{
            $user = new User();
            $user->name= $a->name;
            $user->email= $a->email;
            $user->password= Hash::make($a->password);
            $user->role= "user";
            $user->save();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/cart');
            }
        }

    }

    public function login_submit(Request $a){
        // print_r($a->all());
        // die;
        $session_id = Session::getId();
        // echo $session_id;
        // die;
        if($a->isMethod('post')){
            $data = $a->all();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
                $em = $data['email'];
                $id = User::where('email',$em)->pluck('id');
                Session::put('user_id',$id);
                return redirect('/cart')->with('message','login Successfull');
            }
            else{
                return redirect()->back();
            }
        }
}

public function user_logout(){
    Auth::logout();
    return redirect('/');
}

public function user_account(){
    return view('frontend.user.user_account');
}

public function user_address(){
    return view('frontend.user.user_address');
}

public function user_passwordchange(){
    $user_id = Session::get('user_id');
    // echo $user_id;
    // die;
    return view('frontend.user.user_passwordchange',compact('user_id'));
}

public function password_updated(Request $a){
    // print_r($a->all());
    $data = User::find($a->id);
    // print_r($data);
    // echo $data;
    // die;
    if((Hash::check($a->new_pass, Auth::user()->password))){
        return redirect()->back()->with('message','Your Old password cannot be your new password');
    }
    else if((Hash::check($a->old_pass, Auth::user()->password))){
        if($a->new_pass == $a->con_pass){
            $data->password = Hash::make($a->con_pass);
            $data->save();
            return redirect('/user_account')->with('message','Your Password Changed');
        }
        return redirect()->back()->with('message','Please Make Sure The New password is right');

    }
    return redirect()->back()->with('message','Please Make Sure The Old password is right');
}

public function user_orders(){
    $order = order::with('orderp')->orderBy('id','desc')->get();
    return view('frontend.user.user_orders',compact('order'));
}

public function add_user_address(){
    $name = Auth::User()->name;
    // echo $data;
    // die;
    return view('frontend.user.add_user_address',compact('name'));
}

public function invoice($id){
    // echo $id;
    $order = order::with('orderp')->where('id',$id)->orderBy('id','desc')->get();
    // echo $order;
    // echo '<pre>';
    // die;
    return view('frontend.user.invoice',compact('order'));
}

}
