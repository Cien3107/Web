@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Thêm phí vận chuyển</a>
</ol>
<div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class="">Tính Vận Chuyển</h2>
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

  <form>
    {{ csrf_field() }}
   
    <div class="form-group">
      <label for="exampleInputPassword1">Chọn Thành Phố</label>
      <select name="city" id="city" class="form-control1 input choose city" >
        	<option value="">------Chọn tỉnh thành phố------</option>
        @foreach($city as $key => $tp)
        	<option value="{{$tp->matp}}">{{$tp->name_city}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Chọn Quận Huyện</label>
      <select name="province" id="province" class="form-control1 input province choose ">
        <option value="">------Chọn quận huyên------</option>
        
        
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Chọn Xã Phường</label>
      <select name="wards" id="wards" class="form-control1 input wards">
        <option value="">------Chọn xã phường------</option>
        
        
      </select>
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Phí vận chuyển</label>
      <input type="text"  name="fee_ship" class="form-control fee_ship" required >
    </div>
    <button type="button" name="add_delivery" class="btn btn-default add_delivery">Thêm phí vận chuyển</button>
  </form>  
  </div>
    <div id="load_delivery"></div>
    
  
</div>
</div>
@endsection