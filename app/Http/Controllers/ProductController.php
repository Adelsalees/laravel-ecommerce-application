<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Product::all();
        return view("admin/product",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_product(Request $request,$id="")
    {
        if($id>0){
            $arr=Product::where(["id"=>$id])->get();
            $res['catagary_id']=$arr[0]->catagary_id;
            $res['name']=$arr[0]->name;
            $res['image']=$arr[0]->image;
            $res['brand']=$arr[0]->brand;
            $res['model']=$arr[0]->model;
            $res['short_desc']=$arr[0]->short_desc;
            $res['desc']=$arr[0]->desc;
            $res['keyword']=$arr[0]->keyword;
            $res['technical_spec']=$arr[0]->technical_spec;
            $res['uses']=$arr[0]->uses;
            $res['warranty']=$arr[0]->warranty;
            $res['lead_time']=$arr[0]->lead_time;
            $res['tax_id']=$arr[0]->tax_id;
            $res['is_promo']=$arr[0]->is_promo;
            $res['is_featured']=$arr[0]->is_featured;
            $res['is_discounded']=$arr[0]->is_discounded;
            $res['is_trending']=$arr[0]->is_trending;
            $res['slug']=$arr[0]->slug;
            $res['id']=$arr[0]->id;

            $res['productAttrArr']=DB::table('product_attr')->where(['product_id'=>$id])->get();

            $productImageArr=DB::table('products_images')->where(['product_id'=>$id])->get();
            if(!isset($productImageArr[0])){
                $res['productImageArr'][0]['id']="";
                $res['productImageArr'][0]['images']="";
            }else{
                $res['productImageArr']=$productImageArr;
            }
           
        }else{
            if(!isset($productImageArr[0])){
                $res['productImageArr'][0]['id']="";
                $res['productImageArr'][0]['images']="";
            }

            $res['catagary_id']="";
            $res['name']="";
            $res['image']="";
            $res['brand']="";
            $res['model']="";
            $res['short_desc']="";
            $res['desc']="";
            $res['keyword']="";
            $res['technical_spec']="";
            $res['uses']="";
            $res['warranty']="";

            $res['lead_time']="";
            $res['tax_id']="";
            $res['is_promo']="";
            $res['is_featured']="";
            $res['is_discounded']="";
            $res['is_trending']="";
            $res['slug']="";
            $res['status']="";
            $res['id']=0;


            $res['productAttrArr'][0]['id']="";
            $res['productAttrArr'][0]['product_id']="";
            $res['productAttrArr'][0]['sku']="";
            $res['productAttrArr'][0]['image_attr']="";
            $res['productAttrArr'][0]['mrp']="";
            $res['productAttrArr'][0]['price']="";
            $res['productAttrArr'][0]['qty']="";
            $res['productAttrArr'][0]['size_id']="";
            $res['productAttrArr'][0]['color_id']="";
            
        }
        $res['catagary']=DB::table('catagaries')->where(['status'=>1])->get();
        $res['size']=DB::table('sizes')->where(['status'=>1])->get();
        $res['color']=DB::table('colors')->where(['status'=>1])->get();
        $res['brands']=DB::table('brands')->where(['status'=>1])->get();
        $res['taxs']=DB::table('taxs')->where(['status'=>1])->get();
        return view('admin/manag_product',$res);
    }
    public function manag_product_process(Request $request)
    {
        // return $request->post();
        // echo '<prev>';
        // print_r($request->post());
        // die;

        if($request->post('id')>0){
            $model=Product::find($request->post('id'));
            $msg="product updated!!";
            $img_validation="mimes:jpeg,jpg,png,gif";
        }else{
            $model= new product();
            $msg="product inserted !!";
            $img_validation="required|mimes:jpeg,jpg,png,gif";
            
        }
        $request->validate([
            'name'=>'required',
            'image'=>$img_validation,
            'slug'=>'required | unique:products,slug,'.$request->post('id'),
            'image_attr.*'=>"mimes:jpeg,jpg,png,gif",
            'images.*'=>"mimes:jpeg,jpg,png,gif"
        ]);
        $paidArr=$request->post('paid');
        $skuArr=$request->post('sku');
        $mrpArr=$request->post('mrp');
        $priceArr=$request->post('price');
        $qtyArr=$request->post('qty');
        $size_idArr=$request->post('size_id');
        $color_idArr=$request->post('color_id');
        foreach($skuArr as $key=>$value){
            $check=DB::table('product_attr')->where('sku','=',$skuArr[$key])->where('id','!=', $paidArr[$key])->get();
            if(isset($check[0])){
                $request->session()->flash('sku_error',$skuArr[$key].' SKU already used');
                return redirect(request()->headers->get('referer'));
            }
        }
        if($request->hasFile('image')){
            if($request->post('id')>0){
                $arrImage=DB::table(' products')->where(['id'=>$request->post('id')])->get();
                if(  Storage::exists('/public/media/'.$arrImage[0]->image)){
                    Storage::delete('/public/media/'.$arrImage[0]->image);
                }
              }
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().".".$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        $model->catagary_id=$request->post('catagary_id');
        $model->name=$request->post('name');
        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keyword=$request->post('keyword');
        $model->technical_spec=$request->post('technical_spec');
        $model->uses=$request->post('uses');
        $model->warranty=$request->post('warranty');
        $model->lead_time=$request->post('lead_time');
        $model->tax_id=$request->post('tax_id');
        $model->is_promo=$request->post('is_promo');
        $model->is_featured=$request->post('is_featured');
        $model->is_discounded=$request->post('is_discounded');
        $model->is_trending=$request->post('is_trending');
        $model->slug=$request->post('slug');
        $model->status=1;
        $model->save();
        $p_id=$model->id;

        foreach($skuArr as $key=>$value){
            
            $productAttrArr=[];
            $productAttrArr['product_id']=$p_id;
            $productAttrArr['sku']=$skuArr[$key];
          
            $productAttrArr['mrp']=(int)$mrpArr[$key];
            $productAttrArr['price']=(int)$priceArr[$key];
            $productAttrArr['qty']=(int)$qtyArr[$key];
            if($size_idArr[$key]==" "){
                $productAttrArr['size_id']=0;
            }else{
                $productAttrArr['size_id']=$size_idArr[$key];
            }
            if($color_idArr[$key]==" "){
                $productAttrArr['color_id']=0;
            }else{
                $productAttrArr['color_id']=$color_idArr[$key];
            }
            if($request->hasFile("image_attr.$key")){
                if($paidArr[$key]!=""){
                    $arrImage=DB::table('product_attr')->where(['id'=>$paidArr[$key]])->get();
                    if(  Storage::exists('/public/media/'.$arrImage[0]->image_attr)){
                        Storage::delete('/public/media/'.$arrImage[0]->image_attr);
                    }
                  }
                $rand=rand('11111111','999999999');
                $image_attr=$request->file("image_attr.$key");
                $ext=$image_attr->extension();
                $image_name_attr=$rand.".".$ext;
                $request->file("image_attr.$key")->storeAs('/public/media',$image_name_attr);
               $productAttrArr['image_attr']=$image_name_attr;
            //    echo '<prev>';
            //    printf();
            //    die;
            }
            if($paidArr[$key]!=""){
                DB::table('product_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
            }else{
                DB::table('product_attr')->insert($productAttrArr);
            }
            
        }

        // product images

        $piidArr=$request->post('piid');
        foreach($piidArr as $key=>$val){
            if($request->hasFile("images.$key")){
                if($piidArr[$key]!=""){
                    $arrImage=DB::table('products_images')->where(['id'=>$piidArr[$key]])->get();
                    if(  Storage::exists('/public/media/'.$arrImage[0]->images)){
                        Storage::delete('/public/media/'.$arrImage[0]->images);
                    }
                }
               
                $rand=rand('11111111','999999999');
                $images=$request->file("images.$key");
                $ext=$images->extension();
                $image_name=$rand.".".$ext;
                $request->file("images.$key")->storeAs('/public/media',$image_name);
                $productImageArr['product_id']=$p_id;
               $productImageArr['images']=$image_name;
               if($piidArr[$key]!=""){
                DB::table('products_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);
                }else{
                    DB::table('products_images')->insert($productImageArr);
                }
            }else{
                $productImageArr['images']="";
            }
            

        }

        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }
    public function delete(Request $request,$id){
        $model=Product::find($id);
        $model->delete();
        $request->session()->flash('message','product deleted !!');
        return redirect('admin/product');
    }
    public function product_attr_delete(Request $request,$pid,$id){
        $arrImage=DB::table(' product_attr')->where(['id'=>$pid])->get();
        if(  Storage::exists('/public/media/'.$arrImage[0]->image_attr)){
            Storage::delete('/public/media/'.$arrImage[0]->image_attr);
        }
        DB::table('product_attr')->where(['id'=>$pid])->delete();
        return redirect('admin/product/manag_product/'.$id);
    }
    public function product_image_delete(Request $request,$pid,$id){
        $arrImage=DB::table('product_images')->where(['id'=>$pid])->get();
        if(  Storage::exists('/public/media/'.$arrImage[0]->images)){
            Storage::delete('/public/media/'.$arrImage[0]->images);
        }
        DB::table('products_images')->where(['id'=>$pid])->delete();
        return redirect('admin/product/manag_product/'.$id);
    }

    public function status(Request $request,$status,$id){
        $model=Product::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/product');
    }

}
