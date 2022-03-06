@extends('admin/layout')
@section('page_title',"Customers")
@section('customer_class','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <p>{{ session('message') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
    <h2 class="title-1">Customers</h2>
   
    <div class="row m-t-20">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>E-MAIL</th>
                            <th>MOBILE</th>
                            <th>CITY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td>{{ $item->city }}</td>
                        <td>
                            <a href="{{ url('admin/customer/show/')}}/{{ $item->id}}"><i class="fas fa-edit ml-2 "></i></a>  
                            @if($item->status==1)
                            <a href="{{url('admin/customer/status/0')}}/{{$item->id }}"><i class="fas fa-bell text-success mx-2  "></i></a>
                         @elseif($item->status==0)
                             <a href="{{url('admin/customer/status/1')}}/{{$item->id }}"><i class="fas fa-bell-slash text-warning mx-2"></i></a>
                         @endif

                        </td>
                    </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection