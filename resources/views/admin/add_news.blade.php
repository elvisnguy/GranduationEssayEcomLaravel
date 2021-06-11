        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm tin tức
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
                            <form role="form" action="{{URL::to('/save-news')}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                              
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tên tin tức</label>
                                <input data-validation="length" data-validation-length="min10" data-validation-error-msg="Hãy điền ít nhất 10 kí tự" type="text" name="news_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                            </div>
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình tin tức</label>
                                <input type="file" name="news_image" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả tin tức</label>
                                <textarea style="resize: none" rows="7" name="news_desc" class="form-control" id="ckeditor1" placeholder="Mô tả sản phẩm" ></textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung tin tức</label>
                                <textarea style="resize: none" rows="7" name="news_content" class="form-control" id="ckeditor" placeholder="Nội dung sản phẩm" ></textarea>
                            </div>
                            
                           
                       
</div>

<div class="form-group">
                   <label for="exampleInputPassword1">Hiển thị</label>
                   <select name="news_status" class="form-control input-sm m-bot15">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                    </select>
                <button type="submit" name="add_news" class="btn btn-info">Thêm tin tức</button>
        </form>
         </div> 
        </div>
        </div>
    </div>
    @endsection 