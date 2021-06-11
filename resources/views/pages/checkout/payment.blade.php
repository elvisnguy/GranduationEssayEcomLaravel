 @extends('welcome')
@section('content')
<div class="banner1">
			<div class="container">
				<h3><a href="">Trang chủ</a> / <span>Thanh toán</span></h3>
			</div>
		</div>
<section id="cart_items">
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
				 <?php
					   $content = Cart::content();
					   ?>

					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="discount">% Giảm</td>
							<td class="size">Kích cỡ</td>
							<td class="quantity">Số lượng</td>
							<td class="total-temp">Tạm tính</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

							@php 
							$totalPrice = 0;
						@endphp
						@foreach($content as $v_content)
						@php 
								$product = \App\Product::find($v_content->id);
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('/public/uploads/product/'.$v_content->options->image)}}" width="200px" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_discount">
								<p>{{ $product->discount }}%</p>
							</td>
							<td class="cart_size">
								@php 
			
									$sizeModel = \App\Size::where('size_id',$v_content->options->size)->first();
								@endphp
								<p>{{$sizeModel->name}}</p>
								
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
									<input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" class="form-control"> 
								    <input type="submit" name="update_qty" value="Cập nhật" class="btn btn-default btn-small">
								</form>
								</div>
							</td>
							<td class="cart_total">
								
								<p class="cart_total_price">
									<?php
									$subtotal= $v_content->price * $v_content->qty;
									$tong = $subtotal - $subtotal * $product->discount / 100;
							$totalPrice += $tong;

									echo number_format($subtotal).' '.'VNĐ';
									?>
								</p>
							</td>
							<td>
								<p>{{ number_format($tong) }} vnđ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
               <div class="optionsPayment">
               	<h2>Hình thức thanh toán</h2>
               </div>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{csrf_field()}}
			<div class="payment-options" >
					<!-- <span>
						<label><input type="checkbox" name="payment_options" value="1"> Trả bằng thẻ ATM</label>
					</span> -->
					<span>
						<label><input type="checkbox" name="payment_options" value="2"> Nhận tiền mặt</label>
					</span>
					<span>
						<!-- <label><input type="checkbox" name="payment_options" value="3"> Thanh toán thẻ ghi nợ</label>
					</span> -->
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
				</div>
				</form>
		</div>
	</section> <!--/#cart_items-->

@endsection