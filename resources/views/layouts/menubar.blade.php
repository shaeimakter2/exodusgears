<!-- Main Navigation -->
@php
  $category=\Illuminate\Support\Facades\DB::table('categories')->get();
@endphp
<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </div>
                        </div>

                        <ul class="cat_menu">
                         @foreach($category as $cat)
                            <li class="hassubs">
                                <a href="">{{$cat->category_name}}</a>
                                <ul>
                                    @php
                                       $subcategory=\Illuminate\Support\Facades\DB::table('subcategories')->where('category_id',$cat->id)->get();
                                    @endphp
                                    @foreach($subcategory as $row)
                                    <li class="hassubs">
                                        <a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}<i class="fa fa-chevron-right"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                          @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav top Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="#">Home<i class="fa fa-chevron-down"></i></a></li>
                            <!--<li class="hassubs">
                                <a href="#">Super Deals<i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="hassubs">
                                <a href="#">Featured Brands<i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                </ul>
                            </li>-->
                            <!--<li class="hassubs">
                                <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </li>-->
                            <li><a href="{{route('blog.post')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Menu mobile-->

    <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page_menu_content">
                            
                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            
                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="https://colorlib.com/cdn-cgi/l/email-protection#fd9b9c8e898e9c91988ebd9a909c9491d39e9290"><span class="__cf_email__" data-cfemail="5f393e2c2b2c3e333a2c1f38323e3633713c3032">[email&#160;protected]</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</header>
@php
  $slider=\Illuminate\Support\Facades\DB::table('products')->join('brands','products.brand_id','brands.id')
            ->select('products.*','brands.brand_name')->where('products.main_slider',1)->orderByDesc('id')->first();
@endphp
<!-- Banner -->

<div class="banner">
    <div class="banner_background" style="background-image:url({{asset('public/frontend/images/banner_background.jpg')}})"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img src="{{asset( $slider->image_one)}}" alt=""></div>
            <div class="col-lg-6 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">{{$slider->Product_name}}</h1>
                    <div class="banner_price">
                        @if($slider->discount_price == NULL)
                            <h2>Tk {{ $slider->selling_price }}</h2>
                        @else
                            <span>Tk {{ $slider->selling_price }}</span>Tk {{ $slider->discount_price }}
                        @endif
                    </div>
                    <div class="banner_product_name">{{ $slider->brand_name }}</div>
                    <div class="button banner_button"><a href="#">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
