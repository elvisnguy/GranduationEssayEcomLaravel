@extends('admin_layout')
@section('admin_content')
<!--top-->
	<div class="table-agile-info">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      Thông tin khách hàng
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
	             
	            <th>Tên khách hàng</th>
	            <th>Số điện thoại</th>
	           
	          
	            <th style="width:30px;"></th>
	          </tr>
	        </thead>
	        <tbody>
	          
	          <tr>
	            
	            <td>{{$order->customer->customer_name}}</td>
	            <td>{{$order->customer->customer_phone}}</td>
	            
	           
	          </tr>
	         
	        </tbody>
	      </table>
	    </div>
	    <!--bot-->
	    
	  </div>
	</div>
<br>
<div class="table-agile-info">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      Thông tin vận chuyển
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
	             
	            <th>Tên người nhận</th>
	            <th>Địa chỉ</th>
	            <th>Số điện thoại</th>
	           
	          
	            <th style="width:30px;"></th>
	          </tr>
	        </thead>
	        <tbody>
	          <tr>
	            
	            <td>{{$order->shipping->shipping_name}}</td>
	            <td>{{$order->shipping->shipping_address}}</td>
	            <td>{{$order->shipping->shipping_phone}}</td>
	          </tr>
	         
	        </tbody>
	      </table>
	    </div>
	    <!--bot-->
	    
	  </div>
	</div>
<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
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
            
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>% Giảm</th>
            <th>Tạm tính</th>
            <th>Tổng tiền</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($order->details as $k => $orderDetail)
          @php 
          	$tong = $orderDetail->product_sales_quantity * $orderDetail->product_price ;
          @endphp
          <tr>
          	<td>{{ $orderDetail->product->product_name }}</td>
          	<td>{{ $orderDetail->size->name }}</td>
          	<td>{{ $orderDetail->product_sales_quantity }}</td>
          	<td>{{ number_format($orderDetail->product_price) }}</td>
          	<td class="cart_discount">
								<p>{{number_format($orderDetail->product->discount)}}%</p>
			</td>
			<td class="cart_total">
								
								<p class="cart_total_price">
									<?php
									$subtotal= $orderDetail->product_price * $orderDetail->product_sales_quantity;
									$tong = $subtotal - $subtotal * $orderDetail->product->discount / 100;
							// $totalPrice += $tong;

									echo number_format($subtotal).' '.'VNĐ';
									?>
								</p>
							</td> 
          	<td>{{ number_format($tong) }} VNĐ</td>
          	<td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <form method="POST" id="frmStatus" action="{{ route('saveStatus') }}">
    	<div class="form-group">
		  <label for="sel1">Trạng thái:</label>

		  <select name="status" class="form-control" id="statusOrder">
		  	@php 
		  		$status = $order->order_status;
		  	@endphp	
		    <option @if($status == "dangcho") selected @endif value="dangcho">Đang chờ xử lý</option>
		    <option @if($status == "danggiao") selected @endif value="danggiao">Đã xác nhận đơn hàng</option>
		    <option @if($status == "dagiao") selected @endif value="dagiao">Đã giao</option>
		    <option @if($status == "huy") selected @endif value="huy">Hủy</option>
		  </select>
		  <script type="text/javascript">
		  		$("#statusOrder").change(function(){
		  			$("#frmStatus").submit();
		  		});
		  </script>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="order_id" value="{{ $order->order_id }}">
    </form>
    <!--bot-->
    <footer class="panel-footer">
      <div class="row">
      </div>
    </footer>
  </div>
</div>
@endsection 