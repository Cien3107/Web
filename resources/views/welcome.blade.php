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
                            <a href="{{URL::to('/xem-canhan')}}"><i class="fas fa-user mr-2"></i>Th??ng tin ca?? nh??n</a></li>
                        <li class="text-center border-right text-white">
                            <a href="{{URL::to('/xem-donhang')}}"><i class="fas fa-user mr-2"></i> Xem La??i ????n Ha??ng </a></li>

                        <li class="text-center border-right text-white">
                             
                            <a href="{{URL::to('/logout-checkout')}}"><i class="fas fa-sign-out-alt mr-2"></i> ????ng xu????t </a></li>

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
                            <a href="{{URL::to('/login-checkout')}}" data-toggle="modal" data-target="#exampleModal" class="text-white"><i class="fas fa-sign-in-alt mr-2"></i> ????ng nh????p </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="{{URL::to('/create-login')}}" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>????ng ki?? </a>
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
                    <h5 class="modal-title text-center">????ng nh????p</h5>
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
                            <label class="col-form-label">T??n ????ng nh????p</label>
                            <!-- <input type="text" class="form-control" placeholder=" " name="Name" required=""> -->
                            <input placeholder="Email" class="form-control" name="email_account" type="text" tabindex="3">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">M????t kh????u</label>
                            <!-- <input type="password" class="form-control" placeholder=" " name="Password" required=""> -->
                            <input placeholder="Password" class="form-control" name="password_account" type="password" tabindex="4">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="????ng nh????p">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Nh???? l????n ????ng nh????p</label>
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
                                    <img width="10%" alt="????ng nh???p b???ng t??i kho???n Google" src="{{asset('public/frontend/images/gg.png')}}">
                                </a>
                            </li>
                            
                        </ul>
                        <p class="text-center dont-do mt-3">Kh??ng co?? ta??i khoa??n ?
                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                ????ng ki?? ngay</a>
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
                    <h5 class="modal-title">????ng ki??</h5>
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
                            <label class="col-form-label">Ho?? t??n</label>
                            <input type="text" class="form-control" placeholder=" " name="customer_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">??i????n thoa??i</label>
                            <input type="phone" class="form-control" placeholder=" " name="customer_phone" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="customer_email" >
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">M????t kh????u</label>
                            <input type="password" class="form-control" placeholder=" " name="customer_password" id="password1" >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nh????p la??i m????t kh????u</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="????ng ki??">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                <label class="custom-control-label" for="customControlAutosizing2">T??i ch???p nh???n c??c ??i???u kho???n & ??i???u ki???n</label>
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
                                <input class="form-control mr-sm-2" id="keywords" name="keywords_submit" type="search" placeholder="Ba??n c????n m????u ??????ng h???? na??o " aria-label="Search" required>
                                <div id="search_ajax"></div>
                                <button class="btn my-2 my-sm-0" type="submit">Ti??m ki????m</button>
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
                            <a class="nav-link" href="{{URL::to('/trang-chu')}}">Trang Chu??
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span> Danh Mu??c </span>
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
                                Th????ng hi????u
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
                            <a class="nav-link" href="{{URL::to('/news')}}">Tin t????c</a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/lien-he')}}">Li??n h????</a>
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
                            <p>Hoa??n Ti????n
                                <span>10%</span></p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                                <span>Big</span>
                                Sale
                            </h3>
                            <a class="button2" href="#">Va??o Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>??????ng H????
                                <span>Th??ng Minh</span> C????c Ch????t</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                                <span>SmartWatch</span>
                            </h3>
                            <a class="button2" href="#">Va??o Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item3">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Tr???? Gia??
                                <span>10%</span> Ch????ng COVID</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">V??????t Qua
                                <span>COVID</span>
                            </h3>
                            <a class="button2" href="#">Truy C????p Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item4">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>M????u M????i 
                                <span>Li????n Tay</span> Ngay H??m Nay</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Sa??n Ph????m
                                <span>M????i</span>
                            </h3>
                            <a class="button2" href="#">Va??o Ngay </a>
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
                <h2 class="footer-top-head-w3l font-weight-bold mb-2">G????i Quy?? Kha??ch :</h2>
                <p class="footer-main mb-4">
                    N???u b???n ??ang c??n nh???c m???t chi???c ??????ng h???? ??eo tay m???i, ??ang t??m ki???m m???t chi????c ??????ng h???? ca?? ti??nh ho???c SmartWatch ti????n l????i, ch??ng t??i s??? gi??p b???n d??? d??ng t??m th???y ch??nh x??c nh???ng g?? b???n c???n v???i m???c gi?? b???n c?? th??? mua ???????c. Ch??ng t??i cung c???p Gi?? th???p h??ng ng??y tr??n website v?? h??n th??? n???a</p>
                <!-- //footer first section -->
                <!-- footer second section -->
                <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Mi????n phi?? Ship</h3>
                                <p>Khi mua ha??ng ???? c????a ha??ng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Giao ha??ng Nhanh</h3>
                                <p>Si??u T????c</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>UY TI??N</h3>
                                <p>V???? mo??i m????t</p>
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
                        <h3 class="text-white font-weight-bold mb-3">Danh mu??c</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="product.html"> </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- //footer categories -->
                    <!-- quick links -->
                    <div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Truy C????p Nhanh</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="about.html">V???? Chu??ng T??i</a>
                            </li>
                            <li class="mb-3">
                                <a href="contact.html">Li??n H????</a>
                            </li>
                            <li class="mb-3">
                                <a href="help.html">Tr???? Giu??p</a>
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
                        <h3 class="text-white font-weight-bold mb-3">Li??n La??c</h3>
                        <ul>
                            <li class="mb-3">
                                <i class="fas fa-map-marker"></i> Qu????n 8</li>
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
                        <h3 class="text-white font-weight-bold mb-3">Ba??n Tin</h3>
                        <p class="mb-3">Mi????n Phi?? ship k???? t???? tha??ng 06/2021</p>


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
                      title: "Xa??c nh????n ??????t ha??ng",
                      text: "Ba??n ??????ng y?? ??????t ha??ng ?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "V??ng, t??i ??????ng y??",
                      cancelButtonText: "Kh??ng, t??i c????n suy nghi??",
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
                                swal("????n ha??ng!", "????n ha??ng cu??a ba??n ??a?? ????????c ??????t.", "success");
                                window.setTimeout(function(){
                                    location.href = "{{url('/xem-donhang')}}";
                                  } ,3000);
                            },
                            error:function(data){
                                // let errors = (data.responseJSON);
                                let msg = 'Vui l??ng nh???p ????? c??c th??ng tin c???n thi???t';
                                // console.log(errors);
                                // Object.keys(errors).foreach(el=>{
                                //     console.log(el);
                                //     // msg += ' '+errors[el][0];
                                // });

                                // console.log(msg);
                                swal("??o??ng", msg, "error");
                            }
                        });
                      
                      } else {
                        swal("??o??ng", "????n ha??ng ch??a ????????c ??????t, ha??y hoa??n t????t ????n ha??ng.", "error");
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
                    alert ('Kh??ng ????????c ?????? tr????ng');
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
                            title: "??a?? th??m sa??n ph????m v??o gio?? h??ng",
                            text: "Ba??n c?? th???? mua h??ng ti????p ho????c t????i gio?? h??ng ?????? ti????n h??nh thanh to??n",
                            showCancelButton: true,
                            cancelButtonText: "Xem ti????p",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "??i ??????n gio?? h??ng",
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
                    
                    $('#notify_comment').html('<span class="text text-success">Th??m bi??nh lu????n tha??nh c??ng. Bi??nh lu????n ??ang ch???? duy????t</span>');
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
    //hover chu???t ????nh gi?? sao
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
   //nh??? chu???t ko ????nh gi??
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

    //click ????nh gi?? sao
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
             alert("B???n ???? ????nh gi?? "+index +" tr??n 5 . Vui l??ng cho ch??ng t??i c???m nh???n v??? s???n ph???m");
             location.reload();

            }
            else
            {
             alert("L???i ????nh gi??");
            }
           }
    });
          
    });
</script>

</body>

</html>