<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class PriceFilterController extends Controller
{
    public function productshop(Request $request)
    {
        #Get minimum and maximum price to set in price filter range
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        //dd('Minimum Price value in DB->'.$min_price,'Maximum Price value in DB->'.$max_price);

        #Get filter request parameters and set selected value in filter
        $filter_min_price = $request->min_price;
        $filter_max_price = $request->max_price;

        if($filter_min_price && $filter_max_price){
            if($filter_min_price >0 && $filter_max_price >0)
            {
            $products = product::select('product_name','product_image','product_price','quantity')->whereBetween('product_price',[$filter_min_price,$filter_max_price])->get();
          }
        }

        else{
            $products = product::select('product_name','product_image','product_price','quantity')->get();
        }
        return view('frontend.pricefilter',compact('products','min_price','max_price','filter_min_price','filter_max_price'));
    }
}
