@extends('admin.admin_layouts')

@section('admin_content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <p class="mg-b-20 mg-sm-b-30">product details</p>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                       <tbody>
                                        <tr>
                                            <td>Product Name</td>
                                            <td>{{$product->Product_name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Product Code</td>
                                            <td>{{$product->Product_code}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Product Quantity</td>
                                            <td>{{$product->Product_quantity}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Category Name</td>
                                            <td>{{$product->category_name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>SubCategory Name</td>
                                            <td>{{$product->subcategory_name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Brand Name</td>
                                            <td>{{$product->brand_name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Product Size</td>
                                            <td>{{$product->Product_size}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Product Color</td>
                                            <td>{{$product->Product_color}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Selling Price</td>
                                            <td>{{$product->selling_price}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Product Detail</td>
                                            <td>{!! $product->Product_details !!}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <lebel style="border: 1px solid grey; padding: 10px;">Image One (Main Thumbnail)<span class="tx-danger"></span></lebel>
                                <label class="custom-file">
                                    <img src="{{URL::to($product->image_one)}}" style="height: 80px; width: 80px;" id="one" >
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <lebel style="border: 1px solid grey; padding: 10px;">Image Two <span class="tx-danger"></span></lebel>
                                <label class="custom-file">
                                    <img src="{{URL::to($product->image_two)}}" style="height: 80px; width: 80px;" id="two" >
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <lebel style="border: 1px solid grey; padding: 10px;">Image Three <span class="tx-danger"></span></lebel>
                                <label class="custom-file">
                                    <img src="{{URL::to($product->image_three)}}" style="height: 80px; width: 80px;" id="three" >
                                </label>
                            </div>
                        </div><!-- row -->
                        <br><hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="">
                                @if($product->main_slider == 1)
                                        <span class="badge badge-success">Active</span> |
                                @else
                                        <span class="badge badge-danger">Inactive</span> |
                                @endif
                                    <span>Main Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="">
                                    @if($product->hot_deal == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Hot Deal</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="">
                                    @if($product->best_rated == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Best Rated</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="">
                                    @if($product->trend == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Trend Product</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="">
                                    @if($product->mid_slider == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Mid Slider</span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="">
                                    @if($product->hot_new == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Hot New</span>
                                </label>
                            </div>

                     {{--    <div class="col-lg-4">
                                <label class="">
                                    @if($product->hot_new == 1)
                                        <span class="badge badge-success">Active</span> |
                                    @else
                                        <span class="badge badge-danger">Inactive</span> |
                                    @endif
                                    <span>Buy One Get One</span>
                                </label>
                            </div>--}}

                        </div>
                    </div>
            </div>
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
