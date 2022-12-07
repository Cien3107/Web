<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-all.css')}}">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="{{asset('public/frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="{{asset('public/frontend/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" media="all" />
    
    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //web fonts -->
    <link rel="canonical" type="text/css" href="http://localhost/webdongho/">

</head>

<body>
    <!-- top-header -->
<div class="header">
        <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2">
                <div class="col-lg-4 header-most-top">
                    <!-- <p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
                        <i class="fas fa-shopping-cart ml-1"></i>
                    </p> -->
                </div>
                <div class="col-lg-8 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                    <ul>

                        <?php
                        
                            $customer_id = Session::get('customer_id');
                            if($customer_id != NULL){
                        ?> 
                       
                        <li class="text-center border-right text-white">
                            <img width="15%" src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}}
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="{{URL::to('/xem-canhan')}}"><i class="fas fa-user mr-2"></i>Thông tin cá nhân</a></li>
                        <li class="text-center border-right text-white">
                            <a href="{{URL::to('/xem-donhang')}}"><i class="fas fa-user mr-2"></i> Xem Lại Đơn Hàng </a></li>

                        <li class="text-center border-right text-white">
                             
                            <a href="{{URL::to('/logout-checkout')}}"><i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất </a></li>

                        <?php 
                        }else{
                        ?>
                        <li>
                            
                        </li>
                        <li>
                            
                        </li>
                        <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 090 234 5678
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="{{URL::to('/login-checkout')}}" data-toggle="modal" data-target="#exampleModal" class="text-white"><i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="{{URL::to('/create-login')}}" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>Đăng kí </a>
                        </li>
                        <?php
                        }
                        ?>

                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    

    <!-- Button trigger modal(select-location) -->
    
    <!-- //shop locator (popup) -->

    <!-- modals -->
    <!-- log in -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Nhớ lần đăng nhập</label>
                            </div>
                        </div>
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
                        <p class="text-center dont-do mt-3">Không có tài khoản ?
                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                Đăng kí ngay</a>
                        </p>
                    </form>
            </div>
        </div>
    </div>
    <!-- register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng kí</h5>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label">Họ tên</label>
                            <input type="text" class="form-control" placeholder=" " name="customer_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Điện thoại</label>
                            <input type="phone" class="form-control" placeholder=" " name="customer_phone" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="customer_email" >
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="customer_password" id="password1" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Đăng kí">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                <label class="custom-control-label" for="customControlAutosizing2">Tôi chấp nhận các Điều khoản & Điều kiện</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal -->
    <!-- //top-header -->

    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo_agile">
                    <h1 class="text-center">
                        <a  href="{{URL::to('/trang-chu')}}" class="font-weight-bold font-italic">
                            <img src="{{asset('public/frontend/images/Watch.png')}}" alt=" " class="img-fluid">W4tch Watch
                        </a>
                    </h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- search -->
                        <div class="col-10 agileits_search">
                            <form class="form-inline" action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="post">
                                {{ csrf_field() }}
                                <input class="form-control mr-sm-2" id="keywords" name="keywords_submit" type="search" placeholder="Bạn cần mẫu đồng hồ nào " aria-label="Search" required>
                                <div id="search_ajax"></div>
                                <button class="btn my-2 my-sm-0" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <!-- //search -->
                        <!-- cart details -->
                        <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                <div>
                                    <a href="{{URL::to('/gio-hang')}}" class="btn w3view-cart" type="submit" name="submit" value="">
                                        <i style="font-size: 30px;" class="fas fa-cart-arrow-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- //cart details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->
    <!-- navigation -->
    <div class="navbar-inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="background-color: aliceblue;"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-transform:uppercase; font-weight: bold;">
                    <ul class="navbar-nav ml-auto text-center mr-xl-5">
                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="{{URL::to('/trang-chu')}}">Trang Chủ
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span> Danh Mục </span>
                            </a>
                            <div class="dropdown-menu" style="width: 60px;">
                                <div class="agile_inner_drop_nav_info p-4">
                                    
                                    <div class="row">
                                        <div class="columns multi-gd-img">
                                            @foreach($category as $key => $cate)
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                    
                                                </ul>
                                            @endforeach
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Thương hiệu
                            </a>
                            <div class="dropdown-menu" style="">
                                <div class="agile_inner_drop_nav_info p-4">
                                    
                                    <div class="row">
                                        <div class="columns multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                            @foreach($brand as $key => $brand_pro)
                                                    <li><a href="{{URL::to('/thuong-hieu/'.$brand_pro->brand_id)}}">{{$brand_pro->brand_name}}</a></li>
                                    
                                            @endforeach
                                                </ul>
                                                
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="{{URL::to('/news')}}">Tin tức</a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/lien-he')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
    
    <!-- //navigation -->

    <!-- banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item item1 active">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Hoàn Tiền
                                <span>10%</span></p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                                <span>Big</span>
                                Sale
                            </h3>
                            <a class="button2" href="#">Vào Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Đồng Hồ
                                <span>Thông Minh</span> Cực Chất</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                                <span>SmartWatch</span>
                            </h3>
                            <a class="button2" href="#">Vào Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item3">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Trợ Giá
                                <span>10%</span> Chống COVID</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Vượt Qua
                                <span>COVID</span>
                            </h3>
                            <a class="button2" href="#">Truy Cập Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item4">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Mẫu Mới 
                                <span>Liền Tay</span> Ngay Hôm Nay</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Sản Phẩm
                                <span>Mới</span>
                            </h3>
                            <a class="button2" href="#">Vào Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->

  @yield('content')

    <!-- footer -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer first section -->
                <h2 class="footer-top-head-w3l font-weight-bold mb-2">Gửi Quý Khách :</h2>
                <p class="footer-main mb-4">
                    Nếu bạn đang cân nhắc một chiếc đồng hồ đeo tay mới, đang tìm kiếm một chiếc đồng hồ cá tính hoặc SmartWatch tiện lợi, chúng tôi sẽ giúp bạn dễ dàng tìm thấy chính xác những gì bạn cần với mức giá bạn có thể mua được. Chúng tôi cung cấp Giá thấp hàng ngày trên website và hơn thế nữa</p>
                <!-- //footer first section -->
                <!-- footer second section -->
                <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Miễn phí Ship</h3>
                                <p>Khi mua hàng ở cửa hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Giao hàng Nhanh</h3>
                                <p>Siêu Tốc</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>UY TÍN</h3>
                                <p>Về mọi mặt</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //footer second section -->
            </div>
        </div>
        <!-- footer third section -->
        <div class="w3l-middlefooter-sec">
            <div class="container py-md-5 py-sm-4 py-3">
                <div class="row footer-info w3-agileits-info">
                    <!-- footer categories -->
                    <div class="col-md-3 col-sm-6 footer-grids">
                        <h3 class="text-white font-weight-bold mb-3">Danh mục</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="product.html"> </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- //footer categories -->
                    <!-- quick links -->
                    <div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Truy Cập Nhanh</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="about.html">Về Chúng Tôi</a>
                            </li>
                            <li class="mb-3">
                                <a href="contact.html">Liên Hệ</a>
                            </li>
                            <li class="mb-3">
                                <a href="help.html">Trợ Giúp</a>
                            </li>
                            <li class="mb-3">
                                <a href="faqs.html">Faqs</a>
                            </li>
                            <li class="mb-3">
                                <a href="terms.html">Terms of use</a>
                            </li>
                            <li>
                                <a href="privacy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Liên Lạc</h3>
                        <ul>
                            <li class="mb-3">
                                <i class="fas fa-map-marker"></i> Quận 8</li>
                            <li class="mb-3">
                                <i class="fas fa-mobile"></i> 333 222 3333 </li>
                            <li class="mb-3">
                                <i class="fas fa-phone"></i> +222 11 4444 </li>
                            <li class="mb-3">
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:example@mail.com"> mail 1@example.com</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:example@mail.com"> mail 2@example.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
                        <!-- newsletter -->
                        <h3 class="text-white font-weight-bold mb-3">Bản Tin</h3>
                        <p class="mb-3">Miễn Phí ship kể từ tháng 06/2021</p>


                    </div>
                </div>
                <!-- //quick links -->
            </div>
        </div>
    </footer>
    <!-- //footer -->


    <!-- js-files -->
    <!-- jquery -->
    <script src="{{asset('public/frontend/js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/formValidation.min.js')}}"></script>
    <!-- //jquery -->

    <!-- nav smooth scroll -->

    <script type="text/javascript">
        $('#keywords').keyup(function(){
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/tu-dong')}}",
                    method: "POST",
                    data: {query:query, _token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                })
            }else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click','.li_search',function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    
    
    
    <script type="text/javascript">
        $.validate({
            
        })
    </script>
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //nav smooth scroll -->

    <!-- popup modal (for location)-->
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <!-- //popup modal (for location)-->

    <!-- cart-js -->
    <script src="{{asset('public/frontend/js/minicart.js')}}"></script>
    <script>
        paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

        paypals.minicarts.cart.on('gio-hang', function (evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            
        });
    </script>
    <!-- //cart-js -->
    
    <!-- password-script -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->

    <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/easy-responsive-tabs.css')}}" />
    <script src="{{asset('public/frontend/js/easyResponsiveTabs.js')}}"></script>

    <script>
        $(document).ready(function () {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <!-- //easy-responsive-tabs -->

    <!-- credit-card -->
    <script src="{{asset('public/frontend/js/creditly.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/css/creditly.css')}}" type="text/css" media="all" />
    <script>
        $(function () {
            var creditly = Creditly.initialize(
                '.creditly-wrapper .expiration-month-and-year',
                '.creditly-wrapper .credit-card-number',
                '.creditly-wrapper .security-code',
                '.creditly-wrapper .card-type');


            $(".creditly-card-form .submit").click(function (e) {
                e.preventDefault();
                var output = creditly.validate();
                if (output) {
                    // Your validated credit card output
                    console.log(output);
                }
            });
        });
    </script>

    <!-- creditly2 (for paypal) -->
    <script src="{{asset('public/frontend/js/creditly2.js')}}"></script>
    <script>
        $(function () {
            var creditly = Creditly2.initialize(
                '.creditly-wrapper .expiration-month-and-year-2',
                '.creditly-wrapper .credit-card-number-2',
                '.creditly-wrapper .security-code-2',
                '.creditly-wrapper .card-type');

            $(".creditly-card-form-2 .submit").click(function (e) {
                e.preventDefault();
                var output = creditly.validate();
                if (output) {
                    // Your validated credit card output
                    console.log(output);
                }
            });
        });
    </script>

    <!-- //credit-card -->

    <!-- imagezoom -->
    <script src="{{asset('public/frontend/js/imagezoom.js')}}"></script>
    <!-- //imagezoom -->

    <!-- flexslider -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/flexslider.css')}}" type="text/css" media="screen" />

    <script src="{{asset('public/frontend/js/jquery.flexslider.js')}}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->
    
    <!-- scroll seller -->
    <script src="{{asset('public/frontend/js/scroll.js')}}"></script>
    <!-- //scroll seller -->

    <!-- smoothscroll -->
    <script src="{{asset('public/frontend/js/SmoothScroll.min.js')}}"></script>
    <!-- //smoothscroll -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- start-smooth-scrolling -->
    <script src="{{asset('public/frontend/js/move-top.js')}}"></script>
    <script src="{{asset('public/frontend/js/easing.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                      title: "Xác nhận đặt hàng",
                      text: "Bạn đồng ý đặt hàng ?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Vâng, tôi đồng ý",
                      cancelButtonText: "Không, tôi cần suy nghĩ",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                        var shipping_name = $('.shipping_name').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_email = $('.shipping_email').val();
                        var shipping_address = $('.shipping_address').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var shipping_method = $('.payment_select').val();
                        var _token = $('input[name="_token"]').val();
                       
                        $.ajax({
                            url: '{{url("/confirm-order")}}',
                            method: 'POST',
                            data:{shipping_name:shipping_name, shipping_phone:shipping_phone, shipping_email:shipping_email, shipping_address:shipping_address, order_fee:order_fee, order_coupon:order_coupon, shipping_method:shipping_method, _token:_token},
                            success:function(data){
                                swal("Đơn hàng!", "Đơn hàng của bạn đã được đặt.", "success");
                                window.setTimeout(function(){
                                    location.href = "{{url('/xem-donhang')}}";
                                  } ,3000);
                            },
                            error:function(data){
                                // let errors = (data.responseJSON);
                                let msg = 'Vui lòng nhập đủ các thông tin cần thiết';
                                // console.log(errors);
                                // Object.keys(errors).foreach(el=>{
                                //     console.log(el);
                                //     // msg += ' '+errors[el][0];
                                // });

                                // console.log(msg);
                                swal("Đóng", msg, "error");
                            }
                        });
                      
                      } else {
                        swal("Đóng", "Đơn hàng chưa được đặt, hãy hoàn tất đơn hàng.", "error");
                      }
                    });
                
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
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
                    url: "{{url('/select-delivery-home')}}",
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
            $('.tinh_ship').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh == '' && xaid == ''){
                    alert ('Không được để trống');
                }else{
                    $.ajax({
                    url: "{{url('/phi-ship')}}",
                    method: "POST",
                    data:{matp:matp, maqh:maqh, xaid:xaid, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                    });
                }
                
            });
        });
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->


    <!-- for bootstrap working -->
    <script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                url: '{{url("/add-cart-ajax")}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                success:function(data){
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data:{product_id:product_id,_token:_token},
                success:function(data){
                    $('#comment_show').html(data);
                }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val(); 
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                success:function(data){
                    
                    $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công. Bình luận đang chờ duyệt</span>');
                    load_comment();
                    $('#notify_comment').fadeOut(5000);
                    $('.comment_name').val('');
                    $('.comment_content').val(''); 
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function remove_background(product_id)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ccc');
      }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
    // alert(index);
    // alert(ma_sp);
      remove_background(product_id);
      for(var count = 1; count <= index; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
      var rating = $(this).data("rating");
      remove_background(product_id);
      // alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $(document).on('click', '.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var customer_id_h = $('.customer_id_h').val();
        var _token = $('input[name="_token"]').val();
            // alert(index)
            // alert(ma_sp)
            // alert(_token)
            // alert(customer_id_h)
          $.ajax({
           url:"{{url('/insert-rating')}}",
           method:"POST",
           data:{index:index, product_id:product_id,_token:_token, customer_id_h:customer_id_h},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5 . Vui lòng cho chúng tôi cảm nhận về sản phẩm");
             location.reload();

            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });
          
    });
</script>

</body>

</html>