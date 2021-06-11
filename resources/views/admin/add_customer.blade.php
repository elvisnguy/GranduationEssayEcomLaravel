        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm User
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   	<ul>
				   		@foreach ($errors->all() as $error)
					        <li>{{ $error }}</li>
					    @endforeach
				   	</ul>
				  </div>
					    
					@endif
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-customer')}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                              
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input data-validation="length" data-validation-length="min10" data-validation-error-msg="Hãy điền ít nhất 10 kí tự" type="text" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="Tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input   type="email" name="customer_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input   type="text" name="customer_phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình đại diện</label>
                                <input type="file" name="customer_image" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input   type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại Mật khẩu</label>
                                <input   type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Nhập lại Mật khẩu">
                            </div>
                        </div>





<div class="form-group">
			                   <label for="exampleInputPassword1">Hiển thị</label>
			                   <select name="customer_status" class="form-control input-sm m-bot15">
			                    <option value="0">Ẩn</option>
			                    <option value="1">Hiển thị</option>
			                    </select>
                <button type="submit" name="add_customer" class="btn btn-info">Thêm tin tức</button>
        </form>
         </div> 
        </div>
        </div>
    </div>
    @endsection 