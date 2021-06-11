        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật sản phẩm
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="panel-body">
                        <div class="position-center">
                            @foreach($edit_product as $key => $pro)
                            <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                              
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{($pro->product_name)}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">% giảm</label>
                                <input type="text" data-validation="number" name="discount" class="form-control" id="exampleInputEmail1" value="{{$pro->discount}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="7" name="product_desc" class="form-control" id="ckeditor3"> {{$pro->product_desc}}</textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="7" name="product_content" class="form-control" id="ckeditor2">{{$pro->product_content}}</textarea>
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Kích cỡ(Size)</label>
                                @php 
                                    $allSize = \App\Size::all();
                                @endphp
                                @foreach($allSize as $k => $item)

                                <div class="checkbox">
                                      <label><input class="c_size" name="size[]" type="checkbox" value="{{ $item->size_id }}">{{ $item->name }}</label>
                                      
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giới tính</label>
                            <select name="product_gender" class="form-control input-sm m-bot15">
                            <option @if($pro->product_gender=='Nam') selected @endif value="Nam">Nam</option>
                            <option @if($pro->product_gender=='Nữ') selected @endif value="Nữ">Nữ</option>
                            <option @if($pro->product_gender=='Unisex') selected @endif value="Unisex">Unisex</option>
                         </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                    @if($cate->category_id == $pro->category_id)
                                    <option @if($pro->category_id==$cate->category_id) selected @endif selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                     <option @if($pro->category_id==$cate->category_id) selected @endif value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                     @endif
                                    @endforeach
                                </select>

            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                             @foreach ($brand_product as $key => $brand)
                              @if($brand->brand_id == $pro->brand_id)
                             <option @if($pro->brand_id==$brand->brand_id) selected @endif
                               selected value ="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                             @else
                             <option @if($pro->brand_id==$brand->brand_id) selected @endif value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                             @endif
                             @endforeach
                         </select>
</div> 
</div>
<div class="form-group">
                   <label for="exampleInputPassword1">Hiển thị</label>
                   <select name="product_status" class="form-control input-sm m-bot15">
                    <option @if($pro->product_status=='0') selected @endif  value="0">Ẩn</option>
                    <option @if($pro->product_status=='1') selected @endif value="1">Hiển thị</option>
                    </select>
                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                     </form>
@endforeach 
                 </div>
                
        </div>
        </div>
    </div>
    @endsection 