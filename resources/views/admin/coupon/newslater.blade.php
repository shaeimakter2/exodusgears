@extends('admin.admin_layouts')
@section('admin_content')


    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscriber Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Subscriber list
                    <a href="#" class="btn btn-sm btn-danger " style="float: right;" id="delete">All Delete</a>
                </h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Subscribing Time</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $row)
                            <tr>
                                <td><input type="checkbox" name="">{{$row->id}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <a href="{{URL::to('delete/sub/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div>




@endsection
