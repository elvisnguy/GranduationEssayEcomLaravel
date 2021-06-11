@extends('admin_layout')
@section('admin_content')
<!--top-->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý coupon
    </div>
    <!--mid-->
    <div class="table-responsive">
      <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã</th>
             <th>% Giảm</th>
            <th>Sửa/Xóa</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupons as $key => $coupon)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$coupon->name}}</td>
            <td>{{$coupon->discount}}</td>
            <td>
              <a href="{{URL::to('edit-coupon/'.$coupon->coupon_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này chưa?')" href="{{URL::to('delete-coupon/'.$coupon->coupon_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
  </div>
    <!--bot-->
    <footer class="panel-footer">
      <div class="row">
     
        </div>
    </footer>
  </div>
</div>
@endsection 