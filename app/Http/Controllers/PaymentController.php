<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;
use Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment( Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['payment']=$request->payment;

       // dd($data);

        if($request->payment == 'stripe'){
            return view('pages.payment.stripe',compact('data'));
        }
        //elseif($request->payment == 'visa'){}
        elseif($request->payment == 'paypal'){
        }
        else{
            return view('pages.payment.cashondelivery',compact('data'));
        }
        
        
    }
    public function outsidepayment( Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['payment']=$request->payment;
        $data['transaction_number']=$request->transaction_number;
        $data['transaction_id']=$request->transaction_id;
        $data['money']=$request->money;

       // dd($data);

        if($request->payment == 'stripe'){
            return view('pages.payment.stripe',compact('data'));
        }
        //elseif($request->payment == 'visa'){}
        elseif($request->payment == 'paypal'){
        }
        else{
            return view('pages.payment.bkash',compact('data'));
        }
        
        
    }

    public function CashCharge(Request $request){

        $total=$request->total;
        $data=array();
        $data['user_id']=Auth::id();
        //$data['payment_id']=$charge->payment_method;
        $data['paying_amount']=$request->total;
        //$data['blnc_transection']=$charge->balance_transaction;
        //$data['stripe_order_id']=$charge->metadata->order_id;
        $data['shipping']=$request->shipping;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_type']=$request->payment_type;
        if (Session::has('coupon')) {
            $data['subtotal']=Session::get('coupon')['balance'];
        }else{
            $data['subtotal']=Cart::Subtotal() ;
        }
        //$data['status']=0;
        $data['date']=date('d-m-y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status_code']=mt_rand(100000,999999);
        $order_id=DB::table('orders')->insertGetId($data);

        // insert shipping details table

        $shipping=array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$request->ship_name;
        $shipping['ship_email']=$request->ship_email;
        $shipping['ship_phone']=$request->ship_phone;
        $shipping['ship_address']=$request->ship_address;
        $shipping['ship_city']=$request->ship_city;
        DB::table('shipping')->insert($shipping);

        //insert data into orderdeatils
        $content=Cart::content();
        $details=array();
        foreach ($content as $row) {
            $details['order_id']= $order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->size;
            $details['quantity']=$row->qty;
            $details['singleprice']=$row->price;
            $details['totalprice']=$row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }

    public function BkashCharge(Request $request){

        $total=$request->total;
        $data=array();
        $data['user_id']=Auth::id();
        //$data['payment_id']=$charge->payment_method;
        $data['paying_amount']=$request->total;
        //$data['blnc_transection']=$charge->balance_transaction;
        //$data['stripe_order_id']=$charge->metadata->order_id;
        $data['shipping']=$request->shipping;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_type']=$request->payment_type;
        if (Session::has('coupon')) {
            $data['subtotal']=Session::get('coupon')['balance'];
        }else{
            $data['subtotal']=Cart::Subtotal() ;
        }
        //$data['status']=0;
        $data['date']=date('d-m-y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status_code']=mt_rand(100000,999999);
        $order_id=DB::table('orders')->insertGetId($data);

        // insert shipping details table

        $shipping=array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$request->ship_name;
        $shipping['ship_email']=$request->ship_email;
        $shipping['ship_phone']=$request->ship_phone;
        $shipping['ship_address']=$request->ship_address;
        $shipping['ship_city']=$request->ship_city;
        $shipping['transaction_number']=$request->transaction_number;
        $shipping['transaction_id']=$request->transaction_id;
        $shipping['money']=$request->money;
        DB::table('outsideshipping')->insert($shipping);

        //insert data into orderdeatils
        $content=Cart::content();
        $details=array();
        foreach ($content as $row) {
            $details['order_id']= $order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->size;
            $details['quantity']=$row->qty;
            $details['singleprice']=$row->price;
            $details['totalprice']=$row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }


    public function STripeCharge(Request $request)
    {

        $total=$request->total;
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_5WJ51nwEzd74CXcWIfSGq6CV');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Learn Hunter details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        $data=array();
        $data['user_id']=Auth::id();
        $data['payment_id']=$charge->payment_method;
        $data['paying_amount']=$charge->amount/100;
        $data['blnc_transection']=$charge->balance_transaction;
        $data['stripe_order_id']=$charge->metadata->order_id;
        $data['shipping']=$request->shipping;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_type']=$request->payment_type;
        if (Session::has('coupon')) {
            $data['subtotal']=Session::get('coupon')['balance'];
        }else{
            $data['subtotal']=Cart::Subtotal() ;
        }
        $data['status']=0;
        $data['date']=date('d-m-y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status_code']=mt_rand(100000,999999);
        $order_id=DB::table('orders')->insertGetId($data);

        // insert shipping details table

        $shipping=array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$request->ship_name;
        $shipping['ship_email']=$request->ship_email;
        $shipping['ship_phone']=$request->ship_phone;
        $shipping['ship_address']=$request->ship_address;
        $shipping['ship_city']=$request->ship_city;
        DB::table('shipping')->insert($shipping);

        //insert data into orderdeatils
        $content=Cart::content();
        $details=array();
        foreach ($content as $row) {
            $details['order_id']= $order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->size;
            $details['quantity']=$row->qty;
            $details['singleprice']=$row->price;
            $details['totalprice']=$row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification=array(
            'messege'=>'Successfully Done',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }
}
