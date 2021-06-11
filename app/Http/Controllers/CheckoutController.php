<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
    public function checkCoupon(Request $request){
      $coupon = $request->coupon;
      $check = DB::table('tbl_coupon')->where('name',$coupon)->first();
      if($check != null){
        Session::put('discount', $check->discount);
        Session::put('coupon_id', $check->coupon_id);
      }
      return redirect()->back();
    }
    public function login_checkout(Request $request){
        $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    	return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
   
    public function checkout(Request $request){
       if(Session::get('customer_id') == null){
         return Redirect::to('/login-checkout');
        }
       $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
 }
    public function save_checkout_customer(Request $request){
       $data = array();
          $data['shipping_name'] = $request->shipping_name;
          $data['shipping_phone'] = $request->shipping_phone;
          $data['shipping_email'] = $request->shipping_email;
          $data['shipping_note'] = $request->shipping_note;
          $data['shipping_address'] = $request->shipping_address;

         $data['customer_id'] =  Session::get('customer_id');
          $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
          Session::put('shipping_id',$shipping_id);
          return Redirect('/payment');
    }
    public function payment(Request $request)
    {
        $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();
           $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function order_place(Request $request){
      //seo
      $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();
      //get payment method
          $data = array();
          $data['payment_method'] = $request->payment_options;
          $data['payment_status'] = 'dangcho';
          $payment_id = DB::table('tbl_payment')->insertGetId($data);
      //insert order
           $order_data = array();
          $order_data['customer_id'] = Session::get('customer_id');
          $order_data['shipping_id'] = Session::get('shipping_id');
          $order_data['payment_id'] = $payment_id;
          
          

          $total = Cart::subtotal(0,"","");
          $order_data['order_total'] = $total;
          $order_data['order_status'] = 'dangcho';


          if(Session::has('coupon_id')){
             $order_data['coupon_id'] = Session::get('coupon_id');
          }
         
          $order_data['created_at']= Carbon::now();
           $order_data['updated_at']= $order_data['created_at'];
          $order_id = DB::table('tbl_order')->insertGetId($order_data);
        
           //insert order details
          $content = Cart::content();


          foreach($content as $v_content){
            
             $product_size = DB::table('tbl_size_product')->where("product_id", $v_content->id)->where("size_id", $v_content->options->size)->first();

              $quantity = $product_size->quantity - $v_content->qty;
              if($quantity >= 0){
                  $product_size = DB::table('tbl_size_product')->where("product_id", $v_content->id)->where("size_id", $v_content->options->size)->update(['quantity' => $quantity]);
              }else{
                  Session::flash('error', 'Kho hết, chỉ còn ' . $product_size->quantity . ' cái'  );
                
                  return redirect()->route('payment');
              }


          $order_d_data = array();
          $order_d_data['size_id'] = $v_content->options['size'];
          $order_d_data['order_id'] = $order_id;
          $order_d_data['product_id'] = $v_content->id;
          $order_d_data['product_name'] = $v_content->name;
          $order_d_data['product_price'] = $v_content->price;
          $order_d_data['product_sales_quantity'] = $v_content->qty;



          DB::table('tbl_order_details')->insert($order_d_data);
        }
        $carts = Cart::content();
        if($data['payment_method']==1){
             echo'Thanh toán thẻ ATM';
          }elseif($data['payment_method']==2)
          {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();  
            Session::put('order_id',  $order_id);
            return redirect()->route('orderPlace_view');
            //Cart::destroy();
             //return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('carts', $carts)->with('orders', $order_data)->with('order_id',$order_id);
          }else{
            echo'Thẻ ghi nợ';
          }

       // return Redirect('/payment');

    }
    public function order_place_view(Request $request){
      $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

        return view('pages.checkout.handcash')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function logout_checkout(){
    	Session::flush();
    	return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){


     
    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->where('customer_status','1')->first();
        if($result){
        	Session::put('customer_id',$result->customer_id);
          Session::put('customer_name',$result->customer_name);
        	return Redirect::to('/');
        }else{
            return Redirect::to('/login-checkout');
        }
   }
    public function thongke(Request $request){
        $params = $request->all();
        $params['thang'] = isset($params['thang']) ? $params['thang'] : 1;


        $item = \App\Order::select(DB::raw('sum(`order_total`) as tong'))->whereMonth('created_at','=',$params['thang'])->first();
        $tong = $item->tong;
         return view('admin.thongke')->with('params', $params)->with('tong', $tong);
      }
   public function manage_order(Request $request){
    $this->AuthLogin();
      $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();


      $all_order = \App\Order::orderBy('order_id','desc')   ;
      if($request->status){
        $all_order = $all_order->where('order_status', $request->status);
      }
      $all_order = $all_order->paginate(16);

      $manager_order = view('admin.manage_order')->with('all_order',$all_order)->with('params',$request->all());

        return view('admin_layout')->with('admin.manage_order',$manager_order);
   }
   public function view_order($orderId){
     // $order_by_id = DB::table('tbl_order')
     //    ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
     //    ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
     //    ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')

     //    ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();


      // $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
      //   return view('admin_layout')->with('admin.manage_order',$manager_order_by_id);

      $order = \App\Order::find($orderId);
      return view('admin.view_order')->with('order',$order);

   }
   public function saveStatus(Request $request){
     $orderId = $request->order_id;
      $orderStatus = $request->status;
      $order = \App\Order::find($orderId);
      $order->update(['order_status' => $orderStatus]);
      if($orderStatus == 'danggiao'){
         // tru so luong
          $orderDetail = $order->details;

          foreach ($orderDetail as $key => $detail) {
              $product_id = $detail->product_id;
              $size_id = $detail->size_id;
              $quantitySale = $detail->product_sales_quantity; 

              
             $tmp = DB::table('tbl_size_product')->where('product_id', $product_id )->where('size_id', $size_id)->first();
             $soluong = $tmp->quantity - $quantitySale;
             DB::table('tbl_size_product')->where('product_id', $product_id)->where('size_id', $size_id)->update(['quantity'=> $soluong ]);

          }
      }else if($orderStatus == 'huy'){
          // tru so luong
          $orderDetail = $order->details;

          foreach ($orderDetail as $key => $detail) {
              $product_id = $detail->product_id;
              $size_id = $detail->size_id;
              $quantitySale = $detail->product_sales_quantity; 

              
             $tmp = DB::table('tbl_size_product')->where('product_id', $product_id )->where('size_id', $size_id)->first();
             $soluong = $tmp->quantity + $quantitySale;
             DB::table('tbl_size_product')->where('product_id', $product_id)->where('size_id', $size_id)->update(['quantity'=> $soluong ]);
            

          }
      }
      return redirect()->back();
   }
   public function deleteOrder($id){
      $order = \App\Order::find($id);
      $order->details()->delete();
      $order->delete();
      return redirect()->back();
   }
   public function show_history_order(Request $request)
   {

    //seo
      $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    
      $customer_id = Session::get('customer_id');
      $customer = \App\Customer::find($customer_id);
      $donhang = $customer->orders()->orderBy('order_id','desc')->get();
      return view('pages.checkout.order_history')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('donhang', $donhang); 
   }
}
