<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\cart;
use App\Models\category;
use App\Models\order;
use App\Models\orderproduct;
use App\Models\product;
use App\Models\productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Session;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index(){
        $banner = banner::latest()->get();
        $category = category::latest()->get();
        $product = product::latest()->get();
        $product_advertise = product::where('category_id',3)->get();
        $banner_category = product::where('id',2)->get();
        $banner_category2 = product::where('category_id',1)->inRandomOrder()->limit(1)->get();
        // echo $banner_category;
        // die;
        // echo "<pre>";
        // print_r($product_advertise);
        // die;
        return view('frontend.index',compact('banner','category','product','product_advertise','banner_category','banner_category2'));
    }

    public function product_detail($id){
        $product_detail = product::find($id);
        $cat_id = product::where('id',$id)->pluck('category_id');
        // $cat_id = $product2->category_id;
        // echo $cat_id;
        $product = product::where('category_id',$cat_id)->get();
        $category12 = category::where('id',$cat_id)->get();
        // echo $product;
        $product_image = productimage::where('product_id',$id)->get();
         return view('frontend.product_detail',compact('product_detail','product','product_image','category12'));
    }

    public function add_to_cart(Request $a){
           $session_id=Session::getId();
           $data = new cart();
           $data->product_id = $a->product_id;
           $data->product_name = $a->product_name;
           $data->product_price = $a->product_price;
           $data->product_image = $a->product_image;
           $data->product_quantity = $a->product_quantity;
           $data->session_id = $session_id;
           if(Auth::check()){
               $data->user_email = Auth::user()->email;
           }
           $data->save();
           return redirect('/cart');
    }

    public function cart(){
        // $cart = cart::latest()->get();
        $session_id=Session::getId();
        // $cart = cart::where('session_id',$session_id)->get();
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cart = cart::where('user_email',$user_email)->get();
        }
        else{
            $cart = cart::where('session_id',$session_id)->get();
        }
        return view('frontend.cart',compact('cart'));
    }

    public function cart_delete($id){
        $email = Auth::user()->email;
        // echo $id;
        // echo $email;
        // die;
        $data=cart::where('user_email',$email)->where('id',$id);
        $data->delete();
        return redirect('/cart');
    }

    public function checkout(){
        $email = Auth::user()->email;
        $data = cart::where('user_email',$email)->get();
        return view('frontend.checkout',compact('data'));
    }

    public function place_order(Request $a){
        // print_r($a->all());
        // die;
        $data = new order();
        $data->user_id = Auth::user()->id;
        $data->user_email = $a->email;
        $data->name = $a->name;
        $data->address = $a->address;
        $data->city = $a->city;
        $data->state = $a->state;
        $data->phone_num = $a->phone;
        $data->pin_code = $a->pincode;
        $data->shipping_charges = $a->shipping_charges;
        // $data->coupon_code
        // $data->coupon_amount
        $data->order_status = 'pending';
        $data->payment_method = $a->payment_method;
        // $data->payment_status
        // $data->transaction_id
        $data->order_id = Str::random(10);
        $data->grand_total = $a->total;
        $data->save();
        $order_id = DB::getPdo()->lastInsertID();
        // print_r($order_id);
        // die;
        $p_item = Cart::where('user_email',$data->user_email)->get();
        // echo '<pre>';
        // echo $p_item;
        foreach($p_item as $item){
            $data2 = new orderproduct();
            $data2->order_id = $order_id;
            $data2->user_id = Auth::user()->id;
            $data2->user_email = $item->user_email;
            $data2->product_name = $item->product_name;
            $data2->product_image = $item->product_image;
            $data2->product_price = $item->product_price;
            $data2->product_quantity = $item->product_quantity;
            $data2->save();
        }
        if($data->payment_method == 'cod'){
            return redirect('/thanks');
        }
        elseif($data->payment_method == 'paytm'){
            // echo 'paytm';
            $amount = $a->total;
            $order_id = $data->order_id;
            $data_for_request = $this->handlePaytmRequest( $order_id, $amount );
            // print_r($data_for_request);
            // die;


            $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
            $paramList = $data_for_request['paramList'];
            $checkSum = $data_for_request['checkSum'];

            return view( 'paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
        }
        elseif($data->payment_method == 'Razorpay'){
            echo 'Razorpay';
        }

    }

     //paytm
    public function handlePaytmRequest( $order_id, $amount ) {
        // Load all functions of encdec_paytm.php and config-paytm.php
        $this->getAllEncdecFunc();
        $this->getConfigPaytmSettings();

        $checkSum = "";
        $paramList = array();

        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = 'BdYCtP86446448279071';
        $paramList["ORDER_ID"] = $order_id;
        $paramList["CUST_ID"] = $order_id;
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $amount;
        $paramList["WEBSITE"] = 'WEBSTAGING';
        $paramList["CALLBACK_URL"] = url( '/paytm-callback' );
        $paytm_merchant_key = 'hpkFFlWrA%aOl_it';

    //Here checksum string will return by getChecksumFromArray() function.
    $checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

    return array(
        'checkSum' => $checkSum,
        'paramList' => $paramList
    );
}

public function paytmCallback( Request $request ) {
    // return $request;
    $order_id = $request['ORDERID'];

    if ( 'TXN_SUCCESS' === $request['STATUS'] )
     {
        $transaction_id = $request['TXNID'];
        $order = order::where( 'order_id', $order_id )->first();
        $order->payment_status = 'complete';
        $order->transaction_id = $transaction_id;
        $order->save();
        // $user_email = Auth::user()->email;
        // Cart::where('user_email',$user_email)->delete();
        // $category = Category::all();
        // $data = DishOrder::where('user_email',$user_email)->first();
        // return view('frontend.thanks',compact('order','category','data'));
        return view('frontend.thanks');

      } else if( 'TXN_FAILURE' === $request['STATUS'] ){
        return view( 'payment-failed' );
    }
}
//paytm-more-things

public function getAllEncdecFunc(){


    function encrypt_e($input, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
    function decrypt_e($crypt, $ky) {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
        return $data;
    }
    function generateSalt_e($length) {
        $random = "";
        srand((double) microtime() * 1000000);
        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";
        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }
        return $random;
    }
    function checkString_e($value) {
        if ($value == 'null')
            $value = '';
        return $value;
    }
    function getChecksumFromArray($arrayList, $key, $sort=1) {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = getArray2Str($arrayList);
        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function getChecksumFromString($str, $key) {

        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function verifychecksum_e($arrayList, $key, $checksumvalue) {
        $arrayList = removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str = getArray2StrForVerify($arrayList);
        $paytm_hash = decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);
        $finalString = $str . "|" . $salt;
        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;
        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }
    function verifychecksum_eFromStr($str, $key, $checksumvalue) {
        $paytm_hash = decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);
        $finalString = $str . "|" . $salt;
        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;
        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }
    function getArray2Str($arrayList) {
        $findme   = 'REFUND';
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pos = strpos($value, $findme);
            $pospipe = strpos($value, $findmepipe);
            if ($pos !== false || $pospipe !== false)
            {
                continue;
            }

            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function getArray2StrForVerify($arrayList) {
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function redirect2PG($paramList, $key) {
        $hashString = getchecksumFromArray($paramList);
        $checksum = encrypt_e($hashString, $key);
    }
    function removeCheckSumParam($arrayList) {
        if (isset($arrayList["CHECKSUMHASH"])) {
            unset($arrayList["CHECKSUMHASH"]);
        }
        return $arrayList;
    }

    function getTxnStatus($requestParamList) {
        return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
    }
    function getTxnStatusNew($requestParamList) {
        return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
    }
    function initiateTxnRefund($requestParamList) {
        $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
        $requestParamList["CHECKSUM"] = $CHECKSUM;
        return callAPI(PAYTM_REFUND_URL, $requestParamList);
    }
    function callAPI($apiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData))
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }
    function callNewAPI($apiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData))
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }
    function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = getRefundArray2Str($arrayList);
        $salt = generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = encrypt_e($hashString, $key);
        return $checksum;
    }
    function getRefundArray2Str($arrayList) {
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pospipe = strpos($value, $findmepipe);
            if ($pospipe !== false)
            {
                continue;
            }

            if ($flag) {
                $paramStr .= checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . checkString_e($value);
            }
        }
        return $paramStr;
    }
    function callRefundAPI($refundApiURL, $requestParamList) {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData =json_encode($requestParamList);
        $postData = 'JsonData='.urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $refundApiURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse,true);
        return $responseParamList;
    }

        }

        function getConfigPaytmSettings(){

            define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
            define('PAYTM_MERCHANT_KEY', 'EBPwh5dj_XmW1L7%'); //Change this constant's value with Merchant key received from Paytm.
            define('PAYTM_MERCHANT_MID', 'EbtGYn83534967686723'); //Change this constant's value with MID (Merchant ID) received from Paytm.
            define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
            $PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';
            if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }
            define('PAYTM_REFUND_URL', '');
            define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
            define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
        }

    public function thanks(){
        $user_email=Auth::user()->email;
        cart::where('user_email',$user_email)->delete();
        return view('frontend.thanks');
    }

    public function product_category($id){
        $data = product::where('category_id',$id)->get();
        return view('frontend.product_category',compact('data'));
    }

    public function product_search(Request $req)
    {
        $name = $req->pro_name;
        // echo $name;
        $data = product::where('product_name', 'like', '%'.$name.'%')->get();
        // echo $data;
        // echo '<pre>';
        // die;
        return view('frontend.product_search',compact('data'));
    }
}
