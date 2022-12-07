<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function coupon(){
		return view('admin.coupon.coupon');    
    }

    public function del_coupon(){
        $coupon = Session::get('coupon');
        if ($coupon==true) {
            Session::forget('coupon');
            return Redirect()->back()->with('message','Xóa mã thành công');
        }
    }

    public function code_coupon(Request $request){
    	$data = $request->all();
    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
    	$coupon->coupon_number = $data['coupon_number'];
        
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_time = $data['coupon_time'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->save();

    	Session::put('message','Thêm mã giảm giá thành công');
    	return Redirect::to('coupon');
    }

    public function list_coupon(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
    	$coupon = Coupon::orderby('coupon_id','DESC')->get();
    	return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }

    public function delete_coupon($coupon_id){
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
    	return Redirect::to('list-coupon');
    }
}
