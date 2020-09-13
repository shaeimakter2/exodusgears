@extends('admin.admin_layouts')
@section('admin_content')



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Order Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
        
          <p class="mg-b-20 mg-sm-b-30">Order Details</p>
         
         <div class="row">
         	<div class="col-md-6">
         	    <div class="card">
         	        <div class="card-header"><strong>Order</strong> Details</div>

         	        <div class="card-body" style="background-color:  #0c525d">
                        <table class="table" style="background-color: #000046;">
                             <tr>
                                <th style="font-style: italic; font-size: 20px;">Name: </th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->name }}</th>
                             </tr>
                             <tr>
                                <th style="font-style: italic; font-size: 20px;">Phone: </th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->phone }}</th>
                             </tr>
                             <tr>
                                <th style="font-style: italic; font-size: 20px;">Payment: </th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->payment_type }}</th>
                             </tr>
                             <tr>
                                <th style="font-style: italic; font-size: 20px;">Payment ID: </th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->payment_id }}</th>
                             </tr>
                             <tr>
                                <th style="font-style: italic; font-size: 20px;">Total :</th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->total }} $</th>
                             </tr>
                              <tr>
                                <th style="font-style: italic; font-size: 20px;">Month : </th>
                                <th style="font-style: italic; font-size: 20px;">
                                      {{ $order->month }}
                                </th>
                             </tr>
                              <tr>
                                <th style="font-style: italic; font-size: 20px;">Date: </th>
                                <th style="font-style: italic; font-size: 20px;">{{ $order->date }}</th>
                             </tr>
                        </table>

         	        </div>
         	    </div>
         	</div>
         	<div class="col-md-6">
         	    <div class="card">
         	        <div class="card-header"><strong>Shipping</strong> Details</div>

         	        <div class="card-body" style="background-color: #0c525d">
         	    	<table class="table" style="background-color: #000046;">
         	    		 <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">Name: </th>
         	    		 	<th style="font-style: italic; font-size: 20px;">{{ $shipping->ship_name }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">Phone: </th>
         	    		 	<th style="font-style: italic; font-size: 20px;">{{ $shipping->ship_phone }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">Email: </th>
         	    		 	<th style="font-style: italic; font-size: 20px;"> {{ $shipping->ship_email }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">Address: </th>
         	    		 	<th style="font-style: italic; font-size: 20px;">{{ $shipping->ship_address }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">City :</th>
         	    		 	<th style="font-style: italic; font-size: 20px;">{{ $shipping->ship_city }}</th>
         	    		 </tr>
         	    		  <tr>
         	    		 	<th style="font-style: italic; font-size: 20px;">Status : </th>
         	    		 	<th>
         	    		 		    @if($order->status == 0)
         	    		 		     <span class="badge badge-warning" style="font-style: italic; font-size: 20px;">Pending</span>
         	    		 		    @elseif($order->status == 1)
         	    		 		    <span class="badge badge-info" style="font-style: italic; font-size: 20px;">Payment Accept</span>
         	    		 		    @elseif($order->status == 2) 
         	    		 		     <span class="badge badge-info" style="font-style: italic; font-size: 20px;">Progress </span>
         	    		 		     @elseif($order->status == 3)  
         	    		 		     <span class="badge badge-success" style="font-style: italic; font-size: 20px;">Delevered </span>
         	    		 		     @else
         	    		 		     <span class="badge badge-danger" style="font-style: italic; font-size: 20px;">Cancel </span>
         	    		 		     @endif
         	    		 	</th>
         	    		 </tr>
         	    		  
         	    	</table>  

         	        </div>
         	    </div>
         	</div>
         </div>
          
         <div class="row">
         	<div class="card pd-20 pd-sm-40 col-lg-12">
         	  <h6 class="card-body-title" style="font-style: italic; font-size: 20px;">Product Details </h6>
         	  <br>
         	  <div class="table-wrapper">
         	    <table  class="table display responsive nowrap">
         	      <thead>
         	        <tr >
         	          <th class="wd-15p" >Product ID</th>
         	          <th class="wd-15p" >Product Name</th>
         	          <th class="wd-15p" >Image</th>
         	          <th class="wd-15p">Color </th>
         	          <th class="wd-10p">Size</th>
         	          <th class="wd-10p">Quantity</th>
         	          <th class="wd-10p">Unit Price</th>
         	          <th class="wd-10p">Total</th>
         	        </tr>
         	      </thead>
         	      <tbody>
         	        @foreach($details as $row)
         	        <tr>
         	          <td >{{ $row->product_code }}</td>
         	          <td >{{ $row->product_name }}</td>
         	          <td ><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
         	          <td >{{ $row->color }}</td>
         	          <td >{{ $row->size }}</td>
         	          <td >{{ $row->quantity }}</td>
         	          <td >
         	          	TK {{ $row->singleprice }}
         	          	
         	          </td>
         	          <td >
         	             TK {{ $row->totalprice }}
         	          	
         	          </td>
         	         
         	        </tr>
         	        @endforeach
         	      </tbody>
         	    </table>
         	  </div><!-- table-wrapper -->
         	</div><!-- card -->
         </div>
       	

       	  @if($order->status == 0)
              <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">Payment Accept</a>
              <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger" id="delete">Cancel Order</a>
          @elseif($order->status == 1)
              <a href="{{ url('admin/delevery/progress/'.$order->id) }}" class="btn btn-info">Delevery Progress</a>
              <strong> Payment Already Checked and pass here for delevery request</strong>
          @elseif($order->status == 2)
               <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success">Delevered Done</a>
               <strong> Payment Already done your product are handover successfully</strong>
          @elseif($order->status == 4)
            <strong class="text-danger">This order are not valid its canceled</strong>
            @else
             <strong class="text-success">This product are succesfully delevered</strong>
            @endif
                 
      </div>
    </div>
    </div>




@endsection
