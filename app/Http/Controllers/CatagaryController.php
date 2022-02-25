<?php

namespace App\Http\Controllers;

use App\Models\catagary;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CatagaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=catagary::all();
        return view("admin/catagary",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_catagary(Request $request,$id="")
    {
        if($id>0){
            $arr=catagary::where(["id"=>$id])->get();

            $res['catagary_name']=$arr[0]->catagary_name;
            $res['catagary_slug']=$arr[0]->catagary_slug;
            $res['parent_id']=$arr[0]->parent_id;
            $res['catagary_image']=$arr[0]->catagary_image;
            $res['id']=$arr[0]->id;
        }else{
            $res['catagary_name']="";
            $res['catagary_slug']="";
            $res['parent_id']="";
            $res['catagary_image']="";
            $res['id']=0;
        }
        $res['catagaries']=DB::table('catagaries')->where(['status'=>1])->get();
        return view('admin/manag_catagary',$res);
    }
    public function manag_catagary_process(Request $request)
    {

        $request->validate([
            'catagary_name'=>'required',
            'catagary_image'=>"mimes:jpeg,jpg,png,gif",
            'catagary_slug'=>'required | unique:catagaries,catagary_slug,'.$request->post('id'),

        ]);
        if($request->post('id')>0){
            $model=catagary::find($request->post('id'));
            $msg="catagary updated!!";
        }else{
            $model= new catagary();
            $msg="catagary inserted !!";
        }
        $model->catagary_name=$request->post('catagary_name');
        $model->catagary_slug=$request->post('catagary_slug');
        $model->parent_id=$request->post('parent_id');
        if($request->hasFile('catagary_image')){
            $image=$request->file('catagary_image');
            $ext=$image->extension();
            $image_name=time().".".$ext;
            $image->storeAs('/public/media/catagary',$image_name);
            $model->catagary_image=$image_name;
        }
       // $model->catagary_image=$request->post('catagary_image');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/catagary');
    }
    public function delete(Request $request,$id){
        $model=catagary::find($id);
        $model->delete();
        $request->session()->flash('message','catagary deleted !!');
        return redirect('admin/catagary');

    }

    public function status(Request $request,$status,$id){
        $model=catagary::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/catagary');

    }


 
}
