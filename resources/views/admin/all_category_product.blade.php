@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Danh mục</a>
</ol>
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Liệt kê danh mục sản phẩm</h2>
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
            <th>tên danh mục</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category_product as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cate_pro -> category_name }}</td>
            <td><span class="text-ellipsis">
              <?php
              if($cate_pro -> category_status == 0){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-eye"></span></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-eye-slash"></span></a>
                <?php
              }
              ?>


            </span></td>
            
            <td>
              
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

              <!-- <div class="row">
                <a  href="" class="active styling-edit" data-toggle="modal" data-target="#modaldel">
                  <i class="fa fa-times text-danger text"></i></a>
                    <div class="modal face" id="modaldel">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Xóa</h4>
                              
                          </div>
                          <div class="modal-body">
                              Bạn chắc chắn muốn xóa danh mục này không ?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-success"><a href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}"> OK </a></button>
                          </div>
                        </div>
                      </div>
                </div>
               -->
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
      
    </select>
  </div>
  
@endsection