<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderproduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view_orders(){
        $order = order::with('orderp')->orderBy('id','desc')->get();
        return view('admin.order.view_order',compact('order'));
    }
    public function order_details($id){
        $order = orderproduct::where('order_id',$id)->get();
        return view('admin.order.order_details',compact('order'));
    }
}
