@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tin tức
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
            <th>Tên tin tức</th>
            
            <th>Hình tin tức</th>
           
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_news as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->news_name}}</td>
         
            <td><img src="public/uploads/news/{{ $pro->news_image}}" width="100"></td>
           
           
           
            <td><span class="text-ellipsis">
              <?php  
              if($pro->news_status==1){
                ?> <a href="{{URL::to('/unactive-news/'.$pro->news_id)}}"><span class="fa-toggle-styling fa fa-toggle-on"></span></a>
                 
                <?php
                  }else{
                ?> 
             <a href="{{URL::to('/active-news/'.$pro->news_id)}}"><span class="fa-toggle-styling fa fa-toggle-off"></span></a>
              <?php
                  }
              ?>

            </span></td>
           
            <td>
              <a href="{{URL::to('edit-news/'.$pro->news_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này chưa?')" href="{{URL::to('delete-news/'.$pro->news_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
  
    <footer class="panel-footer">
    
    </footer>
  </div>
</div>
@endsection 