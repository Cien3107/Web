@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Đơn hàng</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Liệt kê đơn hàng</h2>
    <form>
  <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
   <div style="float: right;">
      <form>
      <select name="status_order" style="border-radius:10px;">
        <option >Sắp xếp theo</option>
        <option value="1">Đơn hàng mới</option>
        <option value="2">Đang xử lý</option>
        <option value="3">Đã giao</option>
        <option value="4">Đã hủy</option>
      </select>
        <button class="btn btn-success">Tìm</button>
      </form>
    </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Tình trang đơn hàng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach($order as $key => $ord)
          @php
            $i++
          @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord -> order_code }}</td>
            <td>{{ $ord -> created_at }}</td>
            <td>
              @if( $ord -> order_status == 1)
                  Đơn hàng mới
              @elseif( $ord -> order_status == 2 )
                  Đã xử lý
              @elseif( $ord -> order_status == 3 )
                  Đã giao
              @else
                  Đã hủy
              @endif
            </td>
            
            <td>
              
                <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
              
              
             
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
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