@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Tài khoản</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Chi tiết khách hàng</h2>
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
            <th>Tên khách hàng</th>
            <th>Số lượng sp</th>
            <th>Đơn hàng</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_list_user as $key => $all)
          <tr>
            <td>{{ $all -> customer_name }}</td>
            <td>{{ $all -> tongsl }}</td>
            <td>{{ $all -> tongdon }}</td>
            <td>@php echo number_format( $all -> tongtien).' VND'; @endphp</td>
            <td>
              
               
              
              
             
              <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')" href="{{URL::to('/del-user/'.$all->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
      
    </select>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center" style="float: right;">
        
          
        </div>
        
      </div>
    </footer>
  </div>
  
@endsection