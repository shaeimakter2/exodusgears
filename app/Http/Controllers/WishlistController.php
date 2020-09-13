<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
   public function addwishlist($id){

       $userid=Auth::id();
       $check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();
       $data=array(
           'user_id'=>$userid,
           'product_id'=>$id
       );

       if(Auth::check()){
           if ($check){
               $notification=array(
                   'messege'=>'Alrady You have Your Wishlist!',
                   'alert-type'=>'error'
               );
               return Redirect()->back()->with($notification);
           }else{
               DB::table('wishlists')->insert($data);
               $notification=array(
                   'messege'=>'Add To Wishlist!',
                   'alert-type'=>'success'
               );
               return Redirect()->back()->with($notification);
           }

       }else{
           $notification=array(
               'messege'=>'Login Your Account First!',
               'alert-type'=>'error'
           );
           return Redirect()->back()->with($notification);
       }


   }
}
