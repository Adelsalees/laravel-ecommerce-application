<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // home banner
        $result['home_banner']=DB::table('home_banners')->where(['status'=>1])->get();

        // catagaries
        $result['home_catagary']=DB::table('catagaries')->where(['status'=>1])->where(['is_home'=>1])->get();

        // products
        foreach ( $result['home_catagary'] as $list) {
            $result['home_catagary_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['catagary_id'=>$list->id])->get();
          
            foreach ($result['home_catagary_product'][$list->id] as $lists) {
                    $result['home_catagary_attr'][$lists->id]=DB::table('product_attr')
                    ->leftJoin('sizes','sizes.id','=','product_attr.size_id')
                    ->leftJoin('colors','colors.id','=','product_attr.color_id')
                    ->where(['product_attr.product_id'=>$lists->id])->get();      
          }
        }

        //brands
        $result['brands']=DB::table('brands')->where(['status'=>1])->get();


        $result['home_featured_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_featured'=>1])->get();
        foreach ($result['home_featured_product'][$list->id] as $lists) {
            $result['home_featured_attr'][$lists->id]=DB::table('product_attr')
            ->leftJoin('sizes','sizes.id','=','product_attr.size_id')
            ->leftJoin('colors','colors.id','=','product_attr.color_id')
            ->where(['product_attr.product_id'=>$lists->id])->get();      
        }

        $result['home_discount_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_discounded'=>1])->get();
        foreach ($result['home_discount_product'][$list->id] as $lists) {
            $result['home_discount_attr'][$lists->id]=DB::table('product_attr')
            ->leftJoin('sizes','sizes.id','=','product_attr.size_id')
            ->leftJoin('colors','colors.id','=','product_attr.color_id')
            ->where(['product_attr.product_id'=>$lists->id])->get();      
        }
        
        $result['home_trending_product'][$list->id]=DB::table('products')->where(['status'=>1])->where(['is_trending'=>1])->get();
        foreach ($result['home_trending_product'][$list->id] as $lists) {
            $result['home_trending_attr'][$lists->id]=DB::table('product_attr')
            ->leftJoin('sizes','sizes.id','=','product_attr.size_id')
            ->leftJoin('colors','colors.id','=','product_attr.color_id')
            ->where(['product_attr.product_id'=>$lists->id])->get();      
        }
         return view('front_end.index',$result);
    }

 
    

  
}
