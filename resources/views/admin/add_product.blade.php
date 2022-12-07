@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Thêm sản phẩm</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Thêm sản phẩm</h2>
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
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
    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" date-validation="length" date-validation-length="min3"  name="product_name" class="form-control" id="exampleInputEmail1" placeholder="tên sản phẩm">
  </div>
 
  <div class="form-group">
    <label for="exampleInputEmail1">Giá sản phẩm</label>
    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
    <input type="file" name="product_image" class="form-control" id="input_product_image">
    <img id="img_product">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"> 
    </textarea> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditor" placeholder="Nội dung sản phẩm">
    </textarea> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
    <select name="product_cate" id="selector1" class="form-control1">
      @foreach($cate_product as $key => $cate)
      <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Thương hiệu</label>
    <select name="product_brand" id="selector1" class="form-control1">
      @foreach($brand_product as $key => $brand)
      <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hiển thị</label>
    <select name="product_status" id="selector1" class="form-control1">
      <option value="0">Ẩn</option>
      <option value="1">Hiển thị</option>
      
    </select>
  </div>
  <button type="submit" name="add_product" class="btn btn-default">Thêm sản phẩm</button>
</form>
@endsection