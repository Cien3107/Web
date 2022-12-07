@extends('welcome')
@section('content')
  <!-- top Products -->
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
                            <h3 class="heading-tittle text-center font-italic">Đồng Hồ Mới</h3>
                            
                            <div class="row">
                                @foreach($all_product as $key => $product )
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
                            <br>
                            <div class="row" style="float: right;">
                                
                                
                                  {{$all_product->links()}}
                                  
                                
                                
                              </div>
                            
                        </div>
                        <!-- //first section -->
                        <!-- second section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="font-family:revert;
    text-transform: uppercase; font-weight: 900;border-radius: 30px ">
                            <h3 class="heading-tittle text-center font-italic">Đồng Hồ Nổi Bật</h3>
                            
                            <div class="row">
                                @foreach($pro_all as $key => $pro )
                                <div class="col-md-4 product-men mt-5">
                                <form  method="post">
                                    {{csrf_field()}}
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        
                                        <div class="men-thumb-item text-center">
                                            <img style="width: 100px;height: 125px;"src="{{URL::to('public/upload/product/'.$pro->product_image)}}" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{URL::to('/chi-tiet/'.$pro->product_id)}}" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                            <span class="product-new-top">{{$pro->avg_rating}}&#9733;</span>
                                        </div>

                                        <div class="item-info-product text-center border-top mt-4">
                                            
                                            <h4 class="pt-1">
                                                <a href="#">{{$pro->product_name}}</a>
                                            </h4>
                                            
                                            <div class="info-product-price my-2">
                                                <span class="item_price">{{number_format($pro->product_price).' '.'VND'}}</span>
                                                
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                
                                                    <fieldset>

                                                        <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                                                        <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                                                        <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">
                                                        <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">
                                                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">

                                                        <!-- <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="Samsung Galaxy J7" />
                                                        <input type="hidden" name="amount" value="200.00" />
                                                        <input type="hidden" name="discount_amount" value="1.00" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " /> -->
                                                        <!-- <input type="submit" name="submit" value="Add to cart" class="button btn" /> -->
                                                        <?php
                                                        $customer_id = Session::get('customer_id');
                                                            if($customer_id != NULL){
                                                        ?> 
                                                        <button type="button" value="Add to cart" name="add-to-cart" data-id_product="{{$pro->product_id}}" class="btn btn-default add-to-cart"><!-- <i class="fa fa-shopping-cart"></i> -->
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
                            <br>
                            <div class="row" style="float: right;">
                                
                                
                                  {{$pro_all->links()}}
                                  
                                
                                
                              </div>
                            
                        </div>
                        <!-- //second section -->
                        <!-- third section -->
                        <div class="product-sec1 product-sec2 px-sm-5 px-3" style="border-radius: 30px">
                            <div class="row">
                                <h3 class="col-md-4 effect-bg">Bộ Sưu Tập Mùa Xuân</h3>
                                
                                <div class="col-md-8 bg-right-nut">
                                    <img src="{{('public/frontend/images/1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
         
                <!-- //product left -->

                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
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
                        <!-- <div class="range border-bottom py-2" style="height: 200px;padding: 0px;margin: 0px;">
                            <h3 class="agileits-sear-head mb-3" for="" >Lọc giá</h3>
                            <div class="w3l-range" style="padding: 0px;margin: 0px;" >
                                
                                <form>
                                    <div id="slider-range">
                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;margin-top: 20px;">
                                        <input type="hidden" name="start_price" id="start_price" >
                                        <input type="hidden" name="end_price" id="end_price" >
                                        <br>
                                        <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div style="display: block;"></div> -->
                        <!-- //price -->
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

                        <!-- price -->
                        <!--  -->
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
                                <img src="{{('public/frontend/images/2.jpg')}}" alt="" class="img-fluid">
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
                                <img src="{{('public/frontend/images/4.jpg')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- middle section -->
@endsection