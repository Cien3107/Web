@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Thêm Bài Viết</a>
</ol>
    <div class="grid-form">
        <div class="grid-form1">
        <h2 id="forms-example" class="">Thêm Bài Viết</h2>
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
        <form role="form" action="{{URL::to('/save-tintuc')}}" method="post" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên bài viết</label>
    <input type="text"  name="post_name" class="form-control"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nội dung bài viết</label>
    <textarea style="resize:none" rows="8" class="form-control" id="ckeditor2" name="post_desc"  placeholder="Mô tả bài viết" >
    </textarea> 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
    <input type="file" name="post_image" class="form-control" id="input_product_image">
    <img id="img_product">
  </div>
  <button type="submit" name="add_post" class="btn btn-default">Thêm bài viết</button>
</form>
@endsection