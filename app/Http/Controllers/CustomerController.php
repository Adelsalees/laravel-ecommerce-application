<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Customer::all();
        return view("admin/customer",$result);
    }
    public function show(Request $request,$id="")
    {
        if($id>0){
            $arr=Customer::where(["id"=>$id])->get();
            $res['customer_list']=$arr[0];
            
        }
        return view('admin/show_customer',$res);
    }
    public function status(Request $request,$status,$id){
        $model=Customer::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/customer');

    }
}
