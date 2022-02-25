<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Tax::all();
        return view("admin/tax",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_tax(Request $request,$id="")
    {
        if($id>0){
            $arr=Tax::where(["id"=>$id])->get();
            $res['tax_desc']=$arr[0]->tax_desc;
            $res['tax_value']=$arr[0]->tax_value;
            $res['status']=$arr[0]->status;
            $res['id']=$arr[0]->id;
        }else{
            $res['tax_desc']="";
            $res['tax_value']="";
            $res['status']="";
            $res['id']=0;
        }
        
        return view('admin/manag_tax',$res);
    }
    public function manag_tax_process(Request $request)
    {

        $request->validate([
            'tax_value'=>'required | unique:taxs,tax_value,'.$request->post('id'),
        ]);
        if($request->post('id')>0){
            $model=Tax::find($request->post('id'));
            $msg="tax updated!!";
        }else{
            $model= new Tax();
            $msg="tax inserted !!";
        }
        $model->tax_desc=$request->post('tax_desc');
        $model->tax_value=$request->post('tax_value');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/tax');
    }
    public function delete(Request $request,$id){
        $model=Tax::find($id);
        $model->delete();
        $request->session()->flash('message','tax deleted !!');
        return redirect('admin/tax');

    }

    public function status(Request $request,$status,$id){
        $model=Tax::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/tax');

    }
}
