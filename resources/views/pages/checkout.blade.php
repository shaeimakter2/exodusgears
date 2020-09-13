@extends('layouts.app')
@section('content')
    @include('layouts.menubar')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">
    @php
        $setting=Illuminate\Support\Facades\DB::table('settings')->first();
        $charge=$setting->shipping_charge;
        $subtotal = str_replace(',', '', Cart::subtotal());
    @endphp

    <div class="cart_section">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12 ">
                    <div class="cart_container">
                        <div class="cart_title">Check-Out</div>
                        <div class="cart_items " style="">
                            <ul class="cart_list" style="line-height: 1; text-align: center;">
                                @foreach($cart as $row)
                                    <li class="cart_item clearfix " >
                                        <div class="cart_item_image "><img src="{{asset($row->options->image)}}" style="height: 120px;"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between"  >
                                            <div class="cart_item_name cart_info_col col-sm-2" style="text-align: center;">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            @if($row->options->color == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">
                                                        {{$row->options->color}}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($row->options->size == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">
                                                        {{$row->options->size}}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col col-sm-2" style="text-align: center;">
                                                <div class="cart_item_title">Quantity</div><br><br>
                                                <form method="post" action="{{ route('update.cartitem') }}">
                                                    @csrf
                                                    <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                    <input type="number" name="qty" value="{{ $row->qty }}" style="width: 60px; height: 30px; text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></button>
                                                </form>
                                            </div>
                                            <div class="cart_item_price cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">TK {{$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">Tk {{$row->price * $row->qty}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title">Action</div><br><br>
                                                <a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total" style="height: auto">
                            <div class="order_total_content text-md-right" style="text-align: center !important;">
                                @if(Session::has('coupon'))
                                @else
                                    <div class="order_total_title col-lg-12" style=" margin-top: 10px;"><h3> Apply Coupon </h3></div>
                                    <form action="{{route('apply.coupon')}}" method="post">
                                    @csrf
                                    <div class="col-lg-12 order_total_amount">
                                        <input type="textmargin-left: 320px;" class="form-control col-lg-4"  name="coupon" placeholder="Coupon Code" style="text-align: center; margin-left: 320px; ">
                                        <button type="submit" class="btn btn-primary" style=" margin-left: -55px;">Add To Cart</button>
                                    </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="order_total" style="margin-top: 10px; height: auto; text-align: center;">
                            <div class="order_total_content text-md-right col-sm-12">
                                @if(Session::has('coupon'))
                                    <div class="order_total_title col-sm-4">Order Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ Cart::Subtotal() }}</div><br>
                                    <div class="order_total_title col-sm-4">Coupon:</div>
                                    <div class="order_total_amount col-sm-4">{{ Session::get('coupon')['name'] }}
                                        <span style="float: right;"> TK {{ Session::get('coupon')['discount'] }} </span>
                                        <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a>
                                    </div>
                                @else
                                    <div class="order_total_title col-sm-4">Order Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ Cart::Subtotal() }}</div>
                                @endif
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                <div class="order_total_title col-sm-4">Shipping Charge:</div>
                                <div class="order_total_amount col-sm-4">Tk {{ $charge }} </div>
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                <div class="order_total_title col-sm-4">VAT:</div>
                                <div class="order_total_amount col-sm-4">Tk 00.00</div>
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                @if(Session::has('coupon'))
                                    <div class="order_total_title col-sm-4"> Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ Session::get('coupon')['balance'] + $charge }}</div>
                                @else
                                    <div class="order_total_title col-sm-4"> Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ $subtotal + $charge }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <a href="{{route('show.cart')}}" type="button" class="button cart_button_clear">Back</a>
                            <a href="{{route('payment.step')}}" class="button cart_button_checkout">Final Step</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>

@endsection
