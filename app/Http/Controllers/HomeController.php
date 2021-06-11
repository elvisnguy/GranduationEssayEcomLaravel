<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    public function detail_news(Request $request, $id){
       $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
       $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
       $meta_title ="KT Clothing Store - Fast Fashion";
       $url_canonical = $request->url();

       $news = \App\News::find($id);
       $lienquan = \App\News::orderBy('news_id','DESC')->where('category_id', $news->category_id)->where('news_id', '!=', $news->news_id)->limit(8)->get();
       return view('pages.news.detail_news')->with('lienquan', $lienquan)->with('item', $news)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
   }
   public function index(Request $request){
       //Seo Meta
    $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
    $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
    $meta_title ="KT Clothing Store - Fast Fashion";
    $url_canonical = $request->url();



    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // 	$all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

    $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();


    $khuyenmai_product = DB::table('tbl_product')->where('product_status','1')->where('discount','>',0)->orderby('product_id','desc')->limit(4)->get();

    return view('pages.home')->with('khuyenmai_product',$khuyenmai_product)->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
}
public function search(Request $request){
   $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
   $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
   $meta_title ="KT Clothing Store - Fast Fashion";
   $url_canonical = $request->url();

   $keywords = $request->keywords_submit;

   $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
   $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

   $items = \App\Product::orderBy('product_id','desc')->paginate(16);

   $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
   return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('items', $items);         
}

public function search_auto(Request $request){
    if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('tbl_product')
        ->where('product_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; color:black">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="'.route('productDetail', ['product_id' => $row->product_id ]).'"><img height="150" width="150" src="public/uploads/product/'.$row->product_image.'">'.$row->product_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
}


public function shopping_guide(Request $request)
{
  $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
  $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
  $meta_title ="KT Clothing Store - Fast Fashion";
  $url_canonical = $request->url();

  return view('pages.footer_info.shopping_guide')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
}
public function checkout_guide(Request $request)
{
    $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
    $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
    $meta_title ="KT Clothing Store - Fast Fashion";
    $url_canonical = $request->url();

    return view('pages.footer_info.checkout_guide')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
}
public function transport(Request $request)
{
    $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
    $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
    $meta_title ="KT Clothing Store - Fast Fashion";
    $url_canonical = $request->url();

    return view('pages.footer_info.transport')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); 
}
}
