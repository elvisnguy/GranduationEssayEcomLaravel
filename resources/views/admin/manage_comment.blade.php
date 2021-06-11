@extends('admin_layout')
@section('admin_content')
<!--top-->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     	List comments
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
    
    </div>
    <!--bot-->
    <footer class="panel-footer">
      <div class="row">
      		@php 

				$productModel = \App\Product::find($product_id);
			
				$comments = $productModel->comments()->orderBy('created_at','desc')->get();

			@endphp	
	        @foreach($comments as $comment)

	            <div class="display-comment">
	                <strong>{{ $comment->customer->customer_name }} <span class="timer"><i>{{ $comment->created_at->format('d/m/Y h:i:s') }}</i></span><a href="{{ route('comment.delete', ['id' => $comment->id ]) }}">Xóa</a></strong>
	                <p>{{ $comment->body }}</p>
	            </div>

	        @endforeach
       </div>
      </div>
    </footer>
  </div>
</div>
@endsection 