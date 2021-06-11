<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;



class AdminController extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
    public function index(){
    	
    	return view('admin_login');
    }
    public function show_dashboard(){
      $this->AuthLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
       $admin_email = $request->admin_email;
       $admin_password  = md5($request->admin_password);

       $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
       if($result){
         Session::put('admin_name',$result->admin_name);
         Session::put('admin_id',$result->admin_id);
         return Redirect::to('/dashboard');
       }
       else{
       	Session::put('message','Sai mật khẩu hoặc tài khoản');
       	return Redirect::to('/admin');
       }
    }
     public function logout(){
      $this->AuthLogin();
       Session::put('admin_name',null);
       Session::put('admin_id',null);
         return Redirect::to('/admin');

    }
    public function change_pass_admin(){
      $this->AuthLogin();

      return view('admin.change_pass_admin');
    }
    public function save_change_pass_admin(Request $request){
        $this->AuthLogin();

          $id = Session::get('admin_id');
          $password_current = md5($request->password_current);
          $user = \App\Admin::where('admin_id', $id)->where('admin_password', $password_current )->first();
          
          if($user === null){
              Session::put('message','Mật khẩu hiện tại không đúng'); 
             return Redirect::to('/change-pass/' . $id);
          }else{
             $this->validate($request, [
                  'password' => 'required|confirmed|min:6',
              ],[
                  'confirmed' => 'Xác nhận mật khẩu bị sai',
                  'required' => 'Mật khẩu không bỏ trống'
              ]);
             $password_new = md5($request->password);
              \App\admin::where('admin_id', $id)->update(['admin_password' => $password_new ]);

              Session::put('message','Thay đổi mật khẩu thành công');
             return redirect()->back();
      }
    }
}
