<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=color::all();
        return view("admin/color",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_color(Request $request,$id="")
    {
        if($id>0){
            $arr=Color::where(["id"=>$id])->get();

            $res['color']=$arr[0]->color;
            $res['status']=$arr[0]->status;
            $res['id']=$arr[0]->id;
        }else{
            $res['color']="";
            $res['status']="";
            $res['id']=0;
        }
        
        return view('admin/manag_color',$res);
    }
    public function manag_color_process(Request $request)
    {

        $request->validate([
            'color'=>'required | unique:colors,color,'.$request->post('id'),
        ]);
        if($request->post('id')>0){
            $model=Color::find($request->post('id'));
            $msg="color updated!!";
        }else{
            $model= new color();
            $msg="color inserted !!";
        }
        $model->color=$request->post('color');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
    }
    public function delete(Request $request,$id){
        $model=Color::find($id);
        $model->delete();
        $request->session()->flash('message','color deleted !!');
        return redirect('admin/color');

    }

    public function status(Request $request,$status,$id){
        $model=Color::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/color');

    }
}
