@extends('admin/layout');
@section('page_title',"Manage brand")
@section('brand_class','active')
@section('container')
@if($id>0)
    {{ $image_required="" }}
@else
    {{ $image_required=`required` }}

@endif
    <h2 class="title-1">Manage Brand</h2>

    <a href="{{ url('admin/brand') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-9">
           
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('brand.manag_brand_procces')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Brand  name</label>
                                <input id="name" name="name" value="{{$name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('name')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Brand image</label>
                                <input id="image" name="image"  type="file" class="form-control" {{ $image_required }} aria-required="true" aria-invalid="false" required >
                                <a href="{{ asset('storage/media/brand/'.$image) }}"  target="__blank"><img width="200px" src="{{ asset('storage/media/brand/'.$image) }}" alt=""></a>
                            </div>
                            @error('image')
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <p>{{ $message  }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @enderror

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