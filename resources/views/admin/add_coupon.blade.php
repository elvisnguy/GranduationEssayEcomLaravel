@extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm coupon
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                     <form role="form" action="{{URL::to('/save-coupon')}}" method="post" enctype="multipart/form-data">
                        	<div class="form-group">
                                <label for="exampleInputEmail1">Tạo mã</label>
                                <input name="coupon_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">% giảm</label>
                                <input name="discount" class="form-control" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">

                                <button type="submit" name="add_product" class="btn btn-info">Tạo</button>
                                {{csrf_field()}} 
                            </form>
                            </div> 
                        </div>
        </div>
    </div>
    @endsection 