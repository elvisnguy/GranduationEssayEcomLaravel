        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm sản phẩm
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
                            <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                              
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input data-validation="length" data-validation-length="min10" data-validation-error-msg="Hãy điền ít nhất 10 kí tự" type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" data-validation="number" data-validation-error-msg="Hãy điền số tiền" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">% giảm</label>
                                <input type="text" name="discount" class="form-control" id="exampleInputEmail1" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="7" name="product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả sản phẩm" ></textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="7" name="product_content" class="form-control" id="ckeditor" placeholder="Nội dung sản phẩm" ></textarea>
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
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Unisex">Unisex</option>
                         </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>

            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                             @foreach ($brand_product as $key => $brand)
                             <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                             @endforeach
                         </select>
</div> 
</div>

<div class="form-group">
                   <label for="exampleInputPassword1">Hiển thị</label>
                   <select name="product_status" class="form-control input-sm m-bot15">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                    </select>
                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
        </form>
         </div> 
        </div>
        </div>
    </div>
    @endsection 