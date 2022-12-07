@extends('admin_layout')
@section('admin_content')
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Thêm mã giảm giá</h2>
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
 	<form role="form" action="{{URL::to('/code-coupon')}}" method="post" >
      {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên mã giảm giá</label>
    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày bắt đầu</label>
    <input type="text" name="coupon_date_start" class="form-control" id="start_coupon">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày kết thúc</label>
    <input type="text" name="coupon_date_end" class="form-control" id="end_coupon">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mã giảm giá</label>
    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số lượng mã</label>
    <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tính năng mã</label>
    <select name="coupon_condition" id="selector1" class="form-control1">
      <option value="0">----Chọn-----</option>
      <option value="1">Giảm theo %</option>
      <option value="2">Giảm theo tiền</option>
      
    </select> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nhập số % hoặc số tiền giảm</label>
    <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1"> 
  </div>
  
  <button type="submit" name="add_coupon" class="btn btn-default">Thêm mã</button>
@endsection