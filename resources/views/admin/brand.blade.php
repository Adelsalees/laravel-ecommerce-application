@extends('admin/layout')
@section('page_title',"Brands")
@section('brand_class','active')
@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <p>{{ session('message') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <h2 class="title-1">Brands</h2>
        <a href="{{ url('admin/brand/manag_brand') }}">
        <button type="button" class="btn btn-success mt-3">Add brand</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><a href="{{ asset('storage/media/brand/'.$item->image) }}"  target="__blank"><img width="200px" src="{{ asset('storage/media/brand/'.$item->image) }}" alt=""></a></td>
                        <td>
                              <a href="{{ url('admin/brand/manag_brand/')}}/{{ $item->id}}"><i class="fas fa-edit  "></i></a>  
                              @if($item->status==1)
                                 <a href="{{url('admin/brand/status/0')}}/{{$item->id }}"><i class="fas fa-bell text-success mx-2  "></i></a>
                              @elseif($item->status==0)
                                  <a href="{{url('admin/brand/status/1')}}/{{$item->id }}"><i class="fas fa-bell-slash text-warning mx-2"></i></a>
                              @endif
                              <a href="{{url('admin/brand/delete/')}}/{{$item->id }}"><i class="fas fa-trash mr-2 text-danger"></i></a>
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