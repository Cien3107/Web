@extends('admin_layout')
@section('admin_content')
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Home</a> <i class="fa fa-angle-right"></i></li>
                <a>Bình luận</a>
</ol>

  <div class="grid-form">
    <div class="grid-form1">
    <h2 id="forms-example" class="">Danh sách bình luận</h2>
 

 <div id="notify_comment"></div>    
  <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">',$message,'</span>';
      Session::put('message',null);
    }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>sản phẩm</th>
            <th>Quản lý</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $comm)
          <tr>
            
            <td>
              @if($comm -> comment_status == 1)
                <input type="button" data-comment_status="0" data-comment_id="{{ $comm->comment_id }}" id="{{ $comm->comment_product_id }}" class="btn btn-primary comment_duyet_btn" value="Duyệt"><!-- <i class="fa fa-check"></i> -->
              @else
                <input type="button" data-comment_status="1" data-comment_id="{{ $comm->comment_id }}" id="{{ $comm->comment_product_id }}" class="btn btn-danger comment_duyet_btn" value="Bỏ Duyệt"><!-- <i class="fa fa-minus-circle"></i> -->
              @endif
            </td>
            <td>{{ $comm -> comment_name }}</td>
            <td>{{ $comm -> comment }}
              <style type="text/css">
                ul.list_rep li{
                  list-style-type: decimal;
                  color: blue;
                  margin: 5px 40px;
                }
              </style>
              <ul class="list_rep">
                Trả lời:
                @foreach ($comment_rep as $key => $com_reply)
                  @if ($com_reply->comment_parent_comment == $comm->comment_id)
                    <li> {{$com_reply->comment}}</li>
                  @endif
                  
                @endforeach
              </ul>
              @if($comm -> comment_status == 0)
                <br>
              <textarea rows="5" class="form-control reply_comment_{{ $comm->comment_id }}"></textarea>

              <button class="btn btn-default btn-reply-comment" data-comment_id="{{ $comm->comment_id }}" data-product_id="{{ $comm->comment_product_id }}">Trả lời </button>
              
              @endif
              
            </td>
            <td>{{ $comm -> comment_date }}</td>
            <td><a href="{{url('/chi-tiet/'.$comm -> product-> product_id)}}" target="_blank">{{ $comm -> product-> product_name }}</a></td>
     
            <td>
              
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              
              <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')" href="" class="active styling-edit" ui-toggle-class="">
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
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
      
    </select>
  </div>

@endsection