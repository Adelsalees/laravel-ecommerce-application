<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
 
   public function index()
   {
       $result['data']=HomeBanner::all();
       return view("admin/homeBanner",$result);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function manag_homeBanner(Request $request,$id="")
   {
       if($id>0){
           $arr=HomeBanner::where(["id"=>$id])->get();
         
           $res['image']=$arr[0]->image;
           $res['btn_text']=$arr[0]->btn_text;
           $res['btn_link']=$arr[0]->btn_link;
           $res['status']=$arr[0]->status;
           $res['id']=$arr[0]->id;
       }else{
           $res['btn_text']="";
           $res['btn_link']="";
           $res['image']="";
           $res['status']="";
           $res['id']=0;
       }
       
       return view('admin/manag_homeBanner',$res);
   }
   public function manag_homeBanner_process(Request $request)
   {
       $request->validate([
           'btn_link'=>'required',
           'btn_text'=>'required',
           'image'=>"mimes:jpeg,jpg,png,gif",
           
       ]);
       if($request->post('id')>0){
           $model=HomeBanner::find($request->post('id'));
           $msg="Banner updated!!";
          
       }else{
           $model= new homeBanner();
           $msg="Banner inserted !!";      
       }
       
       if($request->post('id')>0){
           $model=HomeBanner::find($request->post('id'));
           $msg="Banner updated!!";
       }else{
           $model= new HomeBanner();
           $msg="Banner inserted !!";
       }
       if($request->hasFile('image')){
           $image=$request->file('image');
           $ext=$image->extension();
           $image_name=time().".".$ext;
           $image->storeAs('/public/media/homeBanner',$image_name);
           $model->image=$image_name;
       }
       $model->btn_text=$request->post('btn_text');
       $model->btn_link=$request->post('btn_link');
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/homeBanner');
   }
   public function delete(Request $request,$id){
       $model=HomeBanner::find($id);
       $model->delete();
       $request->session()->flash('message','Banner deleted !!');
       return redirect('admin/homeBanner');
   }

   public function status(Request $request,$status,$id){
       $model=HomeBanner::find($id);
       $model->status=$status;
       $model->save();;
       $request->session()->flash('message','Status update !!');
       return redirect('admin/homeBanner');

   }
}
