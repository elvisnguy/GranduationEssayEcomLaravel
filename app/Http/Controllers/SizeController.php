<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

// session_start();

class SizeController extends Controller
{
     public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return Redirect::to('dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = DB::table('tbl_size')->orderby('size_id','desc')->get();

        return view('admin.all_size')->with('sizes', $sizes);
    }
    public function save_size(Request $request){

        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->size;
       
        DB::table('tbl_size')->insert($data);
        Session::put('message','Thêm danh size sản phẩm thành công');
        return Redirect::to('add-size');
     }
     public function delete_size($size_id){
        $this->AuthLogin();
        DB::table('tbl_size')->where('size_id',$size_id)->delete();
        Session::put('message','Xóa size thành công');
        return Redirect::to('all-size');

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function add_size(){
        $this->AuthLogin();
        return view('admin.add_size');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = DB::table('tbl_size')->where('size_id',$id)->first();
    
        return view('admin.edit_size')->with('size',$size)->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('tbl_size')->where('size_id',$request->id)->update(['name' => $request->size]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
