@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Sản phẩm</a>
</ol>
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Liệt kê sản phẩm</h2>
    
 		<form>
  <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
    <div class="w3layouts-left" style="float: right; border-radius: 10px">
              
              <!--search-box-->
                <div class="w3-search-box" >
                  <form >
                        <div class="search-bar" style="display: flex;">
                            <input type="text" name="keywords_submit" placeholder="tìm kiếm">
                            
                            <button>Tìm</button>
                        </div>
                    </form>
                </div><!--//end-search-box-->
              <div class="clearfix"> </div>
          </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <!-- <th>Số lượng SP</th> -->
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro -> product_name }}</td>
            <td>{{ $pro -> product_price }}</td>
            <td><img src="public/upload/product/{{ $pro -> product_image }}" height="100" width="100" ></td>
            <td>{{ $pro -> category_name }}</td>
            <td>{{ $pro -> brand_name }}</td>

            <td><span class="text-ellipsis">
              <?php
              if($pro ->product_status == 0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-eye"></span></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-eye-slash"></span></a>
                <?php
              }
              ?>


            </span></td>
            
            <td>
              
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              

              <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
              <!-- <div  class="row">
              <a  class="active styling-edit" data-toggle="modal" data-target="#Delmodal" >
                <i class="fa fa-times text-danger text" ></i></a>
                

                  <div class="modal face" role="dialog" id="Delmodal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Xóa</h4>
                            
                        </div>
                        <div class="modal-body"  >
                            Bạn chắc chắn muốn xóa không ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success"  ><a href="{{URL::to('/delete-product/'.$pro->product_id)}}"> OK </a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>
              
              </div> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center" style="float: right;">
          
          {{$all_product->appends(Request::all())->links()}}
          
        </div>
        
      </div>
    </footer>
      
    </select>
  </div>

@endsection