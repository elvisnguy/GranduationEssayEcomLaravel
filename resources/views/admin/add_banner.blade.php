        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm banner
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
                             <form role="form" action="{{URL::to('/save-banner')}}" method="post" enctype="multipart/form-data">
                                                     {{csrf_field()}} 
                                                      
                                                     <div class="form-group">
                                                        <label for="exampleInputEmail1">Tên banner</label>
                                                        <input name="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Tên banner">
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Hình banner</label>
                                                        <input type="file" name="banner_image" class="form-control" id="exampleInputEmail1" >
                                                    </div>
                                                   
                                                   <div class="form-group">
                                               <label for="exampleInputPassword1">Hiển thị</label>
                                               <select name="banner_status" class="form-control input-sm m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                                </select>
                                            </div>
                                                   
                                    <button type="submit" name="add_banner" class="btn btn-info">Thêm banner</button>             
                                  </form>
                            </div>

                        </div>


                
      
             </div> 
        </div>
    
    @endsection 