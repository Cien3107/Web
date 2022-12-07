@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Thương hiệu</a>
</ol>
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Liệt kê thương hiệu</h2>
 		<form>
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
            <th>tên thương hiệu</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_brand_product as $key => $brand_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $brand_pro -> brand_name }}</td>
            <td><span class="text-ellipsis">
              <?php
              if($brand_pro -> brand_status == 0){
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-eye"></span></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-eye-slash"></span></a>
                <?php
              }
              ?>


            </span></td>
            
            <td>
              
                <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
             
              
              
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
      
    </select>
  </div>
  
@endsection