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
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12" style="display: contents;">
                        <table id="myTable" class="table table-bordered table-hover dataTable" style="width: 97%;margin: 16px;" role="grid" aria-describedby="example2_info">
                            <thead>
                                
                            
                            <tr role="row">
                                
                                <th >Tên sản phẩm</th>
                                <th >Số lượng</th>
                                <th >Coupon</th>
                                <th >Giá </th>
                                <th >Tổng tiền</th>
                                
                            </thead>
                            <tbody>
                              @php
                                $total = 0;
                              @endphp
                            @foreach ($order_details as $key => $details)
                              @php
                                $subtotal = $details->product_price *$details->product_sales_quantity;
                                $total += $subtotal;
                              @endphp
                                <tr>                     
                                    <td><a href="{{url('/chi-tiet/'.$details -> product-> product_id)}}">{{$details->product_name}}</a></td>
                                    <td>{{$details->product_sales_quantity}}</td>
                                    <td>
                                        @if( $details->product_sales_quantity != 'no')
                                            {{$details->product_coupon}}
                                        @else
                                            'Không'
                                        @endif
                                    </td>
                                    <td>{{number_format($details->product_price,0,',','.')}}VND</td>
                                    <td>{{number_format($subtotal,0,',','.')}}VND</td>
                                   
                                </tr>
                                <?php $ma_ddh=$details->order_code ?>
                            @endforeach
                                <tr>
                                  <td>
                                      @php
                                        $total_coupon = 0;
                                      @endphp
                                      @if( $coupon_condition == 1)
                                        @php
                                          $total_after_coupon = ($total * $coupon_number)/100;
                                          echo 'Tổng giảm: ' .number_format($total_after_coupon,0,',','.').' VND'.'<br>';
                                          $total_coupon = $total - $total_after_coupon;
                                        @endphp
                                      @else                                    

                                        @php
                                          echo 'Tổng giảm: ' .number_format($coupon_number,0,',','.').' VND'.'<br>';
                                          $total_coupon = $total - $coupon_number;
                                        @endphp
                                      @endif  

                                      Thanh toán: {{number_format($total_coupon,0,',','.')}} VND
                                  </td>
                                </tr>
                        </table>
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>

                            <table class="table table-bordered">
                                <thead>

                                <tr>
                                    <th class="col-md-4"><h5>THÔNG TIN KHÁCH HÀNG</h5></th>
                                    <th class="col-md-6" style="text-align: center;font-size: 25px;color: green;"><i class="fa fa-user" ></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $admin_email = Session::get('admin_email');
                                
                                
                             ?>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td>{{$customer->customer_name}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Số Điện Thoại</td>
                                    <td>{{$customer->customer_phone}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td>{{$customer->customer_email}}</td>
                                </tr>
                                
                                 
                                </tbody>
                            </table>

                        </div>
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>

                            <table class="table table-bordered">
                                <thead>

                                <tr>
                                    <th class="col-md-4"><h5>THÔNG TIN GIAO HÀNG</h5></th>
                                    <th class="col-md-6" style="text-align: center;font-size: 25px;color: red;"><i class="fa fa-user" ></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tên người nhận</td>
                                    <td>{{$shipping->shipping_name}}</td>
                                </tr>
                                    <tr>
                                        <td>Số Điện Thoại</td>
                                        <td>{{$shipping->shipping_phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>{{$shipping->shipping_email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Hình thức thanh toán</td>
                                        <td>
                                            @if( $shipping->shipping_name ==0 )
                                                Chuyển Khoản
                                            @else
                                                Tiền mặt
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                </div>
               
                
            </div>
        </div>
    </section>
     
  </div>
</div>
</section>
</section>
@endsection