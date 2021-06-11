 @extends('welcome')
@section('content')
<div class="banner1">
			<div class="container">
				<h3><a href="">Trang chủ</a> / <span>Lịch sử đặt hàng</span></h3>
			</div>
		</div>
<section id="cart_items">
			  <div class="invoice-box">
			  	<div class="background-title-bill">
			  		 <div class="logo-nav">
                        <div class="logo-nav-left">
                            <h1><a href="{{URL::to('/trang-chu')}}">KT-Clothing<span>Fashion is Art</span></a></h1>
                        </div>
                    </div>
			  	</div>	
                @foreach($donhang as $order)
                 @php
        $details = $order->details;
        
            @endphp
        <div class="box">
        <table cellpadding="0" cellspacing="0" style="margin-bottom: 10px">
            
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
                    Mã đơn hàng : {{  $order->order_id }}
                </td>
                    <td>
                    Trạng thái : @if($order->order_status == 'dangcho')
                                  Đang chờ xử lý
                                  @elseif($order->order_status == 'danggiao')
                                  Đã xác nhận đơn hàng
                                  @elseif($order->order_status == 'dagiao')
                                  Đã giao
                                  @else
                                  Hủy
                                  @endif
                </td>   
            </tr>
            <tr>
                <td>
                    Phương thức thanh toán : Giao hàng nhận tiền
                </td>
            </tr>
            <tr>
                 <td>
                    Ngày đặt : {{ $order->created_at->format("h:i:s d/m/Y") }}
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

            
            <tr class="bill-details">
           
                         @php 
                                $totalPrice = 0;
                        @endphp
                        @foreach($details as $chitiet)

                        @php 
                                $product =  $chitiet->product;
                                $gia = $product->product_price;
                                $giaGiam = $gia - $gia *  $product->discount / 100;
                                $tong = $giaGiam * $chitiet->product_sales_quantity;
                                $totalPrice += $tong;
                        @endphp
                             
                            <tr class="item">
                                <td>
                                    {{ $product->product_name }}
                                </td>
                                <td>
                                    {{$chitiet->product_sales_quantity}}
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
                      <tr>
                          <td colspan="2">Tổng</td>
                          <td colspan="10"> <b class="text-success">{{ number_format($totalPrice) . ' vnđ'}}</b></td>
                      </tr>
            
</tr>
            
        </table>
    </div>
        @endforeach
    </div>
		</div>
	</section> <!--/#cart_items-->

@endsection