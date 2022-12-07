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
					<li>Thông Tin</li>
				</ul>
			</div>
		</div>
</div>
<div class="privacy py-sm-5 py-4" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<?php  $use_id=Session::get('customer_id'); ?>
				
			<?php foreach ($user_id as $key => $value_ad): ?>
                                	
            <?php if ($value_ad->customer_id==$use_id): ?>


			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
						Xem Thông Tin Cá Nhân</h3>
			<div class="checkout-left" style="width: fit-content;">
				<div class="address_form_agile mt-sm-5 mt-4" style="width: 500px; margin-left: 300px;">
			<form action="{{URL::to('/update-canhan/'.$value_ad->customer_id)}}" method="POST">
				{{ csrf_field() }}
						<div class="form-group">
                            <label class="col-form-label">Họ tên</label>
                            <input type="text" class="form-control" placeholder=" " name="customer_name" value="<?php echo $value_ad->customer_name ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Điện thoại</label>
                            <input type="phone" class="form-control" placeholder=" " name="customer_phone" value="<?php echo $value_ad->customer_phone ?>">
                        </div>
                        <div class="form-group" >
                            <label class="col-form-label">Email</label>
                            <span class="form-control" name="customer_email" style="border: none; text-transform: none;">{{$value_ad->customer_email}}</span>
                            
                        </div>
                        <?php if ($value_ad->customer_password != '') {?>
                      	
                        <a href="{{URL::to('/doi-pass')}}">Đổi mật khẩu</a>
                        <?php  } ?> 
                        
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Cập Nhật">
                        </div>
			</form>
		</div>
	</div>

			<?php endif ?>
	        <?php endforeach ?>
	</div>
</div>
@endsection