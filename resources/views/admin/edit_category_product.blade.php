@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a >Cập nhật Danh mục</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Cập nhật danh mục sản phẩm</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
    @foreach($edit_category_product as $key => $edit_value)
    <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả danh mục</label>
    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="ckeditor5" >{{$edit_value->category_desc}}
    </textarea> 
  </div>
  @endforeach
  <!-- <div class="row">
      <button type="button"  class="btn btn-default" data-toggle="modal" data-target="#Editmodal">Cập nhật danh mục</button>
        <div class="modal face" id="Editmodal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Cập nhật</h4>
                            
              </div>
              <div class="modal-body">
                
                 Danh mục cập nhật thành công
              </div>
            <div class="modal-footer">
              
               <button type="submit" name="update_category_product" class="btn btn-success"> OK </a></button>
            </div>
          </div>
        </div>
      </div>
              
    </div> -->
  <button type="submit" name="update_category_product" class="btn btn-default">Cập nhật danh mục</button>
@endsection