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
					<li>Đăng Nhập</li>
				</ul>
			</div>
		</div>
</div>
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
						Đăng nhập</h3>
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
			<div class="checkout-left" style="display: inline-flex;width: 1000px;">
				<div class="address_form_agile mt-sm-5 mt-4" style="width: 300px;">
					
					<form action="{{URL::to('/login-customer')}}" method="POST">
						{{ csrf_field() }}
					<div class="form-group">
                            <label class="col-form-label">Tên đăng nhập</label>
                            <!-- <input type="text" class="form-control" placeholder=" " name="Name" required=""> -->
                            <input placeholder="Email" class="form-control" name="email_account" type="text" tabindex="3">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <!-- <input type="password" class="form-control" placeholder=" " name="Password" required=""> -->
                            <input placeholder="Password" class="form-control" name="password_account" type="password" tabindex="4">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Đăng nhập">
                        </div>
                        <!-- <ul class="list-login">
                        	<li>
                        		<a href=""></a>
                        	</li>
                        </ul> -->
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Nhớ lần đăng nhập</label>
                            </div>
                        </div>
					</form>
					<style type="text/css">
						ul.list-login{
							margin: 10px;
							padding: 0;
						}
						ul.list-login li {
							display: inline;
							margin: 5px;
						}
					</style>
					<ul class="list-login">
						<li>
							<a href="{{url('login-customer-google')}}">
								<img width="10%" alt="Đăng nhập bằng tài khoản Google" src="{{asset('public/frontend/images/gg.png')}}">
							</a>
						</li>
						
					</ul>
				</div>
				<div class="col-md-6 account-right account-left" style="margin: 70px; text-align: center;">
					<h3>Bạn chưa có tài khoản ?</h3>
                            <a href="{{URL::to('/create-login')}}">Đăng ký ngay</a>
                       <p> </p>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection