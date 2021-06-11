@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
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
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Kích cỡ</th>
            <th>Giới tính</th>
            <th>Hiển thị</th>
            <th>Bình luận</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)
          <tr>
            
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->product_name}}</td>
            <td>{{ number_format($pro->product_price).' '.'VNĐ'}}</td>
            <td><img src="public/uploads/product/{{ $pro->product_image}}" width="100"></td>
            <td>{{ $pro->category->category_name}}</td>
            <td>{{ $pro->brand->brand_name}}</td>
            <td>
              @php 
                $productModel = \App\Product::find($pro->product_id);
                $getSize = $productModel->sizes;
              @endphp
              @foreach($getSize as $k => $size)
              <span>{{ $size->name }} ({{ $size->pivot->quantity }})</span><br>
              @endforeach
            </td>
            <td>{{$pro->product_gender}}</td>
            <td><span class="text-ellipsis">
              <?php  
              if($pro->product_status==1){
                ?> <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-toggle-styling fa fa-toggle-on"></span></a>
                 
                <?php
                  }else{
                ?> 
             <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-toggle-styling fa fa-toggle-off"></span></a>
              <?php
                  }
              ?>

            </span></td>
            <td>
              <a href="{{ route('comment.manage', ['product_id' => $pro->product_id ]) }}">Manage</a>
            </td>
            <td>
              <a href="{{URL::to('edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này chưa?')" href="{{URL::to('delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
            
          </tr>
          @endforeach
           <div class="pagi">
             {!! $all_product->links() !!}
           </div>
          
          

        </tbody>
      </table>
    </div>

    <footer class="panel-footer">
     
    </footer>
  </div>
</div>
@endsection 