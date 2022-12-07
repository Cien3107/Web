@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Thêm danh mục</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Thêm danh mục sản phẩm</h2>
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
    <form role="form" action="{{URL::to('/save-category-product')}}" method="post" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" date-validation="length" date-validation-length="min3" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả danh mục</label>
    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="ckeditor3" placeholder="Mô tả danh mục" >
    </textarea> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hiển thị</label>
    <select name="category_product_status" id="selector1" class="form-control1">
      <option value="0">Ẩn</option>
      <option value="1">Hiển thị</option>
      
    </select>
  </div>
  <button type="submit" name="add_category_product" class="btn btn-default">Thêm danh mục</button>
</form>
@endsection