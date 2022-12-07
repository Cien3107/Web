@extends('welcome')
@section('content')
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<i>|</i>
					</li>
					<li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng
			</h3>
			@if(Session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@elseif(Session()->has('error'))
					<div class="alert alert-danger">
						{{ session()->get('error') }}
					</div>
				@endif
			<!-- //tittle heading -->
			<div class="checkout-right">
				
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
										<td style="font-weight: bold;">

															 Giảm còn:</td>
										<td style="text-align: left;">{{number_format($total-$total_coupon,0,',','.')}}VND
												
										</td>
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
										<td style="font-weight: bold;">

															 Giảm còn:</td>
										<td style="text-align: left;">{{number_format($total_coupon,0,',','.')}}VND
												
										</td>
									</tr>
													@endif
												@endforeach		
												
													
											@endif
								</table>
							</div>
							<div class="col-lg-6">
								<a href="{{URL::to('/show-checkout')}}" class="btn btn-default check_out">Thanh toán
									<span class="far fa-hand-point-right"></span>
								</a>
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