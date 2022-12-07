@extends('welcome')
@section('content')
@foreach($product_details as $key => $value)
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{URL::to('/')}}">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>Chi tiết sản phẩm</li>
				</ul>
			</div>
		</div>
</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Thông
				Tin
				Sản
				Phẩm
			</h3>
			<!-- //tittle heading -->
			
			<div class="row">
				
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="{{URL::to('public/upload/product/'.$value->product_image)}}">
									<div class="thumb-image">
										<img src="{{URL::to('public/upload/product/'.$value->product_image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="{{URL::to('public/upload/product/'.$value->product_image)}}">
									<div class="thumb-image">
										<img src="{{URL::to('public/upload/product/'.$value->product_image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="{{URL::to('public/upload/product/'.$value->product_image)}}">
									<div class="thumb-image">
										<img src="{{URL::to('public/upload/product/'.$value->product_image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
						<h2 class="mb-3">{{$value->product_name}}</h2>
						<!-- <ul class="list-inline" style="display: -webkit-box;" title="Average Rating">
						@for($count = 1; $count <= 5; $count++)	
							@php
								if($count <= $rating){
									$color = 'color:#ffcc00;';
								}else{
									$color = 'color:#ccc;';
								}
							@endphp
							<li title="star_rating"
							id="{{$value->product_id}}-{{$count}}" 
							data-index="{{$count}}"
							data-product_id="{{$value->product_id}}"
							data-rating="{{$rating}}"
							

							style=" {{$color}} font-size: 30px;" 
							>
								&#9733;
							</li>
						@endfor
						</ul> -->
						<p class="mb-3">
						
						<ul class="tag-men">
							
								<p>Mã ID: {{$value->product_id}}</p>
								<p>Thương hiệu: {{$value->brand_name}}</p>
								<p>Danh mục: {{$value->category_name}}</p>
						</ul>
					
					</p>
					
						
					
					<div class="single-infoagile">
						<div style="font-size: 15px;" >
							<h3>Chi tiết</h3>
							<p>{!!$value->product_desc!!}</p>
						</div>
						<!-- <div style="font-size: 13px;">
							<h3>Nội dung</h3>
							<p>{!!$value->product_content!!}</p>
						</div> -->
						<p class="my-sm-4 my-3">
								<i class="fas fa-retweet mr-3"></i>Thanh toán khi nhận hàng & Thẻ ngân hàng Credit/ Debit/ ATM card
						</p>
							
					</div>
					
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="{{URL::to('/save-cart')}}" method="POST">
							{{ csrf_field() }}
								<!-- <ul>
									
										<label>Số Lượng</label>
											<input name="qty" type="text" class="entry value" min="1" value="1" />
											<input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
									</ul> -->
									<br>
									<ul>
									
										<label>Giá:</label>	
										<span class="item_price">{{number_format($value->product_price).'VND'}}</span>
									
								</ul>
								<br>
								<fieldset>

									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                   	<input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">

									<!-- <input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" class="cart_product_qty_{{$value->product_id}}" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}" />
									<input type="hidden" name="amount" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}" />
									<input type="hidden" name="image" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<input type="hidden" name="currency_code" value="VND" /> -->


									<?php
		                        	$customer_id = Session::get('customer_id');
		                        		if($customer_id != NULL){
				                	?> 
				                		<button type="button" value="Add to cart" name="add-to-cart" data-id_product="{{$value->product_id}}" class="btn btn-default add-to-cart"><!-- <i class="fa fa-shopping-cart"></i> -->
                                         Thêm giỏ hàng
                                        </button>
				                    	<!-- <input type="submit" name="submit" value="Thêm giỏ hàng" class="fa fa-shopping-cart" /> -->
									
									 
				                	<?php 
				                     	}else{
				                	?>
				                		<button type="submit" name="submit"  class="btn btn-default cart"><a href="{{URL::to('/login-checkout')}}" data-toggle="modal" data-target="#exampleModal" class="text-red"><i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng</a>
										</button>
				                		<!-- <input type="submit" name="submit" value="Thêm giỏ hàng" class="fa fa-shopping-cart" href="{{URL::to('/login-checkout')}}" /> -->
									
				                     
				                	<?php
				                    }
				                	?>
									<!-- <input type="submit" name="submit" value="Add to cart" class="button" /> -->
								</fieldset>
							</form>
						</div>
						<br>
					</div>

				</div>
			</div>
			
		</div>
		<div  style="background-color: #F5F2F2" >
	<br><br><br>
	<div class="container">
		
		<br><br><br>

		<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Bình Luận Facebook
			</h3>
			<div class="tab-content">
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=886874438708077&autoLogAppEvents=1" nonce="Fbqwwlnl"></script>

			<div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="10">	
			</div>
		</div>
			
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Bình Luận
			</h3>
			<!-- //tittle heading -->
		
		<div class="row contact-grids agile-1 mb-5">
				<style type="text/css">
					.style_comment {
					    border: 1px solid #ddd;
					    border-radius: 10px;
					    background: #F5F2F2;
					}
				</style>
			<form>
			{{csrf_field()}}
			<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
			<div id="comment_show"></div>
				
			</form>
			<!-- form -->
			
		</div>
		<?php
    	$customer_id = Session::get('customer_id');

    	$customer_name = Session::get('customer_name');
    	if ($customer_id!=null) {
    				

    	?> 

		<form action="#" >
		{{csrf_field()}}
		<p><b>Đánh giá sản phẩm</b></p>
				<div class="contact-grids1 w3agile-6">

		<?php 
			$fl=false;
    		foreach ($customer_rating as $key => $cus_rating) {
    			if ($cus_rating->customer_id==$customer_id) {
   		 			 	$fl=true;
    			}
    		}
			if($fl==true){ 
				$tl =0;
				foreach ($rating_id as $key => $rting) {
					if (($customer_id==$rting->customer_id)&&($rting->product_id==$value->product_id)) {
						$tl =1;
					}
				}
				if ($tl ==0) {
				?>
					<ul class="list-inline" style="display: -webkit-box;" title="Average Rating">
						@for($count = 1; $count <= 5; $count++)
							@php
								if($count <= $rating){
									$color = 'color:#ffcc00;';
								}else{
									$color = 'color:#ccc;';
								}
							@endphp
						<li title="star_rating"
						id="{{$value->product_id}}-{{$count}}" 
						data-index="{{$count}}"
						data-product_id="{{$value->product_id}}"
						data-rating="{{$rating}}"
						class="rating"

						style="cursor: pointer; {{$color}} font-size: 30px;" 
						>
							&#9733;
						</li>
						@endfor

					</ul>
					<input type="hidden" name="" class="customer_id_h" value="<?php echo $customer_id; ?>">
				<?php } } ?>
				
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
						
						<label>@<?php echo $customer_name; ?></label>
						<input style="color:black" type="hidden"   class="comment_name" value="<?php echo $customer_name; ?>" >
						</div>
						
					</div>
					<p><b>Viết bình luận của bạn</b></p>
					<div class="contact-me animated wow slideInUp form-group">
						<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận" required=""> </textarea>
					</div>
					
						<button type="button"  class="btn btn-default pull-right send-comment" name="send-comment"> Gửi bình luận</button> 
					<div id="notify_comment"></div>
					</form>
				</div>
			<?php 
             	
    			}else{
        	?> 

			<div class="btn btn-default pull-right"><a href="{{URL::to('/login-checkout')}}" data-toggle="modal" data-target="#exampleModal" class="text-red"> Đăng nhập để bình luận</a>
			</div>
        	<?php }?>

			<!-- //form -->
		</div>
	</div>


		<h3 class="heading-tittle text-center font-italic">Sản Phẩm Liên Quan</h3>
                            <div class="row">
                            	
								
                            		@foreach($relate as $key =>$lienquan)
	                                <div class="col-md-3 product-men mt-5">
	                                    <div class="men-pro-item simpleCart_shelfItem">
	                                        <div class="men-thumb-item text-center">
	                                            <img style="width: 100px;height: 125px;" src="{{URL::to('public/upload/product/'.$lienquan->product_image)}}" alt="">
	                                            <div class="men-cart-pro">
	                                                <div class="inner-men-cart-pro">
	                                                    <a href="{{URL::to('/chi-tiet/'.$lienquan->product_id)}}" class="link-product-add-cart">Chi tiết</a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="item-info-product text-center border-top mt-4">
	                                            <h4 class="pt-1">
	                                                <a href="#">{{$lienquan->product_name}}</a>
	                                            </h4>
	                                            <div class="info-product-price my-2">
	                                                <span class="item_price">{{number_format($lienquan->product_price).' '.'VND'}}</span>
	                                                
	                                            </div>
	                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
	                                                <form action="{{URL::to('/save-cart')}}" method="POST">
														{{ csrf_field() }}
	                                                    <fieldset>
	                                                        <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
						                                    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
						                                    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
						                                    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
						                                   	<input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">

						                                   	<?php
								                        	$customer_id = Session::get('customer_id');
								                        		if($customer_id != NULL){
										                	?> 
										                		<button type="button" value="Add to cart" name="add-to-cart" data-id_product="{{$value->product_id}}" class="btn btn-default add-to-cart"><!-- <i class="fa fa-shopping-cart"></i> -->
						                                         Thêm giỏ hàng
						                                        </button>
										                    	<!-- <input type="submit" name="submit" value="Thêm giỏ hàng" class="fa fa-shopping-cart" /> -->
															
															 
										                	<?php 
										                     	}else{
										                	?>
										                		<button type="submit" name="submit"  class="btn btn-default cart"><a href="{{URL::to('/login-checkout')}}" data-toggle="modal" data-target="#exampleModal" class="text-red"><i class="fa fa-shopping-cart"></i>
																Thêm giỏ hàng</a>
																</button>
										                		
															
										                     
										                	<?php
										                    }
										                	?>
	                                                    </fieldset>
	                                                </form>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
                            		@endforeach
                            	
								
								
                            </div>
				<br>
                            <div class="row" style="float: right;">{{$relate->links()}}</div>
                            <br>
                            <br>
		<br>
	</div>
		
	</div>
@endforeach
@endsection