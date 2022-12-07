@extends('admin_layout')
@section('admin_content')
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Liệt kê mã giảm giá</h2>
 		<form>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
        
      </div>
    </div>
      
  <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên mã</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Điều kiện</th>
            <th>Số giảm</th>
            <th>Tình trạng</th>
            <th>Hết hạn</th>
            <td>Xóa mã</td>
            <th>Gửi mã</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cou -> coupon_name }}</td>
            <td>{{ $cou -> coupon_date_start }}</td>
            <td>{{ $cou -> coupon_date_end }}</td>
            
            <td>{{ $cou -> coupon_code }}</td>
            <td>{{ $cou -> coupon_time }}</td>
            
            <td><span class="text-ellipsis">
              <?php
              if($cou -> coupon_condition == 1){
                ?>
                giảm theo %
                <?php
              }else{
                ?>
                giảm theo tien
                <?php
              }
              ?>


            </span></td>

            <td><span class="text-ellipsis">
              <?php
              if($cou -> coupon_condition == 1){
                ?>
                giảm {{ $cou -> coupon_number }} %
                <?php
              }else{
                ?>
                giảm {{ $cou -> coupon_number }} VND
                <?php
              }
              ?>


            </span></td>

            <td><span class="text-ellipsis">
              <?php
              if($cou -> coupon_status == 1){
                ?>
                <span style="color: green;">Kích hoạt</span>
                <?php
              }else{
                ?>
                <span style="color: red;">Đã khóa</span>
                <?php
              }
              ?>


            </span></td>
            <td>
              
                @if($cou->coupon_date_end>$today)
                <span style="color: green;">Còn hạn</span>
                @else
                <span style="color: red;">Hết hạn</span>
                @endif

              
            </td>
            
            <td>
              
              <a onclick="return confirm('Bạn có chắc muốn xóa mã này?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
            <td>

              <p><a href="{{url('/send-coupon',[
                
                'coupon_time'=>$cou->coupon_time,
                'coupon_condition'=>$cou->coupon_condition,
                'coupon_number'=>$cou->coupon_number,
                'coupon_code'=>$cou->coupon_code
                ])}}" class="btn btn-success" style="margin:5px 0;">Gửi mã giảm giá khách</a></p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
      
    </select>
  </div>
  
@endsection