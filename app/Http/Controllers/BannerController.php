<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
     public function add_banner(){
        $this->AuthLogin();
      
    	return view('admin.add_banner');

    }
    public function all_banner(){
        $this->AuthLogin();
    	$all_banner = DB::table('tbl_banner')->get();
       
    	$manager_banner = view('admin.all_banner')->with('all_banner',$all_banner);
        return view('admin_layout')->with('admin.all_banner',$manager_banner);
    }
    public function save_banner(Request $request){
        $this->AuthLogin();
        $data = array();
       ;
        $data['banner_name'] = $request->banner_name;
     
        $data['banner_status'] = $request->banner_status;
        $data['banner_image'] = $request->banner_image;
        $get_image =$request-> file('banner_image');

        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/banner',$new_image);
          $data['banner_image']=$new_image; 

        Session::put('message','Thêm banner thành công');
        //return Redirect::to('all-banner');
        }
        DB::table('tbl_banner')->insert($data);
        Session::put('message','Thêm banner thành công');
        return Redirect::to('all-banner');

    }
     public function unactive_banner($banner_id){
        $this->AuthLogin();
     	DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>0]);
     	 Session::put('message','Không kích hoạt banner thành công');
     	return Redirect::to('all-banner');
     }
     public function active_banner($banner_id){
        $this->AuthLogin();
     	DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>1]);
     	 Session::put('message','Kích hoạt banner thành công');
     	return Redirect::to('all-banner');
     }
     public function edit_banner($banner_id){
        $this->AuthLogin();

    
     	$edit_banner = DB::table('tbl_banner')->where('banner_id',$banner_id)->get();
    	$manager_banner = view('admin.edit_banner')->with('edit_banner',$edit_banner);
    
        return view('admin_layout')->with('admin.edit_banner',$manager_banner);

     }
     public function update_banner(Request $request, $banner_id){
        $this->AuthLogin();
        $data = array();
        $data['banner_name'] = $request->banner_name;
        $data['banner_status'] = $request->banner_status;
        $get_image = $request->file('banner_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/banner',$new_image);
          $data['banner_image']=$new_image; 
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
        Session::put('message','Cập nhật banner thành công');
        return Redirect::to('all-banner');
        }
       DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
        Session::put('message','Cập nhật banner thành công');
        return Redirect::to('all-banner');
     }
     public function delete_banner($banner_id){
        $this->AuthLogin();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->delete();
        Session::put('message','Xóa banner thành công');
        return Redirect::to('all-banner');
     }
}
