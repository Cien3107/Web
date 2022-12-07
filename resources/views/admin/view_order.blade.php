@extends('admin_layout')
@section('admin_content')


<section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{URL::to('/all-order')}}">Đơn hàng</a></li>
            <li class="active">chi tiết đơn hàng</li>
        </ol>
    </section>
       <section class="content">
        <!-- Default box -->

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <table id="myTable" class="table table-bordered table-hover dataTable" style="width: 97%;
    margin: 16px;" role="grid" aria-describedby="example2_info">
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
                                    <td>{{$details->product_name}}</td>
                                    <td>{{$details->product_sales_quantity}}</td>
                                    <td>
                                        @if( $details->product_sales_quantity != 'Không')
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
                                      <?php $total_coupon = 0; ?>  
                                     
                                      
                                      @if( $coupon_condition == 1)
                                        @php
                                          $total_after_coupon = ($total * $coupon_number)/100;
                                          echo 'Tổng giảm:' .number_format($total_after_coupon,0,',','.').'<br>';
                                          $total_coupon = $total - $total_after_coupon;
                                        @endphp
                                      @else
                                        @php
                                          echo 'Tổng giảm:' .number_format($coupon_number,0,',','.').'VND'.'<br>';
                                          $total_coupon = $total - $coupon_number;
                                        @endphp
                                      @endif  
                                   
                                      Thanh toán: {{number_format($total_coupon,0,',','.')}}VND
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
               
                <form action="{{URL::to('/save-delivery-notes/'.$ma_ddh)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="ma_ddh_h" value="<?php echo $ma_ddh; ?>">
                    <input type="hidden" name="email_h" value="<?php echo $admin_email; ?>">
                    <input type="hidden" name="tong_tt_h" value="<?php echo $total_coupon; ?>">
                    
                    <button>Giao</button>
                </form>
                <?php
                $message = Session::get('message');
                if($message){
                  echo '<span class="text-alert">',$message,'</span>';
                  Session::put('message',null);
                }
                ?>
            </div>
        </div>
    </section>
     
  </div>
</div>
</section>
</section>
@endsection
