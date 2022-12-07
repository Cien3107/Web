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
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="font-family:revert; text-transform: uppercase;border-radius: 30px ">
                           	@foreach($baiviet as $key => $xem)
                           	<h3 class="heading-tittle text-center font-italic">{!!$xem->ten_tin!!}</h3>
                           		<div class="col-md-12 product-men mt-5">
                                	{!!$xem->noi_dung!!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection