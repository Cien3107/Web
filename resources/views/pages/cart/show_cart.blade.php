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
				<span>G</span>iỏ hàng
			</h3>
			@if(Session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@elseif(Session()->has('error'))
					<div class="alert alert-danger">
						{{ session()->get('message') }}
					</div>
				@endif
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span>3 Products</span>
				</h4>
				<div class="table-responsive">
					<?php  
					$content = Cart::content();
			
					?>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Thứ tự</th>
								<th>Hình ảnh</th>
								<th>Số lượng</th>
								<th>Sản phẩm</th>

								<th>Giá</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($content as $v_content)
							<tr class="rem1">
								<td class="invert">1</td>
								<td class="invert-image">
									<a href="">
										<img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										
											<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
												{{ csrf_field() }}
												
												<input class="entry value" type="text" name="cart_quantity" value="{{$v_content->qty}}"  />
												<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control" />
												<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm" />
												
											</form>
										
									</div>
								</td>
								<td class="invert">{{$v_content->name}}</td>
								<td class="invert">
									<?php
										$subtotal = $v_content->price * $v_content->qty;
										echo number_format($subtotal).' '.'VND';
									?>
											
								</td>
								<td class="invert">
									<div class="rem">
										<!-- <div class="close1"><a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"></a> </div> -->
										<a  href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="close1"></i></a>
									</div>
								</td>
							</tr>
							
							@endforeach
						</tbody>
					</table>
					<div class="checkout-right-basket">
						
						<a href="{{URL::to('/show-checkout')}}" class="btn btn-default check_out">Thanh toán
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection