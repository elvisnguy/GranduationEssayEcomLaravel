<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CartController extends Controller
{
    public function save_cart(Request $request){
    	

        
        if($request->hidden_size == null)
         
        {
            Session::flash('success','Vui lòng chọn size');
            return redirect()->back();
        }


    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();


        
    	$data['id'] = $product_info->product_id;
    	$data['qty'] = $quantity;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['options']['image'] = $product_info->product_image;
    	$data['options']['size'] = $request->hidden_size;
    	Cart::add($data);
        return Redirect::to('/show-cart');
    }
    public function show_cart(Request $request){
         $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
    	return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function delete_to_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
    	$rowId = $request->rowId_cart;
    	$qty = $request->cart_quantity;
    	Cart::update($rowId,$qty);
    	return redirect()->back();
    }
}