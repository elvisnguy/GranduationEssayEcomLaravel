<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class CommentController extends Controller
{
	public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
    public function manage($product_id){
    	$this->AuthLogin();
    	return view('admin.manage_comment')->with('product_id', $product_id);
    }
    public function add(Request $request){
    	$comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user_id = \Session::get('customer_id');
        $product = \App\Product::find($request->get('product_id'));
        $product->comments()->save($comment);
        return back();
    }
    public function delete($id){
    	\App\Comment::find($id)->delete();
    	Session::put('message','Xóa thành công');
    	return back();
    }
}
