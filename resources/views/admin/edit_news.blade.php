        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật tin tức
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
                            @foreach($edit_news as $key => $pro)
                            <form role="form" action="{{URL::to('/update-news/'.$pro->news_id)}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}} 
                              
                             <div class="form-group">
                                <label for="exampleInputEmail1">Tên tin tức</label>
                                <input type="text" name="news_name" class="form-control" id="exampleInputEmail1" value="{{($pro->news_name)}}">
                            </div>
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình tin tức</label>
                                <input type="file" name="news_image" class="form-control" id="exampleInputEmail1" >
                                <img src="{{URL::to('public/uploads/news/'.$pro->news_image)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả tin tức</label>
                                <textarea style="resize: none" rows="7" name="news_desc" class="form-control" id="ckeditor3"> {{$pro->news_desc}}</textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung tin tức</label>
                                <textarea style="resize: none" rows="7" name="news_content" class="form-control" id="ckeditor2">{{$pro->news_content}}</textarea>
                            </div>
</div>
<div class="form-group">
                   <label for="exampleInputPassword1">Hiển thị</label>
                   <select name="news_status" class="form-control input-sm m-bot15">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                    </select>
                <button type="submit" name="add_news" class="btn btn-info">Cập nhật tin tức</button>
                     </form>
@endforeach 
                 </div>
 
        </div>
        </div>
    </div>
    @endsection 