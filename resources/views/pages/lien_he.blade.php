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
					<li>Liên Hệ</li>
				</ul>
			</div>
		</div>
</div>
	<!-- //page -->

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				LIÊN
				HỆ
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Địa Chỉ</h4>
						<p>319 Chiến Lược Q.Bình Tân
							<label>TPHCM</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Số điện thoại</h4>
						<p>090 234 5678
							<label>090 234 5678</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Mail</h4>
						<p style="text-transform:none;">
							<a href="">infoluxyry@gmail.com</a>
							<label>
								<a href="">hotro@gmail.com</a>
							</label>
						</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="map mt-sm-0 mt-4">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6522401458637!2d106.60642501462243!3d10.761262092331817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c377f14223f%3A0xd40353aaed0f382f!2zMzE5IENoaeG6v24gTMaw4bujYywgQsOsbmggVHLhu4sgxJDDtG5nIEEsIELDrG5oIFTDom4sIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626084260656!5m2!1svi!2s" allowfullscreen></iframe>
		
	</div>
@endsection