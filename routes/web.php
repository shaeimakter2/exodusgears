<?php

//home or single auth route-----------
Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//payment methods
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@STripeCharge')->name('stripe.charge');
Route::post('user/Cash/charge/','PaymentController@CashCharge')->name('cash.charge');
Route::post('user/Bkash/charge/','PaymentController@BkashCharge')->name('bkash.charge');

Route::get('success/list/','PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}','PaymentController@RequestReturn');




//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//admin section--------------
//categories--------------------
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@Editcategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@Updatecategory');
//brands=========
Route::get('admin/brands', 'Admin\Category\CategoryController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\CategoryController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\CategoryController@Deletebrand');
Route::get('edit/brand/{id}', 'Admin\Category\CategoryController@Editbrand');
Route::post('update/brand/{id}', 'Admin\Category\CategoryController@Updatebrand');
//subcategory========
Route::get('admin/sub/category', 'Admin\Category\CategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\CategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\CategoryController@Deletesubcat');
Route::get('edit/subcategory/{id}', 'Admin\Category\CategoryController@Editsubcat');
Route::post('update/subcategory/{id}', 'Admin\Category\CategoryController@Updatesubcat');
//coupon-------
Route::get('admin/sub/coupon', 'Admin\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\CouponController@Deletecoupon');
Route::get('edit/coupon/{id}', 'Admin\CouponController@Editcoupon');
Route::post('update/coupon/{id}', 'Admin\CouponController@Updatecoupon');
//newslater-------
Route::get('admin/newslater', 'Admin\CouponController@newslater')->name('admin.newslater');
Route::get('delete/sub/{id}', 'Admin\CouponController@Deletesub');
//product roue-------------
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('view/product/{id}', 'Admin\ProductController@viewproduct');
Route::get('edit/product/{id}', 'Admin\ProductController@editproduct');
Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@updateproduct');
Route::post('update/product/photo/{id}', 'Admin\ProductController@updateproductphoto');
Route::get('delete/product/{id}', 'Admin\ProductController@deleteproduct');


//Blogs post
Route::get('admin/add/post', 'Admin\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Admin\PostController@store')->name('store.post');
Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}', 'Admin\PostController@destroy');
Route::get('edit/post/{id}', 'Admin\PostController@editpost');
Route::post('update/post/{id}', 'Admin\PostController@updatepost');

//admin order post====
Route::get('admin/pending/order', 'Admin\OrderController@neworder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@vieworder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@acceptpaymentorder')->name('admin.accept.payment');
Route::get('admin/cancel/order', 'Admin\OrderController@cancelorder')->name('admin.cancel.order');
Route::get('admin/progress/payment', 'Admin\OrderController@progersspaymentorder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@successpaymentorder')->name('admin.success.payment');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');

//wishlist===
Route::get('add/wishlist/{id}', 'WishlistController@addwishlist');

//cart-------
Route::get('add/to/cart/{id}', 'CartController@addCart');
Route::get('check', 'CartController@check');
Route::get('product/cart', 'CartController@showcart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/in-side-dhaka/checkout/','CartController@checkout')->name('user.checkout');
Route::get('user/Out-side-dhaka/checkout/','CartController@outsidecheckout')->name('user.outsidecheckout');
Route::get('user/wishlist/','CartController@wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@couponremove')->name('coupon.remove');
Route::get('payment/page/','CartController@paymentpage')->name('payment.step');
Route::get('out-side-dhaka/payment/page/','CartController@outsidepaymentpage')->name('outsidepayment.step');

//payment methods
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/out-side-dhaka/payment/process/','PaymentController@outsidepayment')->name('outsidepayment.process');


//blog route
Route::get('blog/post', 'BlogController@blog')->name('blog.post');
Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('language/bangla', 'BlogController@bangla')->name('language.bangla');

//get sub cate by ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

//frontend are where==========
Route::post('store/newslater', 'FrontController@storenewslater')->name('store.newslater');
Route::post('product/search', 'FrontController@productsearch')->name('product.search');
Route::get('product/details/{id}/{product_name?}', 'ProductController@productview');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

Route::get('/products/{id}', 'ProductController@productsView');

//customar profile related route=====

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
