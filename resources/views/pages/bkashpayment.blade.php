@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">
    @php
        $setting=Illuminate\Support\Facades\DB::table('settings')->skip(1)->first();
        $charge=$setting->shipping_charge;
        $subtotal = str_replace(',', '', Cart::subtotal())
    @endphp

    <div class="contact_form" style="background-color: #9dc8e2;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 " style=" border: 5px solid grey; padding: 20px; font-style: italic; background-color: #000046; color: grey; font-weight: bold">
                    <div class="contact_form_container">
                        <div class="cart_items " style="">
                            <ul class="cart_list" style="line-height: 1; text-align: center;">
                                @foreach($cart as $row)
                                    <li class="cart_item clearfix " >
                                        <div class="cart_item_image "><img src="{{asset($row->options->image)}}" style="height: 120px;"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between"  >
                                            <div class="cart_item_name cart_info_col col-sm-2" style="text-align: center;">
                                                <div class="cart_item_title" style="color: grey;">Name</div>
                                                <div class="cart_item_text" style="font-size: 12px;">{{$row->name}}</div>
                                            </div>
                                            @if($row->options->color == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title" style="color: grey;">Color</div>
                                                    <div class="cart_item_text" style="font-size: 12px;">
                                                        {{$row->options->color}}
                                                    </div>
                                                </div>
                                            @endif
                                            @if($row->options->size == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col col-sm-1" style="text-align: center;">
                                                    <div class="cart_item_title" style="color: grey;">Size</div>
                                                    <div class="cart_item_text" style="font-size: 12px;">
                                                        {{$row->options->size}}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col col-sm-2" style="text-align: center;">
                                                <div class="cart_item_title" style="color: grey;">Quantity</div>
                                                <div class="cart_item_text" style="font-size: 12px;">
                                                    {{ $row->qty }}
                                                </div>
                                            </div>
                                            <div class="cart_item_price cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title" style="color: grey;">Price</div>
                                                <div class="cart_item_text" style="font-size: 12px;">TK {{$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col col-sm-1" style="text-align: center;">
                                                <div class="cart_item_title" style="color: grey;">Total</div>
                                                <div class="cart_item_text" style="font-size: 12px;">Tk {{$row->price * $row->qty}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="order_total" style="margin-top: 10px; height: auto; text-align: center;">
                            <div class="order_total_content text-md-right col-sm-12">
                                @if(Session::has('coupon'))
                                    <div class="order_total_title col-sm-4" style="color: grey;">Order Total:</div>
                                    <div class="order_total_amount col-sm-4" >Tk {{ Cart::Subtotal() }}</div><br>
                                    <div class="order_total_title col-sm-4" style="color: grey;">Coupon:</div>
                                    <div class="order_total_amount col-sm-4">[{{ Session::get('coupon')['name'] }}]
                                        <span style="float: right;"> TK {{ Session::get('coupon')['discount'] }} </span>
                                    </div>
                                @else
                                    <div class="order_total_title col-sm-4" style="color: grey;">Order Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ Cart::Subtotal() }}</div>
                                @endif
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                <div class="order_total_title col-sm-4" style="color: grey;">Shipping Charge:</div>
                                <div class="order_total_amount col-sm-4">Tk {{ $charge }} </div>
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                <div class="order_total_title col-sm-4" style="color: grey;">VAT:</div>
                                <div class="order_total_amount col-sm-4">Tk 00.00</div>
                            </div>
                            <div class="order_total_content text-md-right col-sm-12" >
                                @if(Session::has('coupon'))
                                    <div class="order_total_title col-sm-4" style="color: grey;"> Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ Session::get('coupon')['balance'] + $charge }}</div>
                                @else
                                    <div class="order_total_title col-sm-4" style="color: grey;"> Total:</div>
                                    <div class="order_total_amount col-sm-4">Tk {{ $subtotal + $charge }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 " style="border: 5px solid grey; padding: 20px; font-style: italic; background-color: #000046; color: grey; font-weight: bold">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center" >Shipping Address <br> Bkash Number are-<br> 01643050375(personal)</div>
                        <form action="{{ route('outsidepayment.process') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group icon_parent">
                                <label for="uname">Full Name</label>
                                <input type="text" class="form-control " name="name"  autofocus placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                                       aria-describedby="emailHelp" placeholder="Phone" required="" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                       aria-describedby="emailHelp" placeholder="Email" required="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="address" required=""  placeholder="Address">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control" name="city" required="" placeholder="City" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bkash Number(Customer)</label>
                                <input type="text" class="form-control @error('transaction_number') is-invalid @enderror" name="transaction_number" value="{{ old('transaction_number') }}"
                                       aria-describedby="emailHelp" placeholder="transaction_number" required="" >
                                @error('Transaction Number')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Transaction ID(Bkash)</label>
                                <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" name="transaction_id" value="{{ old('transaction_id') }}"
                                       aria-describedby="emailHelp" placeholder="transaction_id" required="">
                                @error('Transaction ID')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount of Money(bkash amount)</label>
                                <input type="text" class="form-control" name="money" required="" placeholder="money" >
                            </div><hr>
                            <div class="contact_form_title text-center" >Confirm Order</div>
                            <div class="form-group" style="text-align: center;">
                                <label for="exampleInputEmail1">To Buy</label>
                                <ul class="logos_list">
                                    <!--<li><input  type="radio" name="payment" value="stripe"><img src="{{asset('public/frontend/images/logos_1.png')}}" alt=""></li>
                                    <li><input  type="radio" name="payment" value="visa"><img src="{{asset('public/frontend/images/logos_2.png')}}" alt=""></li>
                                    <li><input  type="radio" name="payment" value="paypal"><img src="{{asset('public/frontend/images/logos_3.png')}}" alt=""></li>-->
                                    <li><input  type="radio" name="payment" value="Bkash"><img style="width: 30%" src="{{asset('public/frontend/images/bkash.jpg')}}" alt=""></li>
                                </ul>
                            </div>

                            <div class="contact_form_button col-sm-7" style="margin-left: 170px;">
                                <button type="submit" class="btn btn-info">Buy Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection

