@extends('admin/layout');
@section('page_title',"Manage Catagary")
@section('catagary_class','active')
@section('container')
    <h2 class="title-1">Manage Catagary</h2>
    <a href="{{ url('admin/catagary') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-9">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('catagary.manag_catagary_procces')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="catagary" class="control-label mb-1">Catagary name</label>
                                <input id="catagary" name="catagary_name" value="{{$catagary_name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('catagary_name')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="catagary_slug" class="control-label mb-1">Catagary Slug</label>
                                <input id="catagary_slug" name="catagary_slug" value="{{$catagary_slug}}"  type="text" class="form-control catagary_slug valid" required  >
                                @error('catagary_slug')
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