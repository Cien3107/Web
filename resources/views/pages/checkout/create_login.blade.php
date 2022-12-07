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
					<li>Đăng Kí</li>
				</ul>
			</div>
		</div>
</div>
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
						Đăng Kí</h3>
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
			<div class="checkout-left" style="width: fit-content;">
				<div class="address_form_agile mt-sm-5 mt-4" style="width: 500px; margin-left: 300px;">
			<form action="{{URL::to('/add-customer')}}" method="POST">
				{{ csrf_field() }}
			<div class="form-group">
                            <label class="col-form-label">Họ tên</label>
                            <input type="text" class="form-control" placeholder=" " name="customer_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Điện thoại</label>
                            <input type="phone" class="form-control" placeholder=" " name="customer_phone">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="customer_email">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="customer_password" id="password1">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Đăng kí">
                        </div>
			</form>
		</div>
	</div>
	</div>
</div>
@endsection