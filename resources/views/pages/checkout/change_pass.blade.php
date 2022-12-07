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
					<li>Đổi Mật Khẩu</li>
				</ul>
			</div>
		</div>
</div>
<div class="privacy py-sm-5 py-4">
		<div class="container py-x l-4 py-lg-2" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
			<!-- tittle heading -->
			<?php  $use_id=Session::get('customer_id'); ?>
				
			<?php foreach ($user_id as $key => $value_ad): ?>
                                	
            <?php if ($value_ad->customer_id==$use_id): ?>
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
						Đổi Mật Khẩu</h3>
			<div class="checkout-left" style="width: fit-content;">
				<div class="address_form_agile mt-sm-5 mt-4" style="width: 500px; margin-left: 300px;">
			<form action="{{URL::to('/update-pass/'.$value_ad->customer_id)}}" method="POST">
				{{ csrf_field() }}
						<div class="form-group">
                            <label class="col-form-label">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" placeholder=" " name="customer_password" id="password" value="<?php echo $value_ad->customer_password ?>" required="">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" placeholder=" " name="customer_password1" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Đổi mật khẩu">
                        </div>
			</form>
		</div>
	</div>
			<?php endif ?>
	        <?php endforeach ?>
	</div>
</div>
@endsection