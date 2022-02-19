@extends('admin/layout');
@section('page_title',"Manage color")
@section('color_class','active')
@section('container')
    <h2 class="title-1">Manage Color</h2>
    <a href="{{ url('admin/color') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-9">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('color.manag_color_procces')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="color" class="control-label mb-1">color</label>
                                <input id="color" name="color" value="{{$color}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('color')
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