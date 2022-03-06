@extends('admin/layout');
@section('page_title',"Manage Home Banner")
@section('homeBanner_class','active')
@section('container')

    <h2 class="title-1">Manage Home Banner</h2>

    <a href="{{ url('admin/homeBanner') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-11">
            @if($id>0)
            {{ $image_required="" }}
        @else
            {{ $image_required=`required` }}
        
        @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('homeBanner.manag_homeBanner_procces')}}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Brand image</label>
                                <input id="image" name="image"  type="file" class="form-control mb-1"  aria-required="true" aria-invalid="false" {{ $image_required }} >
                                <a href="{{ asset('storage/media/homeBanner/'.$image) }}"  target="__blank"><img width="450px" src="{{ asset('storage/media/homeBanner/'.$image) }}" alt=""></a>
                            </div>
                            @error('image')
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <p>{{ $message  }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="btn_text" class="control-label mb-1">Brand  Button Text</label>
                                <input id="btn_text" name="btn_text" value="{{$btn_text}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('btn_text')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="btn_link" class="control-label mb-1">Brand Button Link</label>
                                <input id="btn_link" name="btn_link" value="{{$btn_link}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('btn_link')
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