@extends('admin_layout')
@section('admin_content')
<!--top-->
<div class="table-agile-info">
  <div class="panel panel-default">
    
    <form id="frmThang" action="{{ route('thongke') }}" method="GET">
   
   <div class="form-group">
      <label for="id" class="col-md-2 control-label">Tháng</label>
    <div class="input-group">
      <span class="input-group-btn">
        <select class="form-control" name="thang" id="id">
          @for($i = 1; $i < 13; $i++)

            <option @if($params['thang'] == $i) selected=" " @endif value="{{ $i }}">Tháng {{ $i }}</option>
          @endfor
        </select>
      </span>

    </div>  
  </div>  
    </form>
    <h1>Tổng doanh thu: {{ number_format($tong) }} vnđ</h1>
  </div>
</div>







<script>
  $("#statusOrder").change(function(){
    $("#frmStatus").submit();
  })
  $("select[name='thang']").change(function(){
    $("#frmThang").submit();
  });
</script>
@endsection 