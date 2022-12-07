@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Tài khoản</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Tài khoản khách hàng</h2>
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
            <th>Thứ tự</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ mail</th>
            <th>Số điện thoại</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach($all_list_user as $key => $all)
          @php
            $i++
          @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $all -> customer_name }}</td>
            <td>{{ $all -> customer_email }}</td>
            
            <td>{{ $all -> customer_phone }}</td>
            
            <td>
              
              <a href="{{URL::to('/details-user/'.$all->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-search" style="font-size: 30px;"></i>
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