<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

// session_start();

class ProductController extends Controller
{
     public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
     public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);

    }
    public function all_product(){
        $this->AuthLogin();
    	/*$all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();*/
       
          $all_product = \App\Product::orderBy('product_id','desc')->paginate(16);


    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_price'] = $request->product_price;
        $data['product_name'] = $request->product_name;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_desc;
        $data['product_gender'] = $request->product_gender;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        if(!empty($request->discount)){
           $data['discount'] = $request->discount;
        }
       
        $get_image =$request-> file('product_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/product',$new_image);
          $data['product_image']=$new_image; 

          

        $idproduct = DB::table('tbl_product')->insert($data);
        $idproduct = DB::getPDO()->lastInsertId();
        $productModel = \App\Product::find($idproduct);
        

      
        foreach($request->size as $k => $s_size){
            $productModel->sizes()->attach([$s_size],['quantity' => $request->quantity[$s_size] ]);
        }
        





        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
        }
        $data['product_image']=''; 
        DB::table('tbl_product')->insert($data);






        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');

    }
     public function unactive_product($product_id){
        $this->AuthLogin();
     	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
     	 Session::put('message','Không kích hoạt sản phẩm thành công');
     	return Redirect::to('all-product');
     }
     public function active_product($product_id){
        $this->AuthLogin();
     	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
     	 Session::put('message','Kích hoạt sản phẩm thành công');
     	return Redirect::to('all-product');
     }
     public function edit_product($product_id){
        $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

     	$edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);

     }
     public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_desc;
        $data['product_size'] = $request->product_size;
        $data['product_gender'] = $request->product_gender;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        if(!empty($request->discount)){
           $data['discount'] = $request->discount;
        }
        $get_image = $request->file('product_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/product',$new_image);
          $data['product_image']=$new_image; 
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
        }
       DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
     }
     public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_size_product')->where('product_id',$product_id)->delete();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');

     }
     //End Admin Page
     public function details_product(Request $request,$product_id){
        $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

          $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->first();// sau nay first doi thanh get clip 30

       

         $category_id = $details_product->category_id;//sau nay doi thanh foreach vong lap clip 31
         $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(4)->get();


       return view('pages.product.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
     }
     public function show_all_product(Request $request){
      $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

        $cate_product = \App\Category::orderBy('category_id','DESC')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

          $show_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->get();// sau nay first doi thanh get clip 30

        
        $items = \App\Product::orderBy('product_id');
        $title = "Tất cả sản phẩm ";
       
          $gioitinh = "";

          if($request->gender == 'nu'){
            $gioitinh = 'Nữ';
          }elseif($request->gender == 'nam'){
              $gioitinh = 'nam';
          }elseif($request->gender == 'unisex'){
            $gioitinh = 'Unisex';
          }
          if(isset($request->cate)){
            $brand = \App\Category::find($request->cate);

              $title .= ' Danh mục '. $brand->category_name;
             $items = $items->where('category_id', $request->cate);
          }
         
          if(isset($request->brand)){
              $brand = \App\Brand::find($request->brand);

              $title .= ' Thương hiệu '. $brand->brand_name;
             
             $items = $items->where('brand_id', $request->brand);
          }
          
          if(!empty($gioitinh)){
            $title .= ' Giới tính ' . $gioitinh;
            $items = $items->where('product_gender', $gioitinh);
          }
          if(isset($request->price)){
            $arrPrice = explode("-", $request->price);
            if(count($arrPrice) == 2){
                $items = $items->where('product_price','>=', $arrPrice[0])->where('product_price','<=', $arrPrice[1]);
            }else{
              $items = $items->where('product_price','>=', $arrPrice[0]);
            }
          }
          
       
        $items = $items->paginate(16);

      return view('pages.product.show_all_product')->with('category',$cate_product)->with('brand',$brand_product)->with('show_product',$show_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('items', $items)->with('title', $title);
     }
      public function show_all_saleproduct(Request $request){
      $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

        $cate_product = \App\Category::orderBy('category_id','DESC')->get();

        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

          $show_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->get();// sau nay first doi thanh get clip 30

        
        $items = \App\Product::orderBy('product_id')->where('discount','>', 0)->paginate(16);
        

      return view('pages.product.show_all_saleproduct')->with('category',$cate_product)->with('brand',$brand_product)->with('show_product',$show_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('items', $items);
     }
      
}
