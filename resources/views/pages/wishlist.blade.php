@extends('layouts.app')
@section('content')
    @include('layouts.menubar')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">

    <div class="cart_section">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12 ">
                    <div class="cart_container">
                        <div class="cart_title">Your Wishlist</div>
                        <div class="cart_items " style="">
                            <ul class="cart_list" style="line-height: 1; text-align: center;">
                                @foreach($product as $row)
                                    <li class="cart_item clearfix " >
                                        <div class="cart_item_image "><img src="{{asset($row->image_one)}}" style="height: 120px;"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between"  >
                                            <div class="cart_item_name cart_info_col col-sm-2" style="text-align: center;">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$row->Product_name}}</div>
                                            </div>
                                            @if($row->Product_color == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">
                                                        {{$row->Product_color}}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($row->Product_size == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">
                                                        {{$row->Product_size}}
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="cart_item_total cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title">Action</div><br><br>
                                                <a href="#" class="btn btn-sm btn-danger">Add to Cart</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>

@endsection
