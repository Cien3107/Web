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
					<li>Thông tin khách hàng</li>
				</ul>
			</div>
		</div>
</div>
<div class="container py-xl-4 py-lg-2">
	<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thông tin gửi hàng</h4>
					@if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
					<form method="POST">
						{{ csrf_field() }}
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="shipping_name" type="text" name="shipping_name" placeholder="Họ và Tên">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="shipping_phone" placeholder="Số điện thoại" name="shipping_phone" >
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="shipping_email" placeholder="E-mail" name="shipping_email">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="shipping_address" placeholder="Địa chỉ" name="shipping_address">
											</div>
										</div>

										@if(Session::get('fee'))
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="hidden" class="order_fee" name="order_fee" value="{{Session::get('fee')}}" >
											</div>
										</div>
										@else
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="hidden" class="order_fee" name="order_fee" value="25000" >
											</div>
										</div>
										@endif

										@if(Session::get('coupon'))
											@foreach (Session::get('coupon') as $key => $cou)
											<div class="w3_agileits_card_number_grid_right form-group">
												<div class="controls">
													<input type="hidden" class="order_coupon" name="order_coupon" value="{{$cou['coupon_code']}}">
												</div>
											</div>
											@endforeach
										@else
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="hidden" class="order_coupon" name="order_coupon" value="Không">
											</div>
										</div>
										@endif
										
									</div>
									<div class="controls form-group">
										<select class="option-w3ls payment_select" name="payment_select">
											<option>Hình thức thành toán</option>
											<option value="0">Chuyển khoản</option>
											<option value="1">Tiền mặt</option>
											

										</select>
									</div>
								</div>

								<button class="btn btn-primary send_order" type="button"  name="send_order">Xác nhận đơn hàng</button>
								<!-- <div class="address submit">
									<div class="checkout-right-basket">
										<input type="submit"  name="send_order" value="Gửi" />
									</div>
								</div> -->
							</div>
						</div>
					</form>
					<br>
					<!-- <form>
					    {{ csrf_field() }}
					   
					    <div class="controls form-group">
					      
					      <select name="city" id="city" class="controls form-group choose city" >
					        	<option value="">------Chọn tỉnh thành phố------</option>
					        @foreach($city as $key => $tp)
					        	<option value="{{$tp->matp}}">{{$tp->name_city}}</option>
					        @endforeach
					      </select>
					    </div>
					    <div class="controls form-group">
					      
					      <select name="province" id="province" class="controls form-group province choose ">
					        <option value="">------Chọn quận huyên------</option>
					        
					        
					      </select>
					    </div>
					    <div class="controls form-group">
					      
					      <select name="wards" id="wards" class="controls form-group wards">
					        <option value="">------Chọn xã phường------</option>
					        
					        
					      </select>
					    </div>
					    <input  class="btn btn-primary tinh_ship" type="button" name="tinh_phi" value="Phí vận chuyển">
  					</form>   -->
					
				</div>
				<br>
				<div class="checkout-right">
				@if(Session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@elseif(Session()->has('error'))
					<div class="alert alert-danger">
						{{ session()->get('error') }}
					</div>
				@endif
				<div class="table-responsive">
					<form action="{{url('/update-cart')}}" method="POST">
						{{ csrf_field() }}
					
					<table class="timetable_sub">
						<thead>
							<tr>
								
								<th>Hình ảnh</th>
								<th>Số lượng</th>
								<th>Sản phẩm</th>

								<th>Giá</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@if(Session::get('cart')==true)
							@php
								$total = 0;
							@endphp
							@foreach(Session::get('cart') as $key => $cart)
								@php
									$subtotal = $cart['product_price']*$cart['product_qty'];
									$total += $subtotal;
								@endphp
							<tr class="rem1">
								
								<td class="invert-image">
									<a href="">
										<img src="{{asset('public/upload/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										
											
												
													<input class="entry value" type="text" name="cart_qty[{{$cart['session_id']}}]" min="1" value="{{$cart['product_qty']}}"  >
													
													
							
												
											
										
									</div>
								</td>
								<td class="invert">{{$cart['product_name']}}</td>
								<td class="invert">
									{{number_format($subtotal,0,',','.')}}VND
											
								</td>
								<td class="invert">
									<div class="rem">
										
										<a href="{{url('/xoa-sp/'.$cart['session_id'])}}"><i class="close1"></i></a>
									</div>
								</td>
							</tr>
							
							@endforeach
							<td>
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-success btn-sm">
								
							</td>
							
						</tbody>
					
					</form>
				</div>
				<div  style="background-color: #F5F2F2" >
					
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
								<table class="table" >
									<tr>
										<form method="POST" action="{{url('/check-coupon')}}" >
											{{ csrf_field() }}
						                  	<input  type="text" name="coupon" class="form-control" placeholder="Nhập mã giảm giá"><br>
						                    <input type="submit"  class="btn btn-success check_coupon" name="check_coupon" value="Áp giảm giá">
						                    
						                </form>
									</tr>
									<tr>
										<td style="font-weight: bold;">Tổng</td>
										<td style="text-align: left;">{{number_format($total,0,',','.')}}VND</td>
									</tr>
									@if(Session::get('coupon'))
												@foreach(Session::get('coupon') as $key =>$cou)
													@if($cou['coupon_condition'] == 1)
									<tr>
										<td style="font-weight: bold;">
											
														Giảm Coupon:@if(Session::get('coupon'))
												                    <a href="{{url('/del-coupon')}}" class="btn btn-danger check_out">Xóa mã</a>
												                    @endif
										</td>
										<td style="text-align: left;">{{$cou['coupon_number']}} %</td>
									</tr>
									<tr>
										<td style="font-weight: bold;">@php
																		$total_coupon = ($total * $cou['coupon_number'])/100;
																		echo 'Tổng giảm:
										<td style="text-align: left;">'.number_format($total_coupon,0,',','.').'VND';
																	@endphp</td>
									</tr>
									<tr>
										@php
											$total_after_coupon = $total - $total_coupon;
										@endphp
									</tr>
									
													@else
									<tr>
										<td style="font-weight: bold;">
														
														Giảm Coupon:@if(Session::get('coupon'))
													                  <a href="{{url('/del-coupon')}}" class="btn btn-danger check_out">Xóa mã</a>
													                @endif
										</td>
										<td style="text-align: left;">{{number_format($cou['coupon_number'],0,',','.')}} VND
																		@php
																			$total_coupon = $total - $cou['coupon_number'];
																		
																		@endphp
										</td>
									</tr>
									<tr>
										@php
											$total_after_coupon = $total_coupon;
										@endphp
									</tr>
									
									
													@endif
												@endforeach		
												
													
											@endif

										@if(Session::get('fee'))
									<tr>
										<td style="font-weight: bold;">
											Phí vận chuyển:
										</td>
										<td style="text-align: left;">
											{{number_format(Session::get('fee'),0,',','.')}}VND
											@php $total_after_fee = $total - Session::get('fee'); @endphp
										</td>
									</tr>
										@endif
									<tr>
										<td style="font-weight: bold;">Tổng Còn:</td>
										<td style="text-align: left;">
										@php
										
											if(Session::get('fee') && !Session::get('coupon')){
												$total_after = $total_after_fee;
												echo number_format($total_after,0,',','.').'VND';

											}elseif(!Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												echo number_format($total_after,0,',','.').'VND';

											}elseif(Session::get('fee') && Session::get('coupon')){
												$total_after = $total_after_coupon;
												$total_after = $total_after - Session::get('fee');
												echo number_format($total_after,0,',','.').'VND';

											}elseif(!Session::get('fee') && !Session::get('coupon')){
												$total_after = $total;
												echo number_format($total_after,0,',','.').'VND';
										
										
											}
										
										@endphp
										</td>
									</tr>
								</table>
							</div>
							
						</div>
						

						<br>

					</div>
						
					</div>
					
					<!-- <div class="checkout-right-basket">
						
						
						
						
					</div> -->
				</div>
				@endif
				</table>
			</div>
	</div>
</div>
@endsection