@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">
    <script src="https://js.stripe.com/v3/"></script>
    <style type="text/css">
        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    @php
        $setting=Illuminate\Support\Facades\DB::table('settings')->first();
        $charge=$setting->shipping_charge;
        $subtotal = str_replace(',', '', Cart::subtotal());
        $cart=Cart::content();
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
                        <div class="contact_form_title text-center" >Pay Now</div>

                        <form action="{{ route('stripe.charge') }}" method="post" id="payment-form" style="border: 1px solid grey; padding: 20px;">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div><br>
                            {{--   extra data --}}
                            <input type="hidden" name="shipping" value="{{ $charge }}">
                            <input type="hidden" name="vat" value="0">
                            <input type="hidden" name="total" value="{{ $subtotal + $charge }}">
                            {{-- shipping details pass --}}
                            <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                            <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                            <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                            <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                            <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                            <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">
                            <button class="btn btn-info">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_2hQ55fBqMuRip6PMXJRKojsg');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
