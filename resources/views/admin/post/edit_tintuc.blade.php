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
    @foreach($edit_post as $key => $edit_va)
        <form role="form" action="{{URL::to('/update-tintuc/'.$edit_va->id)}}" method="post" >
              {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Tên bài viết</label>
            <input type="text" value="{{$edit_va->ten_tin}}" name="post_name" class="form-control"  >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nội dung bài viết</label>
            <textarea style="resize:none" rows="8" class="form-control" id="ckeditor2" name="post_desc"  placeholder="Mô tả bài viết" >{{$edit_va->noi_dung}}
            </textarea> 
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
            <input type="file" name="post_image" class="form-control" id="input_product_image">
            <img src="{{URL::to('public/upload/product/'.$edit_va->image)}}" height="100" width="100">
          </div>

          <button type="submit" name="update_post" class="btn btn-default">Cập nhật bài viết</button>
        </form>
    @endforeach
@endsection