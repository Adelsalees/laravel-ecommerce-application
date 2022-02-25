@extends('admin/layout');
@section('page_title',"Manage Product")
@section('product_class','active')
@section('container')
@if($id>0)
    {{ $image_required="" }}
@else
    {{ $image_required=`required` }}

@endif
    <h2 class="title-1">Manage Product</h2>
    @if(session()->has('sku_error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <p>{{ session('sku_error')  }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @error('image_attr.*')
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <p>{{ $message  }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @enderror
    @error('images.*')
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <p>{{ $message  }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @enderror
    <a href="{{ url('admin/product') }}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="row m-t-20">
        <div class="col-md-12">
            <form action="{{route('product.manag_product_procces')}}" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="control-label ">product name</label>
                                        <input id="name" name="name" value="{{$name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                        @enderror
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="slug" class="control-label ">Slug</label>
                                        <input id="slug" name="slug" value="{{$slug}}"  type="text" class="form-control" required  >
                                        @error('slug')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>   
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label ">product image</label>
                                        <input id="image" name="image" value="{{$image}}" type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>     
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-lg-4 ">
                                            <label for="catagary_id" class="control-label ">Catagary</label>
                                            <select name="catagary_id" id="catagary_id" class="form-control" required>
                                                <option value="">-- Select Catagaries --</option>
                                                @foreach($catagary as $item)
                                                @if($item->id==$catagary_id)
                                                     <option selected value="{{$item->id}}">{{ $item->catagary_name }}</option>
                                                @else
                                                     <option  value="{{$item->id}}">{{ $item->catagary_name }}</option>
                                                @endif
                                                @endforeach
            
                                            </select>
                                        </div>
                                        <div class="form-group has-success col-sm-12 col-lg-4 ">
                                            <label for="brand" class="control-label ">Brand</label>
                                            <select name="brand" id="brand" class="form-control" required>
                                                <option value="">-- Select Brand --</option>
                                                @foreach($brands as $item)
                                                @if($item->id==$brand)
                                                     <option selected value="{{$item->id}}">{{ $item->name }}</option>
                                                @else
                                                     <option  value="{{$item->id}}">{{ $item->name }}</option>
                                                @endif
                                                @endforeach
            
                                            </select>

                                        </div>

                                        <div class="form-group has-success col-sm-12 col-lg-4">
                                            <label for="model" class="control-label ">Model</label>
                                            <input id="model" name="model" value="{{$model}}"  type="text" class="form-control" required  >
                                        </div>
                                    </div>
                                
                                    <div class="form-group has-success">
                                        <label for="short_desc" class="control-label ">Short discription </label>
                                        <textarea id="short_desc" name="short_desc" v  class="form-control" required >{{$short_desc}}</textarea>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="desc" class="control-label ">Discription </label>
                                        <textarea id="desc" name="desc" class="form-control" required aria-required="true">{{$desc}}</textarea>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="keyword" class="control-label ">Keyword </label>
                                        <textarea id="keyword" name="keyword" class="form-control" required  aria-required="true">{{$keyword}}</textarea>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="technical_spec" class="control-label ">Technical specification </label>
                                        <textarea id="technical_spec" name="technical_spec" class="form-control" required aria-required="true">{{$technical_spec}}</textarea>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="uses" class="control-label ">Uses </label>
                                        <textarea id="uses" name="uses" class="form-control" required aria-required="true" >{{$uses}}</textarea>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="warranty" class="control-label ">Warranty </label>
                                        <textarea id="warranty" name="warranty" class="form-control" aria-required="true" required >{{$warranty}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="lead_time" class="control-label ">Lead Time</label>
                                                    <input id="lead_time" name="lead_time" value="{{$lead_time}}"  type="text" class="form-control" required  >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="tax_id" class="control-label ">Tax</label>
                                                    <select name="tax_id" id="tax_id" class="form-control" required>
                                                        <option value="">-- Select tax --</option>
                                                        @foreach($taxs as $item)
                                                        @if($item->id==$tax_id)
                                                             <option selected value="{{$item->id}}">{{ $item->tax_desc }}</option>
                                                        @else
                                                             <option  value="{{$item->id}}">{{ $item->tax_desc }}</option>
                                                        @endif
                                                        @endforeach
                    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="is_promo" class="control-label ">Is promotional</label>
                                                    <select name="is_promo" id="is_promo" class="form-control" required>
                                                        @if($is_promo=="1")
                                                        <option selected value="1">Yes{{ $is_promo }}</option>
                                                        <option  value="0">No</option>
                                                        @else
                                                        <option value="0">No</option>
                                                        <option   value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="is_featured" class="control-label ">Featured</label>
                                                    <select name="is_featured" id="is_featured" class="form-control" required>
                                                        @if($is_featured=="1")
                                                        <option selected value="1">Yes</option>
                                                        <option  value="0">No</option>
                                                        @else
                                                        <option value="0">No</option>
                                                        <option   value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="is_discounded" class="control-label ">Discount Available</label>
                                                    <select name="is_discounded" id="is_discounded" class="form-control" required>
                                                        @if($is_discounded=="1")
                                                        <option selected value="1">Yes</option>
                                                        <option  value="0">No</option>
                                                        @else
                                                        <option value="0">No</option>
                                                        <option   value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="is_trending" class="control-label ">Trending</label>
                                                    <select name="is_trending" id="is_trending" class="form-control" required>
                                                        @if($is_trending=="1")
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
                                    </div>
                            </div>
                        </div>
                    </div>
                     {{-- product images --}}
                     <div class="col-lg-12">
                        <h2 class="title-2 pb-2">PRODUCT IMAGES</h2>

                        <div class="card">
                            <div class="card-body" id="product_image">
                                @php
                                $loop_count=1;
                                $loop_Image_count=1;
                                @endphp
                               @foreach($productImageArr as $key=>$val)
                               
                               @php
                                    $pIArr=(array)$val;
                                    @endphp
                                    <input id="piid" name="piid[]" value="{{ $pIArr['id'] }}"  type="hidden" class="form-control"  >
                                <div class="form-group">
                                    <div class="form-group row" id="product_images{{ $loop_Image_count++ }}">
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <label for="images" class="control-label ">product images</label>
                                            <input id="images" name="images[]"  type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                            @if($pIArr['images']!="")
                                            <a href="{{ asset('storage/media/'.$pIArr['images']) }}" target="__blank"><img width="200px" src="{{ asset('storage/media/'.$pIArr['images']) }}" alt=""></a>
                                            @endif
                                        </div>
                                        @if($loop_Image_count==2)
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <button style="margin-top: 30px" type="button" onclick="add_images_more()" class="btn btn-success btn-lg "><i class="fa-solid fa-plus mr-2"></i>ADD</button>
                                        </div>
                                        @else
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <a href="{{url('admin/product/product_image_delete/')}}/{{ $pIArr['id'] }}/{{ $id }}"><button style="margin-top: 30px" type="button" onclick="remove_attr('{{ $loop_Image_count-1 }}')"  class="btn btn-danger btn-lg "><i class="fa-solid fa-minus"></i> REMOVE</button></a>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- product attribute --}}
                    <div class="col-lg-12" id="attribute">
                        <h2 class="title-2 pb-2">PRODUCT ATTRIBUTE</h2>
                        @php
                         $loop_count=1;
                         

                        @endphp
                        @foreach($productAttrArr as $key=>$val)
                        @php
                             $pArr=(array)$val;
                        @endphp
                        <input id="paid" name="paid[]" value="{{ $pArr['id'] }}"  type="hidden" class="form-control"  >
                        <div class="card" id="product_attr_{{ $loop_count++ }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="sku" class="control-label ">SKU</label>
                                            <input id="sku" name="sku[]" value="{{ $pArr['sku'] }}"  type="text" class="form-control" required  >
                                        </div>
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="mrp" class="control-label ">M.R.P</label>
                                            <input id="mrp" name="mrp[]" value="{{ $pArr['mrp'] }}" type="number" class="form-control" required  >
                                        </div>
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="price" class="control-label ">PRICE</label>
                                            <input id="price" name="price[]" value="{{ $pArr['price'] }}" type="number" class="form-control" required  >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="size_id" class="control-label">Size</label>
                                            <select name="size_id[]" id="size_id"  class="form-control" >
                                                <option value="">size</option>
                                                @foreach($size as $item)
                                                @if($pArr['size_id']==$item->id)
                                                <option value="{{$item->id}}" selected>{{ $item->size }}</option>
                                                @else
                                                <option value="{{$item->id}}" >{{ $item->size }}</option>
                                                @endif
                                                @endforeach
            
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="color_id" class="control-label ">Color</label>
                                            <select name="color_id[]" id="color_id" class="form-control" >
                                                <option value="">color</option>
                                                @foreach($color as $item)
                                                @if($pArr['color_id']==$item->id)
                                                <option value="{{$item->id}}" selected>{{ $item->color }}</option>
                                                @else
                                                <option value="{{$item->id}}">{{ $item->color }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="qty" class="control-label ">QTY</label>
                                            <input id="qty" name="qty[]" type="number" value="{{ $pArr['qty'] }}" class="form-control" required  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <label for="attr_image" class="control-label ">product images</label>
                                            <input id="attr_image" name="image_attr[]"  type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                            @if($pArr['image_attr']!="")
                                            <img width="200px" src="{{ asset('storage/media/'.$pArr['image_attr']) }}" alt="">
                                            @endif
                                        </div>
                                        @if($loop_count==2)
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <button style="margin-top: 30px" type="button" onclick="add_more(<?php echo $loop_count++ ?>)" class="btn btn-success btn-lg "><i class="fa-solid fa-plus mr-2"></i>ADD</button>
                                        </div>
                                        @else
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <a href="{{url('admin/product/product_attr_delete/')}}/{{ $pArr['id'] }}/{{ $id }}"><button style="margin-top: 30px" type="button" onclick="remove_attr('{{ $loop_count-1 }}')"  class="btn btn-danger btn-lg "><i class="fa-solid fa-minus"></i> REMOVE</button></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   
                    <button id="" type="submit" class="btn btn-lg btn-info btn-block mx-3">
                        Submit
                    </button>
                    <input type="hidden" name="id" value="{{$id}}" id="">
                </div>
             </form>
                
            </div>
    </div>
    <script>
        loopCount=1
        function add_more(){
            loopCount++
            size=jQuery('#size_id').html();
            size=size.replace('selected',"")
            color=jQuery('#color_id').html();
            color=color.replace('selected',"")
            var size
            html=`<input id="paid" name="paid[]"   type="hidden" class="form-control"  >
                   <div class="card" id="product_attr_${loopCount}">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="sku" class="control-label ">SKU</label>
                                            <input id="sku" name="sku[]"    type="text" class="form-control" required  >
                                            </select>
                                        </div>
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="mrp" class="control-label ">M.R.P</label>
                                            <input id="mrp" name="mrp[]"  type="text" class="form-control" required  >
                                        </div>
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="price" class="control-label ">PRICE</label>
                                            <input id="price" name="price[]"  type="text" class="form-control" required  >
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="size_id" class="control-label ">Size</label>
                                            <select name="size_id[]" id="size_id" class="form-control" >
                                               ${size}
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-2 ">
                                            <label for="color_id" class="control-label ">Color</label>
                                            <select name="color_id[]" id="color_id" class="form-control" >
                                                ${color}
                                            </select>
                                        </div>
                                        <div class="form-group has-success  col-sm-12 col-md-6 col-lg-2">
                                            <label for="qty" class="control-label ">QTY</label>
                                            <input id="qty" name="qty[]"  type="number" class="form-control" required  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <label for="attr_image" class="control-label ">product images</label>
                                            <input id="image_attr" name="image_attr[]"  type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                        </div>
                                        <div class="form-group col-lg-4 col-sm-6 remove" >
                                            <button style="margin-top: 30px" type="button" onclick="remove_attr(${loopCount})"  class="btn btn-danger btn-lg "><i class="fa-solid fa-minus"></i> REMOVE</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>`
                jQuery('#attribute').append(html)
        }
        function remove_attr(loopCount){
            $('#product_attr_'+loopCount).remove()
        }
        function remove_images(loop){
            $('#product_images'+loop).remove()
        }
        loopImageCount=1
        function add_images_more(loop){
            loopImageCount++;
            html=`
                 <input id="piid" name="piid[]" value=""  type="hidden" class="form-control"  ><div class="form-group">
                                    <div class="form-group row" id="product_images${loopImageCount}">
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <label for="images" class="control-label ">product images</label>
                                            <input id="images" name="images[]"  type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }} >
                                            @if($pIArr['images']!="")
                                            <img width="200px" src="{{ asset('storage/media/'.$pIArr['images']) }}" alt="">
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-4 col-sm-6">
                                            <a href="{{url('admin/product/product_image_delete/')}}/{{ $pIArr['id'] }}/{{ $id }}"><button style="margin-top: 30px" type="button" onclick="remove_attr(${loopImageCount})"  class="btn btn-danger btn-lg "><i class="fa-solid fa-minus"></i> REMOVE</button></a>
                                        </div>
                                    </div>
                                </div>`
            $('#product_image').append(html)

        }
        CKEDITOR.replace('short_desc')
        CKEDITOR.replace('desc')
        CKEDITOR.replace('technical_spec')
        
    </script>
@endsection