@extends('admin/layout')
@section('page_title',"Size")
@section('size_class','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <p>{{ session('message') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
    <h2 class="title-1">Size</h2>
    <a href="{{ url('admin/size/manag_size')}}">
        <button type="button" class="btn btn-success mt-3">Add size</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SIZE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->size }}</td>
                        <td>
                            <a href="{{ url('admin/size/manag_size/')}}/{{ $item->id}}"><i class="fas fa-edit ml-2 "></i></a>  
                            @if($item->status==1)
                            <a href="{{url('admin/size/status/0')}}/{{$item->id }}"><i class="fas fa-bell text-success mx-2  "></i></a>
                         @elseif($item->status==0)
                             <a href="{{url('admin/size/status/1')}}/{{$item->id }}"><i class="fas fa-bell-slash text-warning mx-2"></i></a>
                         @endif
                              <a href="{{url('admin/size/delete/')}}/{{$item->id }}"><i class="fas fa-trash mr-2 text-danger"></i></a>

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