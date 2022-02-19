@extends('admin/layout');
@section('page_title',"Manage Coupon")
@section('coupon_class','active')
@section('container')
    <h2 class="title-1">Manage Coupon </h2>
    <a href="{{ url('admin/coupon') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-9">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('coupon.manag_coupon_procces')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1"> Title</label>
                                <input id="title" name="title" value="{{$title}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('title')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input id="code" name="code" value="{{$code}}"  type="text" class="form-control  valid" required  >
                                @error('code')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                               @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="value" class="control-label mb-1">Value</label>
                                <input id="value" name="value" value="{{$value}}"  type="text" class="form-control  valid" required  >
                                @error('value')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                               @enderror
                            </div>

                            <div>
                                <button id="" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                                <input type="hidden" name="id" value="{{ $id }}" id="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection