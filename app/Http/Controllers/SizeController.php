<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Size::all();
        return view("admin/size",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_size(Request $request,$id="")
    {
        if($id>0){
            $arr=Size::where(["id"=>$id])->get();

            $res['size']=$arr[0]->size;
            $res['status']=$arr[0]->status;
            $res['id']=$arr[0]->id;
        }else{
            $res['size']="";
            $res['status']="";
            $res['id']=0;
        }
        
        return view('admin/manag_size',$res);
    }
    public function manag_size_process(Request $request)
    {

        $request->validate([
            'size'=>'required | unique:sizes,size,'.$request->post('id'),
        ]);
        if($request->post('id')>0){
            $model=size::find($request->post('id'));
            $msg="size updated!!";
        }else{
            $model= new Size();
            $msg="size inserted !!";
        }
        $model->size=$request->post('size');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }
    public function delete(Request $request,$id){
        $model=Size::find($id);
        $model->delete();
        $request->session()->flash('message','size deleted !!');
        return redirect('admin/size');

    }

    public function status(Request $request,$status,$id){
        $model=Size::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/size');

    }
}
