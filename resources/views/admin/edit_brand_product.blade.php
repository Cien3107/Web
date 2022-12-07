@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a >Cập nhật thương hiệu</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Cập nhật thương hiệu</h2>
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
    @foreach($edit_brand_product as $key => $edit_value)
    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên thương hiệu</label>
    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name"  class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc"  >{{$edit_value->brand_desc}}
    </textarea> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hiển thị</label>
    <select name="brand_product_status" id="selector1" class="form-control1">
      <option value="0">Ẩn</option>
      <option value="1">Hiển thị</option>
      
    </select>
  </div>
  @endforeach
  <button type="submit" name="update_brand_product" class="btn btn-default">Cập nhật thương hiệu</button>
@endsection