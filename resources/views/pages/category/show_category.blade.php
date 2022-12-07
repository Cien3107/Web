@extends('welcome')
@section('content')
  <!-- top Products -->
  <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{URL::to('/')}}">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Danh mục</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->

                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="font-family:revert; text-transform: uppercase; font-weight: 900;border-radius: 30px ">
                            @foreach($category_name as $key => $name)
                            <h3 class="heading-tittle text-center font-italic">{{$name->category_name}}</h3>
                            @endforeach
                            <div class="row">
                                @foreach($category_by_id as $key => $product)
                                <div class="col-md-4 product-men mt-5">
                                <form  method="post">
                                    {{csrf_field()}}
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        
                                        <div class="men-thumb-item text-center">
                                            <img style="width: 100px;height: 125px;" src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{URL::to('/chi-tiet/'.$product->product_id)}}" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">Mới</span>
                                        </div>

                                        <div class="item-info-product text-center border-top mt-4">
                                            
                                            <h4 class="pt-1">
                                                <a href="#">{{$product->product_name}}</a>
                                            </h4>
                                            
                                            <div class="info-product-price my-2">
                                                <span class="item_price">{{number_format($product->product_price).' '.'VND'}}</span>
                                                
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                
                                                    <fieldset>

                                                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

            
                                                        <?php
                                                        $customer_id = Session::get('customer_id');
                                                            if($customer_id != NULL){
                                                        ?> 
                                                        <button type="button" value="Add to cart" name="add-to-cart" data-id_product="{{$product->product_id}}" class="btn btn-default add-to-cart"><!-- <i class="fa fa-shopping-cart"></i> -->
                                                        Thêm giỏ hàng
                                                        </button>

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
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                        <!-- //first section -->
                        <!-- second section -->
                        
                        <!-- //second section -->
                        <!-- third section -->
                        <div class="product-sec1 product-sec2 px-sm-5 px-3" style="border-radius: 30px">
                            <div class="row">
                                <h3 class="col-md-4 effect-bg">Bộ Sưu Tập Mùa Xuân</h3>
                                
                                <div class="col-md-8 bg-right-nut">
                                    <img src="{{asset('public/frontend/images/1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
                <!-- //product left -->

                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0" >
                    <div class="side-bar p-sm-4 p-3" style="border-radius: 30px;font-family: revert;
    text-transform: uppercase;font-weight: bolder;">
                        <div class="search-hotel border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Tìm Kiếm</h3>
                            <form action="{{URL::to('/tim-kiem')}}" method="post">
                                {{ csrf_field() }}
                                <input type="search" name="keywords_submit" placeholder="Tên sản phẩm" name="search" required="">
                                <input type="submit" value=" ">
                            </form>
                        </div>
                        
                        <!-- price -->
                        <div class="range border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Danh mục</h3>
                            <div class="w3l-range">

                                @foreach($category as $key => $cate)
                                    <ul>
                                        <li><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                    
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                        <!-- //price -->
                        <!-- discounts -->
                        <div class="range border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Thương hiệu</h3>
                            <div class="w3l-range">
                                @foreach($brand as $key => $brand_pro)
                                    <ul>
                                        <li><a href="{{URL::to('/thuong-hieu/'.$brand_pro->brand_id)}}">{{$brand_pro->brand_name}}</a></li>
                                    
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <!-- //discounts -->
                        <!-- reviews -->
                        
                        <!-- //best seller -->
                    </div>
                    <!-- //product right -->
                </div>
                </div>
            </div>
    </div>
    <!-- //top products -->

    <!-- middle section -->
    <div class="join-w3l1 py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <div class="row">
                <div class="col-lg-6" >
                    <div class="join-agile text-left p-4" style="border-radius: 30px">
                        <div class="row">
                            <div class="col-sm-7 offer-name">
                                <h6>Tin tức</h6>
                                <h4 class="mt-2 mb-3">Bộ sưu tập đồng hồ </h4>
                                <p>Hot nhất mùa xuân này</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="{{asset('public/frontend/images/2.jpg')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5" >
                    <div class="join-agile text-left p-4" style="border-radius: 30px">
                        <div class="row ">
                            <div class="col-sm-7 offer-name">
                                <h6>Bạn có biết</h6>
                                <h4 class="mt-2 mb-3">Đồng hồ phong thủy</h4>
                                <p>Dành cho người mệnh kim</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="{{asset('public/frontend/images/4.jpg')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- middle section -->
@endsection