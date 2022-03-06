@extends('admin/layout');
@section('page_title',"Manage Catagary")
@section('catagary_class','active')
@section('container')
@if($id>0)
    {{ $image_required="" }}
@else
    {{ $image_required=`required` }}

@endif
    <h2 class="title-1">Manage Catagary</h2>
    <a href="{{ url('admin/catagary') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('catagary.manag_catagary_procces')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="catagary" class="control-label mb-1">Catagary name</label>
                                            <input id="catagary" name="catagary_name" value="{{$catagary_name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                            @error('catagary_name')
                                            <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group  ">
                                            <label for="parent_id" class="control-label ">Parent Catagary</label>
                                            <select name="parent_id" id="parent_id" class="form-control" required>
                                                <option value="0">-- Select Catagaries --</option>
                                                @foreach($catagaries as $item)
                                                @if($item->id==$parent_id)
                                                    <option selected value="{{$item->id}}">{{ $item->catagary_name }}</option>
                                                @else
                                                    <option  value="{{$item->id}}">{{ $item->catagary_name }}</option>
                                                @endif
                                                @endforeach
            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group ">
                                            <label for="catagary_slug" class="control-label mb-1">Catagary Slug</label>
                                            <input id="catagary_slug" name="catagary_slug" value="{{$catagary_slug}}"  type="text" class="form-control catagary_slug valid" required  >
                                            @error('catagary_slug')
                                            <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                                        @enderror
                                        </div>
                                        <div>
                                    </div>
                                    
                            </div>
                            <div class="row ml-1">
                                <div class="col-12">
                                   <div class="form-group">
                                    <div class="form-group">
                                        <label for="catagary_image" class="control-label ">Catagary Image</label>
                                        <input id="catagary_image" name="catagary_image" value="{{$catagary_image}}" type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                        @enderror
                                        @if($catagary_image!="")
                                        <a href="{{ asset('storage/media/catagary/'.$catagary_image) }}" target="__blank"><img width="200px" src="{{ asset('storage/media/catagary/'.$catagary_image) }}" alt=""></a>
                                        @endif
                                    </div>
                                 </div>
                                </div>
                            </div>
                          <div class="row w-100 ml-1">
                           <div class="col-12">
                            <div class="form-group">
                                <label for="is_home" class="control-label ">Show in home page</label>
                                @if($is_home==1)
                                <input type="checkbox" name="is_home" checked  id="is_home">
                                @else
                                <input type="checkbox" name="is_home"  style="margin-top:5px" id="is_home">
                                @endif
                            </div>
                           </div>
                          </div>

                            
                           
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