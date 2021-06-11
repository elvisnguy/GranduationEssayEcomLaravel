        @extends('admin_layout')
        @section('admin_content')
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm size
                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                             <form role="form" action="{{URL::to('/save-size')}}" method="post" enctype="multipart/form-data">
                                    <div class="panel-body">
                                       
                                        <div class="position-center">
                                            
                                             {{csrf_field()}} 
                                            <select name="size" class="form-control input-sm m-bot15">
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                            </select>
                                         </div> 
                                         <div class="form-group">

                                            <button type="submit" name="add_product" class="btn btn-info">Thêm size</button>
                                       
                                        </div> 
                                     </div>
                                 </form>
                    </div>

                            
        </div>
                         
       
    @endsection 