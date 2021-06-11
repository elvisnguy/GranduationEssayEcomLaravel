        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Đổi mật khẩu ADMIN
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
				   	<!-- <ul>
				   		@foreach ($errors->all() as $error)
					        <li>{{ $error }}</li>
					    @endforeach
				   	</ul> -->
				  </div>
					    
					@endif
                    <div class="panel-body">
                        <div class="position-center">
                           
                            <form role="form" action="{{URL::to('/save-change-pass-admin')}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu hiện tại</label>
                                <input   type="password" name="password_current" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu mới</label>
                                <input   type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại Mật khẩu mới</label>
                                <input   type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Nhập lại Mật khẩu">
                            </div>
                            <input type="hidden" name="id" value="">
                          
                            
                           
                       
</div>

				
                <button type="submit" name="add_customer" class="btn btn-info">Đổi mật khẩu</button>
        </form>
         </div> 
        </div>
        </div>
    </div>
    @endsection 