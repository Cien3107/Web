@extends('admin_layout')
@section('admin_content')
<br>
<div class="container-fluid">
  <style type="text/css">
    p.title_thongke {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
  </style>
</div>
<div class="row">
  <p class="title_thongke">Thống kê doanh số đơn hàng</p>
  <form autocomplete="off">
    {{ csrf_field() }}
    <div class="col-md-2">
      <p>từ ngày: <input type="text" id="datepicker" class="form-control"></p>
      <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
    </div>
    <div class="col-md-2">
      <p>đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
      
    </div>   
  </form>
  <div class="col-md-12">
    <div id="mychart" style="height: 250px;"></div>
  </div>
</div>
  
@endsection