<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
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
        $coupons = DB::table('tbl_coupon')->orderby('coupon_id','desc')->get();

        return view('admin.all_coupon')->with('coupons', $coupons);
    }
    public function delete_coupon($id){
        \App\Coupon::find($id)->delete();
        return redirect()->back();
    }
    public function save_coupon(Request $request){

        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->coupon_name;
        $data['discount'] = $request->discount;
       
        DB::table('tbl_coupon')->insert($data);
        Session::put('message','Thêm danh coupon sản phẩm thành công');
        return Redirect::to('add-coupon');
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
    public function add_coupon(){
        $this->AuthLogin();
        return view('admin.add_coupon');

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
        $coupon = DB::table('tbl_coupon')->where('coupon_id',$id)->first();
    
        return view('admin.edit_coupon')->with('coupon',$coupon)->with('id', $id);
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
        DB::table('tbl_coupon')->where('coupon_id',$request->id)->update(['name' => $request->coupon]);
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
