<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function register_account(Request $request){
       $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    	return view('pages.registered.register_account')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
     public function add_customer(Request $request){
          $data = array();
          $data['customer_name'] = $request->customer_name;
          $data['customer_address'] = $request->customer_address;
          $data['customer_birth'] = $request->customer_birth;
          $data['customer_gender'] = $request->customer_gender;
          $data['customer_phone'] = $request->customer_phone;
          $data['customer_email'] = $request->customer_email;
          $data['customer_password'] = md5($request->customer_password);

          $customer_id = DB::table('tbl_customers')->insertGetId($data);
          Session::put('customer_id',$customer_id);
          Session::put('customer_name',$request->customer_name);
          return Redirect('/trang-chu');

    }
    
}
