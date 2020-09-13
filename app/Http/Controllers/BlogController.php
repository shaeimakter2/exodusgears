<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BlogController extends Controller
{
    public function blog(){
        $post=DB::table('post')->join('post_category','post.category_id','post_category.id')
            ->select('post.*','post_category.category_name_en','post_category.category_name_bn')->get();
        return view('pages.blog',compact('post'));
        //return response()->json($post);
    }

    public function english(){
        Session::get('lang');
        session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }
    public function bangla(){
        Session::get('lang');
        session()->forget('lang');
        Session::put('lang','bangla');
        return redirect()->back();
    }
}
