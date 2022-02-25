@extends('admin/layout');
@section('page_title',"Manage tax")
@section('tax_class','active')
@section('container')
    <h2 class="title-1">Manage tax</h2>
    <a href="{{ url('admin/tax') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-9">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('tax.manag_tax_procces')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="tax_value" class="control-label mb-1">Tax Value</label>
                                <input id="tax_value" name="tax_value" value="{{$tax_value}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('tax_value')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="tax_desc" class="control-label mb-1">Tax Description</label>
                                <input id="tax_desc" name="tax_desc" value="{{$tax_desc}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                            <div>
                                <button id="" type="submit" class="btn btn-lg btn-info btn-block mt-2">
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