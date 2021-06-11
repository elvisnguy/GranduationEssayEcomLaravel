<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
class CustomerController extends Controller
{
     public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
    //  public function change_pass($id){
    //     $this->AuthLogin();
       

    //     return view('admin.change_pass')->with('id', $id);

    // }   
    //   public function save_change_pass(Request $request){
    //     $this->AuthLogin();
    //     $id = $request->id;
    //     $password_current = md5($request->password_current);
    //     $user = \App\Customer::where('customer_id', $id)->where('customer_password', $password_current )->first();
        
    //     if($user === null){
    //         Session::put('message','Mật khẩu hiện tại không đúng'); 
    //        return Redirect::to('/change-pass/' . $id);
    //     }else{
    //        $this->validate($request, [
    //             'password' => 'required|confirmed|min:6',
    //         ],[
    //             'confirmed' => 'Xác nhận mật khẩu bị sai',
    //             'required' => 'Mật khẩu không bỏ trống'
    //         ]);
    //        $password_new = md5($request->password);
    //         \App\Customer::where('customer_id', $id)->update(['customer_password' => $password_new ]);

    //         Session::put('message','Thay đổi mật khẩu thành công');
    //        return Redirect::to('/change-pass/' . $id);
    //     }
    // }
     public function add_customer(){
        $this->AuthLogin();
       

    	return view('admin.add_customer');

    }	
    public function all_customer(){
        $this->AuthLogin();
    	$all_customer = \App\Customer::all();
        return view('admin.all_customer')->with('all_customer',$all_customer);
    }
   
    public function save_customer(Request $request){

        dd($data);
        $this->AuthLogin();
        $data = array();
        
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],[
            'confirmed' => 'Xác nhận mật khẩu bị sai',
            'required' => 'Mật khẩu không bỏ trống'
        ]);

        $data['customer_name'] = $request->customer_name;
        $data['customer_address'] = $request->customer_address;
        $data['customer_gender'] = $request->customer_gender;
        $data['customer_birth'] = $request->customer_birth;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_status'] = $request->customer_status;
        $data['customer_image'] = $request->customer_image;
        $data['customer_password'] = md5($request->password);
        $get_image =$request-> file('customer_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/customer',$new_image);
          $data['customer_image']=$new_image; 

          

        $idcustomer = DB::table('tbl_customers')->insert($data);
    

        Session::put('message','Thêm user thành công');
        return Redirect::to('all-customer');
        }
        $data['customer_image']=''; 
        DB::table('tbl_customers')->insert($data);






        Session::put('message','Thêm tin tức thành công');
        return Redirect::to('all-customer');

    }
     public function change_customer_info(Request $request){
       
        $data = array();
        
       

         $data['customer_name'] = $request->customer_name;
         $data['customer_email'] = $request->customer_email;
         $data['customer_phone'] = $request->customer_phone;
          $data['customer_gender'] = $request->customer_gender;
            $data['customer_address'] = $request->customer_address;
             $data['customer_birth'] = $request->customer_birth;
         
         
        
    

        Session::put('message','Cap nhat thành công');
        
       $customer_id = \Session::get('customer_id');

        DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        \Session::put('customer_name',$request->customer_name);
        return redirect()->back();

    }
     public function unactive_customer($customer_id){
        $this->AuthLogin();
     	DB::table('tbl_customers')->where('customer_id',$customer_id)->update(['customer_status'=>0]);
     	 Session::put('message','Không kích hoạt khách hàng thành công');
     	return Redirect::to('all-customer');
     }
     public function active_customer($customer_id){
        $this->AuthLogin();
     	DB::table('tbl_customers')->where('customer_id',$customer_id)->update(['customer_status'=>1]);
     	 Session::put('message','Kích hoạt khách hàng thành công');
     	return Redirect::to('all-customer');
     }
     public function edit_customer($customer_id){
        $this->AuthLogin();

      

     	$edit_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();
    	return view('admin.edit_customer')->with('edit_customer',$edit_customer);
       //// return view('admin.edit_customer')->with('admin.edit_customer',$manager_customer);

     }
     public function update_customer(Request $request, $customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
      
        $data['customer_content'] = $request->customer_content;
        $data['customer_desc'] = $request->customer_desc;
       
        $data['customer_status'] = $request->customer_status;
        $get_image = $request->file('customer_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/customer',$new_image);
          $data['customer_image']=$new_image; 
        DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-customer');
        }
       DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-customer');
     }
     public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa tin tức thành công');
        return Redirect::to('all-customer');

     }
     public function forgot_password(Request $request)
     {
             $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();


        return view('pages.forgotpassword.forgot_password')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
     }
      public function send_forgot_password(Request $request)
     {
           $email = $request->email_account;
           $customer = \App\Customer::where('customer_email', $email)->first();
           if($customer == null){
                Session::put('message','Email không tồn tại');
                return Redirect::to('/forgot-password');
           }else{

                $passwordReset = \App\PasswordReset::updateOrCreate([
                    'email' => $email,
                ], [
                    'token' => Str::random(60),
                ]);
                $token = $passwordReset->token;
                \Mail::send('pages.forgotpassword.send_mail', array('token'=>  $token), function($message) use($email){
                    $message->to($email, 'Shop Thành Ngụy')->subject('Quên mật khẩu');
                });
                Session::put('message','Đã gửi email, vui lòng kiểm tra email để xác nhận');
                return redirect()->back();
           }
           
     }
     public function reset_password(Request $request, $token){
         $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();



        return view('pages.forgotpassword.reset_password')->with('token', $token)->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
     }
     public function save_reset_password(Request $request){

         $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],[
            'confirmed' => 'Xác nhận mật khẩu bị sai',
            'required' => 'Mật khẩu không bỏ trống'
        ]);
         $token = $request->token;
         $passwordReset = \App\PasswordReset::where('token', $token)->first();
         if($passwordReset != null){
             $user = \App\Customer::where('customer_email', $passwordReset->email)->firstOrFail();

             $updatePasswordUser = $user->update(['customer_password' => md5($request->password) ]);
             $passwordReset->delete();

             Session::put('message','Cập nhật mật khẩu thành công');
             return redirect()->back();
        }else{
            Session::put('message','Đường dẫn không hơp lệ');
            return redirect()->back();
        }
     }
     public function customer_info(Request $request)
     {
         $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();



        return view('pages.customer.customer_info')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
     }
     
}
