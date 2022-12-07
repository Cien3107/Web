@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Bài Viết</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Tất cả bài viết</h2>
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
            <th>tên bài viết</th>
            <th>Hình ảnh</th>
            <th>Ngày đăng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_post as $key => $pos)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pos -> ten_tin }}</td>
            <td><img src="public/upload/product/{{$pos ->image}}" width="75px" height="50px"></td>
            <td>{{ $pos -> ngay_dang }}</td>
            <td>
              
                <a href="{{URL::to('/edit-post/'.$pos->id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
             
              
              
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-post/'.$pos->id)}}" class="active styling-edit" ui-toggle-class="">
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