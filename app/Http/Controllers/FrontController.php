<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function storenewslater(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:newslaters|max:55',
        ]);
        $data=array();
        $data['email']=$request->email;
        DB::table('newslaters')->insert($data);
        $notification=array(
            'messege'=>'Thank you for Subscribing',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function productsearch(Request $request){
        $categories=DB::table('categories')->get();
        $brands=DB::table('brands')->get();
        $item=$request->search;
        $products=DB::table('products')
                                 ->join('categories','products.category_id','categories.id')
                                 ->join('brands','products.brand_id','brands.id')
                                 ->select('products.*', 'categories.category_name','brands.brand_name')
                                 ->where('Product_name','LIKE', "%{$item}%")
                                 ->orWhere('category_name','LIKE', "%{$item}%")
                                 ->orWhere('brand_name','LIKE', "%{$item}%")
                                ->paginate(20);
            return view('pages.search',compact('categories','brands','products'));    
    }
}
