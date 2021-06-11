@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật size
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
                             <form role="form" action="{{URL::to('/update-size')}}" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                           
                            <div class="position-center">
                                
                                 {{csrf_field()}} 
                                <select name="size" class="form-control input-sm m-bot15">
                                <option @if(6 == $id) selected @endif value="s">S</option>
                                <option @if(7 == $id) selected @endif value="m">M</option>
                                <option @if(8 == $id) selected @endif value="l">L</option>
                                <option @if(9 == $id) selected @endif value="xl">XL</option>
                                <option @if(10 == $id) selected @endif value="xxl">XXL</option>
                                </select>
                             </div> 
                            <div class="form-group">
                                  
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật size</button>
                            
                            </div> 
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                    </form>    
                            </div>
                            </div>
                             </div> 
                        </div>
@endsection 