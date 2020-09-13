@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Characteristics -->
@php
 $feature=\Illuminate\Support\Facades\DB::table('products')->where('status', 1)->orderByDesc('id')->limit(24)->get();
 $trend=\Illuminate\Support\Facades\DB::table('products')->where('status', 1)->where('trend', 1)->orderByDesc('id')->limit(24)->get();
 $best=\Illuminate\Support\Facades\DB::table('products')->where('status', 1)->where('best_rated', 1)->orderByDesc('id')->limit(24)->get();
 $hot=\Illuminate\Support\Facades\DB::table('products')->join('brands', 'products.brand_id', 'brands.id')
         ->select('brands.brand_name', 'products.*')->where('products.status', 1)->where('hot_deal', 1)->orderByDesc('id')->limit(8)->get();
@endphp
<div class="characteristics">
    <div class="container">
        <div class="row">

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/frontend/images/char_1.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/frontend/images/char_2.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/frontend/images/char_3.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="{{asset('public/frontend/images/char_4.png')}}" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                        @foreach($hot as $ht)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="{{asset($ht->image_one)}}" alt="" style="width: 130px;"></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">{{$ht->Product_name}}</a></div>
                                        @if($ht->discount_price == NULL)
                                        @else
                                            <div class="deals_item_price ml-auto"><p>Tk {{ $ht->selling_price }}</p> </div>
                                        @endif
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">{{$ht->brand_name}}</div>
                                        @if($ht->discount_price == NULL)
                                            <div class="deals_item_price ml-auto"><span>Tk {{ $ht->selling_price }}</span></div>
                                        @else
                                        @endif
                                        @if($ht->discount_price != NULL)
                                            <div class="deals_item_price ml-auto"><span>Tk {{ $ht->discount_price }}</span></div>
                                        @else
                                        @endif
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>{{$ht->Product_quantity}}</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="">hy</i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="">hy</i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                                <li>Trend</li>
                                <li>Best Rated</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                                @foreach($feature as $row)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($row->image_one)}}" alt=""></div>
                                        <div class="product_content">
                                                @if($row->discount_price == NULL)
                                                    <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $row->selling_price }}</span> </div>
                                                @else
                                                    <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $row->selling_price }}</span>Tk{{ $row->discount_price }} </div>
                                                @endif
                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$row->id.'/'.$row->Product_name)}}">{{$row->Product_name}}</a></div></div>
                                           {{-- <a href="{{URL::to('add/to/cart/'.$row->id)}}">
                                            <div class="product_extras">
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                            </a>--}}

                                            <div class="product_extras">
                                                <button id="{{ $row->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to Cart</button>

                                            </div>

                                        </div>
                                        <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                                            <div class="product_fav">
                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                            </div>
                                        </a>
                                        <ul class="product_marks">
                                            @if($row->discount_price == NULL)
                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                            @else
                                                @php
                                                 $amount=$row->selling_price - $row->discount_price;
                                                 $discount=$amount/$row->selling_price * 100;
                                                @endphp
                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">
                                @foreach($trend as $tre)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($tre->image_one)}}" alt=""></div>
                                        <div class="product_content">
                                            @if($tre->discount_price == NULL)
                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $tre->selling_price }}</span> </div>
                                            @else
                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $tre->selling_price }}</span>Tk{{ $tre->discount_price }} </div>
                                            @endif
                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$tre->id.'/'.$tre->Product_name)}}">{{$tre->Product_name}}</a></div></div>
                                            <a href="{{URL::to('add/to/cart/'.$tre->id)}}">
                                                <div class="product_extras">
                                                    {{--<div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>--}}
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </a>
                                        </div>
                                        <a href="{{URL::to('add/wishlist/'.$tre->id)}}">
                                            <div class="product_fav">
                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                            </div>
                                        </a>
                                        <ul class="product_marks">
                                            @if($tre->discount_price == NULL)
                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                            @else
                                                @php
                                                $amount=$tre->selling_price - $tre->discount_price;
                                                $discount=$amount/$tre->selling_price * 100;
                                                @endphp
                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">
                                @foreach($best as $bst)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($bst->image_one)}}" alt=""></div>
                                        <div class="product_content">
                                            @if($bst->discount_price == NULL)
                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $bst->selling_price }}</span> </div>
                                            @else
                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $bst->selling_price }}</span>Tk{{ $bst->discount_price }} </div>
                                            @endif
                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$bst->id.'/'.$bst->Product_name)}}">{{$bst->Product_name}}</a></div></div>
                                            <a href="{{URL::to('add/to/cart/'.$bst->id)}}">
                                                <div class="product_extras">
                                                    {{--<div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>--}}
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </a>
                                        </div>
                                        <a href="{{URL::to('add/wishlist/'.$bst->id)}}">
                                            <div class="product_fav">
                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                            </div>
                                        </a>
                                        <ul class="product_marks">
                                            @if($bst->discount_price == NULL)
                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                            @else
                                                @php
                                                $amount=$bst->selling_price - $bst->discount_price;
                                                $discount=$amount/$bst->selling_price * 100;
                                                @endphp
                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Popular Categories -->
@php
    $category=\Illuminate\Support\Facades\DB::table('categories')->get();
@endphp

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fa fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fa fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">
                    @foreach($category as $cat)
                        <!-- Popular Categories Item -->
                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{asset('public/frontend/images/popular_1.png')}}" alt=""></div>
                                <div class="popular_category_text">{{$cat->category_name}}</div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->
@php
  $mid=\Illuminate\Support\Facades\DB::table('products')->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')->select('products.*','brands.brand_name','categories.category_name')
        ->where('products.mid_slider',1)->orderByDesc('id')->limit(4)->get();
@endphp
<div class="banner_2">
    <div class="banner_2_background" style="background-image:url({{asset('public/frontend/images/banner_2_background.jpg')}})"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">
            @foreach($mid as $row)
            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">{{ $row->category_name }}</div>
                                    <div class="banner_2_title">{{ $row->Product_name }}</div>
                                    <div class="banner_2_title">{{ $row->brand_name }} <br> Product Code: {{$row->Product_code}}</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="{{asset($row->image_one)}}" style="height: 280px; width: 320px; "></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Hot New Arrivals -->


@php
    $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(0)->first();
    $products=DB::table('products')->where('category_id',$cats->id)->where('status',1)->limit(16)->orderByDesc('id')->get();
@endphp
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{$cats->category_name}}</div>
                        <ul class="clearfix">
                            <li class="active"></li>

                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="z-index:1;">
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                @foreach($products as $ro)
                                    <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($ro->image_one)}}" alt=""></div>
                                                <div class="product_content">
                                                    @if($ro->discount_price == NULL)
                                                        <div class="product_price without discount"style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span> </div>
                                                    @else
                                                        <div class="product_price with discount"style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span>Tk{{ $ro->discount_price }} </div>
                                                    @endif
                                                    <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$ro->id.'/'.$ro->Product_name)}}">{{$ro->Product_name}}</a></div></div>
                                                    <a href="{{URL::to('add/to/cart/'.$ro->id)}}">
                                                        <div class="product_extras">
                                                            {{--<div class="product_color">
                                                                <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                <input type="radio" name="product_color" style="background:#000000">
                                                                <input type="radio" name="product_color" style="background:#999999">
                                                            </div>--}}
                                                            <button class="product_cart_button">Add to Cart</button>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a href="{{URL::to('add/wishlist/'.$ro->id)}}">
                                                    <div class="product_fav">
                                                        <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                                    </div>
                                                </a>
                                                <ul class="product_marks">
                                                    @if($ro->discount_price == NULL)
                                                        <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                                    @else
                                                        @php
                                                            $amount=$ro->selling_price - $ro->discount_price;
                                                            $discount=$amount/$ro->selling_price * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>
                        </div>
                        @php
                            $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(1)->first();
                            $products=DB::table('products')->where('category_id',$cats->id)->where('status',1)->limit(16)->orderByDesc('id')->get();
                        @endphp
                        <div class="new_arrivals" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="container" style="color: blue">
                                <div class="row">
                                    <div class="col">
                                        <div class="tabbed_container">
                                            <div class="tabs clearfix tabs-right">
                                                <div class="new_arrivals_title">{{$cats->category_name}}</div>
                                                <ul class="clearfix">
                                                    <li class="active"></li>

                                                </ul>
                                                <div class="tabs_line"><span></span></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" style="z-index:1;">
                                                    <!-- Product Panel -->
                                                    <div class="product_panel panel active">
                                                        <div class="featured_slider slider">
                                                        @foreach($products as $ro)
                                                            <!-- Slider Item -->
                                                                <div class="featured_slider_item">
                                                                    <div class="border_active"></div>
                                                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($ro->image_one)}}" alt=""></div>
                                                                        <div class="product_content">
                                                                            @if($ro->discount_price == NULL)
                                                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span> </div>
                                                                            @else
                                                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span>Tk{{ $ro->discount_price }} </div>
                                                                            @endif
                                                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$ro->id.'/'.$ro->Product_name)}}">{{$ro->Product_name}}</a></div></div>
                                                                            <a href="{{URL::to('add/to/cart/'.$ro->id)}}">
                                                                                <div class="product_extras">
                                                                                    {{--<div class="product_color">
                                                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                                        <input type="radio" name="product_color" style="background:#000000">
                                                                                        <input type="radio" name="product_color" style="background:#999999">
                                                                                    </div>--}}
                                                                                    <button class="product_cart_button">Add to Cart</button>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a href="{{URL::to('add/wishlist/'.$ro->id)}}">
                                                                            <div class="product_fav">
                                                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="product_marks">
                                                                            @if($ro->discount_price == NULL)
                                                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                                                            @else
                                                                                @php
                                                                                    $amount=$ro->selling_price - $ro->discount_price;
                                                                                    $discount=$amount/$ro->selling_price * 100;
                                                                                @endphp
                                                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="featured_slider_dots_cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(2)->first();
                            $products=DB::table('products')->where('category_id',$cats->id)->where('status',1)->limit(16)->orderByDesc('id')->get();
                        @endphp
                        <div class="new_arrivals" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="tabbed_container">
                                            <div class="tabs clearfix tabs-right">
                                                <div class="new_arrivals_title">{{$cats->category_name}}</div>
                                                <ul class="clearfix">

                                                    <li class="active"></li>

                                                </ul>
                                                <div class="tabs_line"><span></span></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" style="z-index:1;">
                                                    <!-- Product Panel -->
                                                    <div class="product_panel panel active">
                                                        <div class="featured_slider slider">
                                                        @foreach($products as $ro)
                                                            <!-- Slider Item -->
                                                                <div class="featured_slider_item">
                                                                    <div class="border_active"></div>
                                                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($ro->image_one)}}" alt=""></div>
                                                                        <div class="product_content">
                                                                            @if($ro->discount_price == NULL)
                                                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span> </div>
                                                                            @else
                                                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span>Tk{{ $ro->discount_price }} </div>
                                                                            @endif
                                                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$ro->id.'/'.$ro->Product_name)}}">{{$ro->Product_name}}</a></div></div>
                                                                            <a href="{{URL::to('add/to/cart/'.$ro->id)}}">
                                                                                <div class="product_extras">
                                                                                    {{--<div class="product_color">
                                                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                                        <input type="radio" name="product_color" style="background:#000000">
                                                                                        <input type="radio" name="product_color" style="background:#999999">
                                                                                    </div>--}}
                                                                                    <button class="product_cart_button">Add to Cart</button>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a href="{{URL::to('add/wishlist/'.$ro->id)}}">
                                                                            <div class="product_fav">
                                                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="product_marks">
                                                                            @if($ro->discount_price == NULL)
                                                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                                                            @else
                                                                                @php
                                                                                    $amount=$ro->selling_price - $ro->discount_price;
                                                                                    $discount=$amount/$ro->selling_price * 100;
                                                                                @endphp
                                                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="featured_slider_dots_cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(3)->first();
                            $products=DB::table('products')->where('category_id',$cats->id)->where('status',1)->limit(16)->orderByDesc('id')->get();
                        @endphp
                        <div class="new_arrivals" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="tabbed_container">
                                            <div class="tabs clearfix tabs-right">
                                                <div class="new_arrivals_title">{{$cats->category_name}}</div>
                                                <ul class="clearfix">
                                                    <li class="active"></li>

                                                </ul>
                                                <div class="tabs_line"><span></span></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" style="z-index:1;">
                                                    <!-- Product Panel -->
                                                    <div class="product_panel panel active">
                                                        <div class="featured_slider slider">
                                                        @foreach($products as $ro)
                                                            <!-- Slider Item -->
                                                                <div class="featured_slider_item">
                                                                    <div class="border_active"></div>
                                                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($ro->image_one)}}" alt=""></div>
                                                                        <div class="product_content">
                                                                            @if($ro->discount_price == NULL)
                                                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span> </div>
                                                                            @else
                                                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span>Tk{{ $ro->discount_price }} </div>
                                                                            @endif
                                                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$ro->id.'/'.$ro->Product_name)}}">{{$ro->Product_name}}</a></div></div>
                                                                            <a href="{{URL::to('add/to/cart/'.$ro->id)}}">
                                                                                <div class="product_extras">
                                                                                    {{--<div class="product_color">
                                                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                                        <input type="radio" name="product_color" style="background:#000000">
                                                                                        <input type="radio" name="product_color" style="background:#999999">
                                                                                    </div>--}}
                                                                                    <button class="product_cart_button">Add to Cart</button>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a href="{{URL::to('add/wishlist/'.$ro->id)}}">
                                                                            <div class="product_fav">
                                                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="product_marks">
                                                                            @if($ro->discount_price == NULL)
                                                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                                                            @else
                                                                                @php
                                                                                    $amount=$ro->selling_price - $ro->discount_price;
                                                                                    $discount=$amount/$ro->selling_price * 100;
                                                                                @endphp
                                                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="featured_slider_dots_cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $cats=\Illuminate\Support\Facades\DB::table('categories')->skip(4)->first();
                            $products=DB::table('products')->where('category_id',$cats->id)->where('status',1)->limit(16)->orderByDesc('id')->get();
                        @endphp
                        <div class="new_arrivals" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="tabbed_container">
                                            <div class="tabs clearfix tabs-right">
                                                <div class="new_arrivals_title">{{$cats->category_name}}</div>
                                                <ul class="clearfix">
                                                    <li class="active"></li>

                                                </ul>
                                                <div class="tabs_line"><span></span></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" style="z-index:1;">
                                                    <!-- Product Panel -->
                                                    <div class="product_panel panel active">
                                                        <div class="featured_slider slider">
                                                        @foreach($products as $ro)
                                                            <!-- Slider Item -->
                                                                <div class="featured_slider_item">
                                                                    <div class="border_active"></div>
                                                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($ro->image_one)}}" alt=""></div>
                                                                        <div class="product_content">
                                                                            @if($ro->discount_price == NULL)
                                                                                <div class="product_price without discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span> </div>
                                                                            @else
                                                                                <div class="product_price with discount" style="margin-top: 5px; margin-bottom: 5px;"><span>Tk {{ $ro->selling_price }}</span>Tk{{ $ro->discount_price }} </div>
                                                                            @endif
                                                                            <div class="product_name" style="margin-top: -20px;"><div><a href="{{url('product/details/'.$ro->id.'/'.$ro->Product_name)}}">{{$ro->Product_name}}</a></div></div>
                                                                            <a href="{{URL::to('add/to/cart/'.$ro->id)}}">
                                                                                <div class="product_extras">
                                                                                    {{--<div class="product_color">
                                                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                                        <input type="radio" name="product_color" style="background:#000000">
                                                                                        <input type="radio" name="product_color" style="background:#999999">
                                                                                    </div>--}}
                                                                                    <button class="product_cart_button">Add to Cart</button>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a href="{{URL::to('add/wishlist/'.$ro->id)}}">
                                                                            <div class="product_fav">
                                                                                <i class="fa fa-heart" aria-hidden="true" style="color: blue;"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="product_marks">
                                                                            @if($ro->discount_price == NULL)
                                                                                <li class="product_mark product_discount" style=" background-color: green;">NEW</li>
                                                                            @else
                                                                                @php
                                                                                    $amount=$ro->selling_price - $ro->discount_price;
                                                                                    $discount=$amount/$ro->selling_price * 100;
                                                                                @endphp
                                                                                <li class="product_mark product_discount">-{{intval($discount)}}%</li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="featured_slider_dots_cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot Best Sellers</div>
                        <ul class="clearfix">
                            <li class="active">Top 20</li>
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Samsung Charm Gold</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Beoplay H7</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Huawei MediaPad T3</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_1.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_2.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_3.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_4.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_5.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img src="{{asset('public/frontend/images/best_6.png')}}" alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Adverts -->

<div class="adverts">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_1.png')}}" alt=""></div></div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_2.png')}}" alt=""></div></div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_3.png')}}" alt=""></div></div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Trends -->
@php
    $buyget=\Illuminate\Support\Facades\DB::table('products')->where('status', 1)->where('buyone_getone', 1)->orderByDesc('id')->limit(12)->get();
@endphp
<div class="trends">
    <div class="trends_background" style="background-image:url({{asset('public/frontend/images/trends_background.jpg')}})"></div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">
        @foreach($buyget as $row)
            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Buy one Get One</h2>
                    <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                    <div class="trends_slider_nav" >
                        <div class="trends_prev trends_nav"><i class="fa fa-angle-left ml-auto" ></i></div>
                        <div class="trends_next trends_nav"><i class="fa fa-angle-right ml-auto" ></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">

                    <!-- Trends Slider -->

                    <div class="owl-carousel owl-theme trends_slider">

                        <!-- Trends Slider Item -->
                        <div class="owl-item">
                            <div class="trends_item is_new">
                                <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($row->image_one)}}" style="height: 130px"></div>
                                <div class="trends_content">
                                    <div class="trends_category"><a href="#"></a></div>
                                    <div class="trends_info clearfix" style="text-align: center;">
                                        @if($row->discount_price == NULL)
                                            <div class="trends_price without discount"><span>Tk {{ $row->selling_price }}</span> </div>
                                        @else
                                            <div class="trends_price with discount"><span>Tk {{ $row->selling_price }}</span>Tk{{ $row->discount_price }} </div>
                                        @endif
                                    <div class="trends_name" style="text-align: center"><div><a href="{{url('product/details/'.$row->id.'/'.$row->Product_name)}}">{{$row->Product_name}}</a></div></div>
                                    </div>
                                </div>
                                <a href="{{URL::to('add/to/cart/'.$row->id)}}">
                                    <div class="">
                                        <button type="button" class="  btn btn-outline-info btn-block" style="; width: 220px; color: white; border: white" >Add to Cart</button>
                                    </div>
                                </a>
                                <ul class="trends_marks">
                                    {{--<li class="trends_mark trends_discount">-25%</li>--}}
                                    @if($row->discount_price == NULL)
                                        <li class="trends_mark trends_new" style=" background-color: green;">NEW</li>
                                    @else
                                        @php
                                            $amount=$row->selling_price - $row->discount_price;
                                            $discount=$amount/$row->selling_price * 100;
                                        @endphp
                                        <li class="trends_mark trends_discount">-{{intval($discount)}}%</li>
                                    @endif
                                    {{--<li class="trends_mark trends_new">new</li>--}}
                                </ul>
                                <a href="{{URL::to('add/wishlist/'.$row->id)}}">
                                    <div class="trends_fav" style="background-color: grey;"><i class="fa fa-heart " aria-hidden="true" style="color: blue;"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<!-- Reviews -->

<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">

                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_1.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_2.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_3.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_1.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_2.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div><div class="review_image"><img src="{{asset('public/frontend/images/review_3.jpg')}}" alt=""></div></div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="reviews_dots"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fa fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fa fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_1.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_2.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_3.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225</div>
                                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_4.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_5.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{asset('public/frontend/images/view_6.jpg')}}" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$375</div>
                                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">

                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_1.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_2.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_3.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_4.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_5.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_6.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_7.jpg')}}" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_8.jpg')}}" alt=""></div></div>

                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fa fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fa fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{asset('public/frontend/images/send.png')}}" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{route('store.newslater')}}" class="newsletter_form" method="post">
                            @csrf
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
                            <button class="newsletter_button" type="submit">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--product cart add modal-->

<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="" class="card-img-top" id="pimage" style="height: 240px;">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <ul class="list-group">
                            <li class="list-group-item"><span> <h5 class="card-title" id="pname"></h5></span></li>
                            <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                            <li class="list-group-item">Category:  <span id="pcat"> </span></li>
                            <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
                            <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
                            <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
                        </ul>
                    </div>
                    <div class="col-md-4 ">
                        <form action="{{ route('insert.into.cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="Product_id" id="product_id">
                            <div class="form-group" id="colordiv">
                                <label for="">Color</label>
                                <select name="color" class="form-control">
                                </select>
                            </div>
                            <div class="form-group" id="sizediv" >
                                <label for="exampleInputEmail1">Size</label>
                                <select name="size" class="form-control" id="size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" class="form-control" value="1" name="qty">
                            </div>
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal end-->

<script type="text/javascript">
    function productview(id){
        $.ajax({
            url: "{{  url('/cart/product/view/') }}/"+id,
            type:"GET",
            dataType:"json",
            success:function(data) {
                $('#pname').text(data.product.Product_name);
                $('#pimage').attr('src',data.product.image_one);
                $('#pcat').text(data.product.category_name);
                $('#psubcat').text(data.product.subcategory_name);
                $('#pbrand').text(data.product.brand_name);
                $('#pcode').text(data.product.Product_code);
                $('#product_id').val(data.product.id);

                var d =$('select[name="size"]').empty();
                $.each(data.size, function(key, value){
                    $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.size == "") {
                        $('#sizediv').hide();
                    }else{
                        $('#sizediv').show();
                    }
                });

                var d =$('select[name="color"]').empty();
                $.each(data.color, function(key, value){
                    $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.color == "") {
                        $('#colordiv').hide();
                    } else{
                        $('#colordiv').show();
                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.addwishlist').on('click', function(){
            var id = $(this).data('id');
            if(id) {
                $.ajax({
                    url: "{{  url('/add/wishlist/') }}/"+id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }

                    },

                });
            } else {
                alert('danger');
            }
            e.preventDefault();
        });
    });

</script>

@endsection
