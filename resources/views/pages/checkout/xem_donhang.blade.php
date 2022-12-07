@extends('welcome')
@section('content')
<div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{URL::to('/')}}">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
</div>
<div class="container py-xl-4 py-lg-2">
    <div class="checkout-left">
    <h2 id="forms-example" class="">Liệt kê đơn hàng</h2>
    <?php  $content=Cart::content();
               
            $customer_id=Session::get('customer_id');

    ?>
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
          @foreach($getorder as $key => $ord)
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
                  <a href="{{URL::to('/huy-don/'.$ord->order_code)}}">Hủy Đơn</a>
              @elseif($ord -> order_status == 2)
                  Đang giao
               @elseif($ord -> order_status == 3)
                  Đã giao
              @else
                  Đã hủy
              @endif
            </td>
            
            <td>
              
                <a href="{{URL::to('/view-history/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-search" style="font-size: 30px;"></i>
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