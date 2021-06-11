@extends('admin_layout')
@section('admin_content')
<!--top-->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý size
    </div>
    <!--mid-->
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
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($sizes as $key => $size)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$size->name}}</td>
            <td>
              <a href="{{URL::to('edit-size/'.$size->size_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này chưa?')" href="{{URL::to('delete-size/'.$size->size_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
  </div>
    <!--bot-->
    <footer class="panel-footer">
      <div class="row">
       <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
        </div>
    </footer>
  </div>
</div>
@endsection 