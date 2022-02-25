<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Coupon::all();
        return view("admin/coupon",$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manag_coupon(Request $request,$id="")
    {
        if($id>0){
            $arr=Coupon::where(["id"=>$id])->get();

            $res['title']=$arr[0]->title;
            $res['code']=$arr[0]->code;
            $res['value']=$arr[0]->value;
            $res['value']=$arr[0]->value;
            $res['type']=$arr[0]->type;
            $res['min_order_amt']=$arr[0]->min_order_amt;
            $res['is_one_time']=$arr[0]->tis_one_time;

            $res['id']=$arr[0]->id;
        }else{
            $res['title']="";
            $res['code']="";
            $res['value']="";
            $res['id']=0;
            $res['type']="";
            $res['min_order_amt']="";
            $res['is_one_time']="";
        }
        
        return view('admin/manag_coupon',$res);
    }
    public function manag_coupon_process(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'value'=>'required',
            'code'=>'required | unique:coupons,code,'.$request->post('id'),

        ]);
        if($request->post('id')>0){
            $model=Coupon::find($request->post('id'));
            $msg="coupon updated!!";
        }else{
            $model= new Coupon();
            $msg="coupon inserted !!";
        }
        $model->title=$request->post('title');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->type=$request->post('type');
        $model->min_order_amt=$request->post('min_order_amt');
        $model->is_one_time=$request->post('is_one_time');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
    public function delete(Request $request,$id){
        $model=Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','coupon deleted !!');
        return redirect('admin/coupon');

    }
    public function status(Request $request,$status,$id){
        $model=Coupon::find($id);
        $model->status=$status;
        $model->save();;
        $request->session()->flash('message','Status update !!');
        return redirect('admin/coupon');

    }
}
