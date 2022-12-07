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
                  <form action="{{URL::to('/search-admin')}}" method="POST">
                              {{ csrf_field() }}
                            <div class="search-bar">

                                <input type="text" value="Search" name="keywords_submit" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                                <input type="submit" value="">
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
          @foreach($search_pro as $key => $sp)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $sp -> product_name }}</td>
            <td>{{ $sp -> product_price }}</td>
            <td><img src="public/upload/product/{{ $sp -> product_image }}" height="100" width="100" ></td>
            <td>{{ $sp -> category_name }}</td>
            <td>{{ $sp -> brand_name }}</td>

            <td><span class="text-ellipsis">
              <?php
              if($sp ->product_status == 0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$sp->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to('/active-product/'.$sp->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
              }
              ?>


            </span></td>
            
            <td>
              
              <a href="{{URL::to('/edit-product/'.$sp->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              

              <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$sp->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
              
              
             
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center" style="float: right;">
          {{$search_pro->links()}}
          
        </div>
        
      </div>
    </footer>
      
    </select>
  </div>

@endsection