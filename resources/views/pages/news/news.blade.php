@extends('welcome')
@section('content')
  <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-12">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="font-family:revert; text-transform: uppercase; font-weight: 900;border-radius: 30px ">
                            <h3 class="heading-tittle text-center font-italic">Bảng Tin</h3>
                            <div class="row">
                           	@foreach($baiviet as $key => $bai)
                           		<div class="col-md-4 product-men mt-5">
                                
                                <form  method="post">
                                    {{csrf_field()}}
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        
                                        <div class="men-thumb-item text-center">
                                            <img style="width: 300px;height: 200px;" src="{{asset('public/upload/product/'.$bai->image)}}" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{URL::to('/details-news/'.$bai->id)}}" class="link-product-add-cart">xem bài viết</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-info-product text-center border-top mt-4">
                                            
                                            <h4 class="pt-1">
                                                <a href="{{URL::to('/details-news/'.$bai->id)}}" >{{$bai->ten_tin}}</a>
                                            </h4> 
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection