@extends('admin/layout');
@section('page_title',"Manage Coupon")
@section('coupon_class','active')
@section('container')
    <h2 class="title-1">Manage Coupon </h2>
    <a href="{{ url('admin/coupon') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-12">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('coupon.manag_coupon_procces')}}" method="post" >
                            @csrf
                           <div class="from-group">
                               <div class="row">
                                   <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="title" class="control-label mb-1"> Title</label>
                                            <input id="title" name="title" value="{{$title}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                            @error('title')
                                            <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                            @enderror
                                        </div>
                                   </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="code" class="control-label mb-1">Code</label>
                                            <input id="code" name="code" value="{{$code}}"  type="text" class="form-control  valid" required  >
                                            @error('code')
                                            <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                                           @enderror
                                        </div>
                                    </div>

                               </div>
                               <div class="row">
                                   <div class="col-md-12 col-lg-3">
                                    <label for="type" class="control-label ">Type</label>
                                    <select name="type" id="type" class="form-control" required>
                                        @if($type=="rupees")
                                        <option selected value="rupees">Rupees</option>
                                        <option  value="Percentage">Percentage</option>
                                        @else
                                        <option  value="Percentage">Percentage</option>
                                        <option  value="rupees">Rupees</option>
                                        @endif
                                    </select>

                                   </div>
                                   <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="value" class="control-label mb-1">Value</label>
                                        <input id="value" name="value" value="{{$value}}"  type="text" class="form-control  valid" required  >
                                        @error('value')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                                       @enderror
                                    </div> 
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="min_order_amt" class="control-label mb-1">Mininum Order Amount </label>
                                        <input id="min_order_amt" name="min_order_amt" min_order_amt="{{$min_order_amt}}"  type="number" class="form-control  valid" required  >
                                        @error('min_order_amt')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                                       @enderror
                                    </div> 
                                       
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="is_one_time" class="control-label ">Is One Time</label>
                                        <select name="is_one_time" id="is_one_time" class="form-control" required>
                                            @if($is_one_time=="1")
                                            <option selected value="1">Yes</option>
                                            <option  value="0">No</option>
                                            @else
                                            <option value="0">No</option>
                                            <option   value="1">Yes</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                               </div>
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