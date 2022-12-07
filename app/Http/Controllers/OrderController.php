<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Feeship;
use App\Customer;
use App\Coupon;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{


    public function manage_order(){
    	if (isset($_GET['status_order'])) {
            $status=$_GET['status_order'];
            $order = Order::orderby('created_at','DESC')
            ->where('order_status',$status)
            ->paginate(5);
        }else{
        $order = Order::orderby('created_at','DESC')->paginate(5);
        }
        return view('admin.manage_order')->with(compact('order'));
    }

    public function view_order($order_code){
    	$order_details = OrderDetails::where('order_code',$order_code)->get();
    	$order = Order::where('order_code',$order_code)->get();
    	foreach ($order as $key => $ord) {
    		$customer_id = $ord->customer_id;
    		$shipping_id = $ord->shipping_id;

    	}
    	$customer = Customer::where('customer_id',$customer_id)->first();
    	$shipping = Shipping::where('shipping_id',$shipping_id)->first();

    	$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
    	foreach ($order_details as $key => $od) {
    		$product_coupon = $od->product_coupon;

    	}
    	if ($product_coupon != 'Không') {
    		$coupon = Coupon::where('coupon_code',$product_coupon)->first();
    		$coupon_condition = $coupon->coupon_condition;
    		$coupon_number = $coupon->coupon_number;
    	}else{
    		$coupon_condition = 2;
    		$coupon_number = 0;
    	}
    	

    	return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number'));
    }

//View dơn hàng
    public function xem_donhang(){
        if (!Session::get('customer_id')) {
            return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
        }else{
           $customer_id=Session::get('customer_id');
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
         $getorder =DB::table('tbl_order')->where('customer_id',$customer_id)->get();
            return view('pages.checkout.xem_donhang')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('getorder',$getorder);
        // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        
        //     $order_user_id=DB::table('tbl_order')
        //     ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        //     ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        //     ->select('tbl_order.*','tbl_shipping.shipping_name','tbl_shipping.shipping_address','tbl_shipping.shipping_phone')
        //     ->where('tbl_order.order_status','1')
        //     ->get();
        //     $order_details_id=DB::table('tbl_order_details')
        //     ->get();
        //     $cou_id=DB::table('tbl_coupon')->get();
        //     return view('pages.checkout.xem_donhang')
        //     ->with('order_details_id',$order_details_id)
        //     ->with('category',$cate_product)
        //     ->with('brand',$brand_product)
        //     ->with('order_user_id',$order_user_id)
        //     ->with('cou_id',$cou_id);
        }
        
    }
    
    public function view_history($order_code){
        if (!Session::get('customer_id')) {
            return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
        }else{


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        
            $order_user_id=DB::table('tbl_order')
            ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
            ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
            ->select('tbl_order.*','tbl_shipping.shipping_name','tbl_shipping.shipping_address','tbl_shipping.shipping_phone')
            ->where('tbl_order.order_status','1')
            ->get();
            $order_details_id=DB::table('tbl_order_details')
            ->get();
            $cou_id=DB::table('tbl_coupon')->get();

            //Xem Lịch Sử

            $order_details = OrderDetails::where('order_code',$order_code)->get();
            $order = Order::where('order_code',$order_code)->first();
           
            $customer_id = $order->customer_id;
            $shipping_id = $order->shipping_id;
            $order_status = $order->order_status;
         
            $customer = Customer::where('customer_id',$customer_id)->first();
            $shipping = Shipping::where('shipping_id',$shipping_id)->first();

            $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
            foreach ($order_details as $key => $od) {
                $product_coupon = $od->product_coupon;

            }
            if ($product_coupon != 'Không') {
                $coupon = Coupon::where('coupon_code',$product_coupon)->first();
                if($coupon){
                    $coupon_condition = $coupon->coupon_condition;
                    $coupon_number = $coupon->coupon_number;
                }else{
                     $coupon_condition = 2;
                    $coupon_number = 0;
                }
               
            }else{
                $coupon_condition = 2;
                $coupon_number = 0;
            }
        

       

            return view('pages.checkout.view_history')
            ->with('order_details_id',$order_details_id)
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('order_user_id',$order_user_id)
            ->with('order_details',$order_details)
            ->with('customer',$customer)
            ->with('shipping',$shipping)
            ->with('coupon_condition',$coupon_condition)
            ->with('coupon_number',$coupon_number)
            ->with('order_status',$order_status)
            ->with('cou_id',$cou_id);
        }
    }

    public function huy_don($order_code){
        DB::table('tbl_order')->where('order_code',$order_code)->update(['order_status'=> 4]);
        return Redirect::to('xem-donhang');
    }
}
