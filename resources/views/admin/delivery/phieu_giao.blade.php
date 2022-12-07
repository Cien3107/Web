@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Đơn hàng</a>
</ol>
  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Phiếu giao</h2>
    <form>
  <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
    <div style="float: right;">
      <form>
      <select name="phieu_status" style="border-radius:10px;">
        <option >Sắp xếp theo</option>
        <option value="1">Đã giao</option>
        <option value="0">Đang giao</option>
      </select>
        <button class="btn btn-success">Tìm</button>
      </form>
    </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Số lượng</th>
            <th>Tình trang đơn hàng</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach($delivery_id as $key => $deli)
          @php
            $i++
          @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $deli -> order_code }}</td>
            <td>{{ $deli -> ngaygiao }}</td>
            <td>{{ $deli -> soluong }}</td>
            <td> 
             <?php
              if($deli ->trangthai==0){
                ?>
                <a href="{{URL::to('/up-status/'.$deli->phieu_id)}}"><span>Đang giao</span></a>
                <?php
              }else{
                ?>
                <a href=""><span> Đã giao</span></a>
                <?php
              }
              ?>
             </td>
            <td>@php echo number_format( $deli -> tongtien).' VND'; @endphp </td>
           <!--  <td>
                <a href="" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-search" style="color: red;font-size: 30px"> </i>
                </a>
            </td> -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
      
    </select>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center" style="float: right;">
           
          
        </div>
        
      </div>
    </footer>
  </div>
  
@endsection