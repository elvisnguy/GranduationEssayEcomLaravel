@extends('admin_layout')
@section('admin_content')
<!--top-->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
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
        <form id="frmStatus" action="#" method="get">
  <div class="form-group">
      <label for="sel1">Trạng thái:</label>

      <select name="status" class="form-control" id="statusOrder">
        <option @if(isset($params['status']) && $params['status']=="dangcho") selected @endif value="dangcho">Đang chờ xử lý</option>
        <option @if(isset($params['status']) && $params['status']=="danggiao") selected @endif value="danggiao">Đã xác nhận đơn hàng</option>
        <option @if(isset($params['status']) && $params['status']=="dagiao") selected @endif value="dagiao">Đã giao</option>
        <option @if(isset($params['status']) && $params['status']=="huy") selected @endif value="huy">Hủy</option>
      </select>
      
</div>
        </form>
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th>Tình trạng đơn hàng</th>
            <th>Mã</th>
            <th>% Giảm</th>
            <th>Ngày đặt</th>
            <th>Thành tiền</th>
            <th>Xem/Xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $key => $order)

          @php 
              $orderModel = \App\Order::find($order->order_id);
              $status = $orderModel->order_status;
              $coupon = $orderModel->coupon;

              if($coupon){
                  $discounCoupon =  $coupon->discount;
                 $discounName =  $coupon->name;
             }else{
                  $discounCoupon = 0;
                   $discounName =  '';
               }
               $thanhtien =  $order->order_total -  $order->order_total * $discounCoupon / 100;
            
          @endphp
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>

            <td>{{ $order->customer->customer_name}}</td>
            <td>{{ number_format($order->order_total) }}</td>
            <td>
              @if($status == 'dangcho')
              Đang chờ xử lý
              @elseif($status == 'danggiao')
              Đã xác nhận đơn hàng
              @elseif($status == 'dagiao')
              Đã giao
              @else
              Hủy
              @endif
            </td>
            <td>{{ $discounName }}</td>
            <td>{{ $discounCoupon }}%</td>
            <td>{{ $order->updated_at }}</td>
            <td>
            	{{ number_format($thanhtien) }}
            
            </td>
            <td>  <a href="{{URL::to('view-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
                @if($status == 'dagiao')
                @elseif($status == 'danggiao')
                @elseif($status == 'danggiao')
                @else
                </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này chưa?')" href="{{URL::to('delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
                </a>
                @endif
              
            </td>
          </tr>
          @endforeach
          <div class="pagi">
             {!! $all_order->links() !!}
           </div>
        </tbody>
      </table>
    </div>
  </div>
    <!--bot-->
    <footer class="panel-footer">
     
    </footer>
  </div>
</div>
<script>
  $("#statusOrder").change(function(){
    $("#frmStatus").submit();
  })
</script>
@endsection 