
<!DOCTYPE HTML>
<html>
<head>
<title>DASHBOARD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<meta name="csrf-token" content="{{csrf_token()}}" />
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- Graph CSS -->
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery ui -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">



<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/icon-font.min.css')}}" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>

   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="{{URL::to('/dashboard')}}">ADMIN</a></h1>
							</div>
					
						
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="{{('public/backend/images/in4.jpg')}}" alt=""> </span> 
												<div class="user-name">
													<p>
														<?php
														$name = Session::get('admin_name');
														if($name){
															echo $name;
															
														}
														?>
													</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Cài đặt</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Hồ sơ</a> </li> 
											<li> <a href="{{URL::to('/logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
		


                
	<div class="w3-agileits-pane">
		
	  <!--//w3-agileits-pane-->	
<!-- script-for sticky-nav -->
		<script>
			$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
	</section>
	
</section>
<br>
<br>
<br>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
									<li><a href="{{URL::to('/manage-order')}}"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý đơn hàng</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									 </li>

									<li><a href="{{URL::to('/all-user')}}"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý khách hàng</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									</li>

									 <li><a href="{{URL::to('/all-delivery-notes')}}"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý phiếu giao</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									 </li>
										
									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý bình luận</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/comment')}}">Bình luận</a></li>
									</ul>
									</li>

									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý vận chuyển</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/delivery')}}">Vận chuyển</a></li>
									</ul>
									</li>

									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Quản lý Coupon</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/coupon')}}">Thêm mã giảm giá</a></li>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
									</ul>
									</li>
										
									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>DANH MỤC SP</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
									</ul>
									</li>

									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>THƯƠNG HIỆU SP</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu</a></li>
										<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu</a></li>
									</ul>
									</li>

									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>SẢN PHẨM</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
											<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
										</ul>
									</li>

									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Tin tức</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
											<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/add-tintuc')}}">Thêm tin tức</a></li>
											<li id="menu-academico-avaliacoes" ><a href="{{URL::to('/all-tintuc')}}">Tất cả tin tức</a></li>
										</ul>
									</li>
									

								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="{{asset('public/backend/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-ui.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.basictable.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.jqcandlestick.js')}}"></script>
<script src="{{asset('public/backend/js/lightbox-plus-jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<link href="//code.jquery.com/ui/1.12.1/theme/base/jquery-ui.css" rel="stylesheet" />
<script src="//https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('public/backend/js/monthly.js')}}"></script>
<script src="{{asset('public/backend/js/Chart.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/formValidation.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


<script>
	CKEDITOR.replace('ckeditor');
	CKEDITOR.replace('ckeditor1');
	CKEDITOR.replace('ckeditor2');
	CKEDITOR.replace('ckeditor3');
	CKEDITOR.replace('ckeditor4');
	CKEDITOR.replace('ckeditor5');
	CKEDITOR.replace('ckeditor6');
	
</script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script type="text/javascript">
	$(function(){
		$("#start_coupon").datepicker({
			dateFormat: "dd/mm/yy",
			dayNamesMin: ["Chủ Nhật", "thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			duration: "slow"
		});
	});	
	$(function(){
		$("#end_coupon").datepicker({
			dateFormat: "dd/mm/yy",
			dayNamesMin: ["Chủ Nhật", "thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			duration: "slow"
		});
	});	
</script>
<script type="text/javascript">
	$(document).ready(function() {
		console.log('123123123213213');
		$('#input_product_image').on('change',function(e){
			console.log('123123123213213');
			console.log(e);
			for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

		        var file = e.originalEvent.srcElement.files[i];
		        console.log(file);
		        var reader = new FileReader();

            	reader.onload = function (e2) {
	                $('#img_product')
	                    .attr('src', e2.target.result)
	                    .width(150)
	                    .height(200);
	            };
	            reader.readAsDataURL(file);
	            }
		});

		fetch_delivery();
		function fetch_delivery(){
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: '{{url('/chon-phi')}}',
				method: 'POST',
				data:{_token:_token},
				success:function(data){
					$('#load_delivery').html(data);
				}
			});
		}
		$(document).on('blur','.fee_feeship_edit',function(){
			console.log('123123123213213');
			var feeship_id = $(this).data('feeship_id');
			var fee_value = $(this).text();
			var _token = $('input[name="_token"]').val();
			// alert(feeship_id);
			// alert(fee_value);
			$.ajax({
					url: "{{url('/update-delivery')}}",
					method: "POST",
					data:{feeship_id:feeship_id,fee_value:fee_value,_token:_token},
					success:function(data){
						fetch_delivery();
					}
				});
		});
		$('.add_delivery').click(function(){
			fetch_delivery();
			console.log('12312312312ccc');
				var city = $('.city').val();
				var province = $('.province').val();
				var wards = $('.wards').val();
				var fee_ship = $('.fee_ship').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{url('/insert-delivery')}}",
					method: "POST",
					data:{city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
					success:function(data){
						alert('Thêm phí vận chuyển thành công');
					}
				});
			});
		// alert('12312321312312312');
		$('.choose').on('change',function(){
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var $result = '';
				// alert (action);
				// alert (ma_id);
				// alert (_token);
				// console.log(action);
				// console.log(ma_id);
				if (action == 'city') {
					result = 'province';
				}else{
					result = 'wards';
				}
				$.ajax({
					url: "{{url('/select-delivery')}}",
					method: "POST",
					data:{action:action,ma_id:ma_id,_token:_token},
					success:function(data){
						$('#'+result).html(data);
					}
				});
			});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		chart30daysorder();

		var chart = new Morris.Line({
		  
		  element: 'mychart',
		  lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
		  // parseTime: false;
		  // hideHover: 'auto',
		  
		  xkey: 'period',
		  
		  ykeys: ['order', 'sales', 'quantity'],
		  
		  labels: ['đơn hàng', 'doanh số', 'số lượng']
		});


		function chart30daysorder(){
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{url('/days-order')}}",
				method: "POST",
				dataType: "JSON",
				data:{_token:_token},
				success:function(data){
					chart.setData(data);
				}
			});
		}

		$('#dashboard-filter').change(function(){
			var dashboard_value = $(this).val();
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{url('/dashboard-filter')}}",
				method: "POST",
				dataType: "JSON",
				data:{dashboard_value:dashboard_value,_token:_token},
				success:function(data){
					chart.setData(data);
				}
			});
		});


		$('#btn-dashboard-filter').click(function(){
			var _token = $('input[name="_token"]').val();
			var from_date = $('#datepicker').val();
			var to_date = $('#datepicker2').val();
			$.ajax({
				url: "{{url('/filter-by-date')}}",
				method: "POST",
				dataType: "JSON",
				data:{from_date:from_date,to_date:to_date,_token:_token},
				success:function(data){
					chart.setData(data);
				}
			});
		});
	});	
</script>

<script type="text/javascript">
	$(function(){
		$("#datepicker").datepicker({
			dateFormat: "yy-mm-dd",
			dayNamesMin: ["Chủ Nhật", "thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			duration: "slow"
		});
	});	
	$(function(){
		$("#datepicker2").datepicker({
			dateFormat: "yy-mm-dd",
			dayNamesMin: ["Chủ Nhật", "thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			duration: "slow"
		});
	});	
</script>

<script type="text/javascript">
	$(document).ready(function() {
		
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>

<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

	<script type="text/javascript">
		$('.comment_duyet_btn').click(function(){
			var comment_status = $(this).data('comment_status');
			var comment_id = $(this).data('comment_id');
			var comment_product_id = $(this).attr('id');
		 	// alert(comment_status);
    //     	alert(comment_id);
    //      	alert(comment_product_id)
			if (comment_status == 0) {
				var alert = 'Thay dổi thành công';
			}else{
				var alert = 'Thay dổi không Duyệt thành công';
			}
			$.ajax({
                url: "{{url('/duyet-comment')}}",
                method: "POST",
                headers:{
                	
                	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                	location.reload();
                	$('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }
            });
		});
		$('.btn-reply-comment').click(function(){
			var comment_id = $(this).data('comment_id');
			var comment = $('.reply_comment_'+comment_id).val();
			
			var comment_product_id = $(this).data('product_id');
		 	// alert(comment_status);
    //     	alert(comment_id);
    //      	alert(comment_product_id)
			
			
			
			$.ajax({
                url: "{{url('/reply-comment')}}",
                method: "POST",
                headers:{
                	
                	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                	$('.reply_comment_'+comment_id).val('');
                	$('#notify_comment').html('<span class="text text-alert">Đã gửi bình luận đến khách hàng</span>');
                }
            });
		});
	</script>
	<script type="text/javascript">
	    $(document).ready(function() {
	      $('#table').basictable();

	      $('#table-breakpoint').basictable({
	        breakpoint: 768
	      });

	      $('#table-swap-axis').basictable({
	        swapAxis: true
	      });

	      $('#table-force-off').basictable({
	        forceResponsive: false
	      });

	      $('#table-no-resize').basictable({
	        noResize: true
	      });

	      $('#table-two-axis').basictable();

	      $('#table-max-height').basictable({
	        tableWrapper: true
	      });
	    });
	</script>
	<!-- <script type="text/javascript">
		$(document).ready(function(){
			// $('add_delivery').click(function(){
			// 	var city = $('.city').val();
			// 	var province = $('.province').val();
			// 	var wards = $('.wards').val();
			// });
			
			$('.choose').on('change',function(){
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var $result = '';
				// alert (action);
				// alert (ma_id);
				// alert (_token);
				console.log(action);
				console.log(ma_id);
				if (action == 'city') {
					result = 'province';
				}else{
					result = 'wards';
				}
				$.ajax({
					url: "{{url('/select-delivery')}}",
					method: "POST",
					data:{action:action,ma_id:ma_id,_token:_token},
					success:function(data){
						$('#'+result).html(data);
					}
				});
			});
		});
	</script> -->
</body>
</html>