 @extends('welcome')
@section('content')
<div class="banner1">
			<div class="container">
				<h3><a href="">Trang chủ</a> / <span>Thanh toán</span></h3>
			</div>
		</div>
<section id="cart_items">
		<div class="tksCustomer">
			<h2>Cảm ơn quý khách đã ủng hộ, vui lòng kiểm tra lại hóa đơn</h2>

			  <div class="invoice-box">
			  	<div class="background-title-bill">
			  		 <div class="logo-nav">
                        <div class="logo-nav-left">
                            <h1><a href="{{URL::to('/trang-chu')}}">KT-Clothing<span>Fashion is Art</span></a></h1>
                        </div>
                    </div>
			  	</div>
						
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                	@php 
                        $carts = Cart::content();
                		$id_order  = Session::get('order_id');

                		$order = \App\Order::find($id_order);
                		
                	@endphp
                    <table>
                        <tr>
                            
                            
                            <td>
                                Mã hóa đơn #: {{ $order->order_id }}<br>
                                Được tạo ngày: {{ $order->created_at }}<br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                KT-Clothing Fast Fashion.<br>
                                51/54/11 Cao Thắng<br>
                                Phường 3, Quận 3 Sài Gòn
                            </td>
                            
                            <td>
                                Lê Duy Khang - CEO<br>
                                Ngụy Vạn Thành - Giám đốc thời trang<br>
                                ktclothing@work.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
              
            <tr class="heading">
                <td>
                    Phương thức thanh toán
                </td>
                
                <td>
                    Khách hàng
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Giao hàng nhận tiền
                </td>

                <td>
                    {{ $order->customer->customer_name }}
                </td>
                
            </tr>
            <tr class="heading">
                <td>
                    Sản phẩm
                </td>
                <td>
                    Số lượng
                </td>
                <td>
                    Giá gốc
                </td>
                <td>
                    Giảm % còn
                </td>
                <td>
                    Tổng
                </td>
            </tr>
         
           <?php
                $content = Cart::content();
            ?>
            @php 
                    $totalPrice = 0;
            @endphp
            @foreach($content as $v_content)
                @php 
                    $product = \App\Product::find($v_content->id);
                    $gia = $product->product_price;
                    $giaGiam = $gia - $gia *  $product->discount / 100;

                    $tong = $giaGiam * $v_content->qty;
                    $totalPrice += $tong;

                @endphp
                <tr class="item">
                    <td>
                        {{ $product->product_name }}
                    </td>
                    <td>
                        {{$v_content->qty}}
                    </td>
                    <td>
                        {{ number_format($product->product_price) . ' vnđ'}}
                    </td>
                    <td>
                        {{ number_format($giaGiam) . ' vnđ'}}
                    </td>
                   
                    <td>
                        {{ number_format($tong) }} vnd
                    </td>
                </tr>
            @endforeach
          
            
            <tr class="total">
                <td></td>
                
                <td>
                   Tổng cộng: {{number_format($totalPrice) .' '.'VNĐ'}}
                </td>
            </tr>
        </table>
    </div>
		</div>
	</section> <!--/#cart_items-->
    @php 
        Cart::destroy();
        Session::forget('order_id');
    @endphp
@endsection