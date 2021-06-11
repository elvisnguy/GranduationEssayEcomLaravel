<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

// session_start();

class newsController extends Controller
{
     public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
     public function add_news(){
        $this->AuthLogin();
       

    	return view('admin.add_news');

    }
    public function all_news(){
        $this->AuthLogin();
    	$all_news = DB::table('tbl_news')->get();
      
       
    	
        return view('admin.all_news')->with('all_news',$all_news);
    }
    public function save_news(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['news_name'] = $request->news_name;
        $data['news_content'] = $request->news_content;
        $data['news_desc'] = $request->news_desc;
        
        
        $data['news_status'] = $request->news_status;
        $data['news_image'] = $request->news_image;
        $get_image =$request-> file('news_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/news',$new_image);
          $data['news_image']=$new_image; 

          

        $idnews = DB::table('tbl_news')->insert($data);
    
        





        Session::put('message','Thêm tin tức thành công');
        return Redirect::to('all-news');
        }
        $data['news_image']=''; 
        DB::table('tbl_news')->insert($data);






        Session::put('message','Thêm tin tức thành công');
        return Redirect::to('all-news');

    }
     public function unactive_news($news_id){
        $this->AuthLogin();
     	DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=>0]);
     	 Session::put('message','Không kích hoạt tin tức thành công');
     	return Redirect::to('all-news');
     }
     public function active_news($news_id){
        $this->AuthLogin();
     	DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=>1]);
     	 Session::put('message','Kích hoạt tin tức thành công');
     	return Redirect::to('all-news');
     }
     public function edit_news($news_id){
        $this->AuthLogin();

      

     	$edit_news = DB::table('tbl_news')->where('news_id',$news_id)->get();
    	return view('admin.edit_news')->with('edit_news',$edit_news);
       //// return view('admin.edit_news')->with('admin.edit_news',$manager_news);

     }
     public function update_news(Request $request, $news_id){
        $this->AuthLogin();
        $data = array();
        $data['news_name'] = $request->news_name;
      
        $data['news_content'] = $request->news_content;
        $data['news_desc'] = $request->news_desc;
       
        $data['news_status'] = $request->news_status;
        $get_image = $request->file('news_image');
        if($get_image)
        {
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image = $name_image . rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads/news',$new_image);
          $data['news_image']=$new_image; 
        DB::table('tbl_news')->where('news_id',$news_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-news');
        }
       DB::table('tbl_news')->where('news_id',$news_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-news');
     }
     public function delete_news($news_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->delete();
        Session::put('message','Xóa tin tức thành công');
        return Redirect::to('all-news');

     }
     //End Admin Page
     public function show_news(Request $request){
     	  $meta_desc = "Chuyên về thời trang Fast Fashion, thời trang của thời đại mới, lịch sự và nhanh chóng là những gì mà KT Clothing sẽ mang lại cho các bạn.";
        $meta_keyword = "thoi trang fast fashion, thời trang, quần áo";
        $meta_title ="KT Clothing Store - Fast Fashion";
        $url_canonical = $request->url();

        $news = \App\News::orderBy('news_id','desc')->paginate('12');

        return view('pages.news.show_news')->with('meta_desc',$meta_desc)->with('meta_keyword', $meta_keyword)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('news', $news);
     }
}
