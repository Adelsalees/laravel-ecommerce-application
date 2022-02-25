<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Brand::all();
        return view("admin/brand",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_brand(Request $request,$id="")
    {
        if($id>0){
            $arr=Brand::where(["id"=>$id])->get();
            $res['name']=$arr[0]->name;
            $res['image']=$arr[0]->image;
            $res['status']=$arr[0]->status;
            $res['id']=$arr[0]->id;
        }else{
            $res['name']="";
            $res['image']="";
            $res['status']="";
            $res['id']=0;
        }
        
        return view('admin/manag_brand',$res);
    }
    public function manag_brand_process(Request $request)
    {
        $request->validate([
            'name'=>'required |unique:brands,name,'.$request->post('id'),
            'image'=>"mimes:jpeg,jpg,png,gif",
            
        ]);
        if($request->post('id')>0){
            $model=Brand::find($request->post('id'));
            $msg="product updated!!";
           
        }else{
            $model= new Brand();
            $msg="product inserted !!";      
        }
        
        if($request->post('id')>0){
            $model=Brand::find($request->post('id'));
            $msg="brand updated!!";
        }else{
            $model= new Brand();
            $msg="brand inserted !!";
        }
        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().".".$ext;
            $image->storeAs('/public/media/brand',$image_name);
            $model->image=$image_name;
        }
        $model->name=$request->post('name');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }
    public function delete(Request $request,$id){
        $model=Brand::find($id);
        $model->delete();
        $request->session()->flash('message','brand deleted !!');
        return redirect('admin/brand');

    }

    public function status(Request $request,$status,$id){
        $model=Brand::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/brand');

    }
}
