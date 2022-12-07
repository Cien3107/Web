<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Customer;
use App\City;
use App\Quanhuyen;
use App\Xaphuong;
use App\Feeship;
use App\Shipping;
use App\Coupon;
use App\Order;
use App\OrderDetails;
use Mail;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }

    public function confirm_order(Request $request){
        $validate = $this->validate(request(),[
            'shipping_name' =>'required',
            'shipping_email' =>'required|email|min:6',
            'shipping_phone' =>'required|numeric|min:10',
            'shipping_address' =>'required|min:6',

        ],[
            'shipping_name.required' => 'Người nhận Không được để trống.',
            'shipping_email.required' => 'Email Không được để trống.',
            'shipping_phone.required' => 'Số điện thoại Không được để trống.',
            'shipping_address.required' => 'Địa chỉ Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
            'shipping_phone.min' => 'Số điện thoại phải là 10 số.',
            'numeric' => 'Phải là số.',
            'email' => 'Email không đúng dạng.',
        ]);
        if(!empty($validate)){
            return ['code'=>406,'message'=>'invalid','validate'=>$validate];
        }

        $data = $request->all();
        //get coupon
       
            $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();
         if($coupon){
            $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon_mail = $coupon->coupon_code;
            $coupon->save();
        }
            
        
        

        // //gui mail dat hang
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $title_mail = "Đơn hàng xác nhận ngày".' '.$now;
        // $customer = Customer::find(Session::get('customer_id'));
        // $data['email'][] = $customer->customer_email;
        // // lay gio hang
        // if(Session::get('cart')==true){
        //     foreach(Session::get('cart') as $key => $cart_mail){
        //         $cart_array[] = array(
        //             'product_name' => $cart_mail['product_name'],
        //             'product_price' => $cart_mail['product_price'],
        //             'product_qty' => $cart_mail['product_qty']
        //         );
        //     }
        // }
        // //lay shipping
        // $shipping_array = array(
        //     'customer_name' => $customer->customer_name,
        //     'shipping_name' => $data['shipping_name'],
        //     'shipping_email' => $data['shipping_email'],
        //     'shipping_phone' => $data['shipping_phone'],
        //     'shipping_address' => $data['shipping_address'],
        //     'shipping_method' => $data['shipping_method']
        // );
        // // lay ma giam gia
        // $ordercode_mail = array(
        //     'coupon_code' => $coupon_mail,
        //     // 'order_code' => $checkout_code
        // );

        // Mail::send('pages.mail.mail_order', ['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,
        //     'code'=>$ordercode_mail], function($message) use ($title_mail, $data){
        //         $message->to($data['email'])->subject($title_mail);
        //         $message->from($data['email'],$title_mail);
        //     }
        // );

        
        
        //van chuyen
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //get order
        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->order_date = date('Y-m-d');
        $order->created_at = Carbon::now();
        $order->save();
    
        
        if (Session::get('cart')) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }

    public function phi_ship(Request $request){
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',25000);
                    Session::save();
                }
            }
            
        }
    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action']=="city") {
                $select_province = Quanhuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>-----Chọn quận huyện-----</option>';
                foreach ($select_province as $key => $qh) {
                    $output.='<option value="'.$qh->maqh.'">'.$qh->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Xaphuong::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                    $output.='<option>-----Chọn xã phường-----</option>';
                foreach ($select_wards as $key => $ward) {
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function login_checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function create_login(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    	
    	return view('pages.checkout.create_login')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_customer(Request $request){
        $this->validate(request(),[
            'customer_name' =>'required',
            'customer_email' =>'required|email|min:6',
            'customer_phone' =>'required|numeric|min:10',
            'customer_password' =>'required|min:6',

        ],[
            'customer_name.required' => 'Họ tên Không được để trống.',
            'customer_email.required' => 'Email Không được để trống.',
            'customer_phone.required' => 'Số điện thoại Không được để trống.',
            'customer_password.required' => 'Mật khẩu Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
            'customer_phone.min' => 'Chỉ được nhập 10 số.',
            'integer' => 'Phải là số.',
            'email' => 'Email không đúng dạng.',
        ]);

    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_password'] = md5($request->customer_password);

    	$customer_id = DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_id',$customer_id); 
    	Session::put('customer_name',$request->customer_name);

    	return Redirect('/show-checkout'); 
    }

    public function xem_canhan(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $user_id = DB::table('tbl_customer')->get();
        return view('pages.checkout.information_user')->with('category',$cate_product)->with('brand',$brand_product)->with('user_id',$user_id);
    }

    public function update_canhan(Request $request,$customer_id){
        

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_phone']=$request->customer_phone;  
        
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        return Redirect::to('/xem-canhan');
    }

    public function doi_pass(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $user_id = DB::table('tbl_customer')->get();
        return view('pages.checkout.change_pass')->with('category',$cate_product)->with('brand',$brand_product)->with('user_id',$user_id);
    }

    public function update_pass(Request $request,$customer_id){
        $data=array();
        $data['customer_password']=md5($request->customer_password1);
        
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        return Redirect::to('/doi-pass'); 
    }

    public function show_checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $city = City::orderby('matp','ASC')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city);
    }

    public function logout_checkout(){
    	Session::flush();
    	return Redirect('/login-checkout');
    }

    public function login_customer(Request $request){
        $this->validate(request(),[
            'email_account' =>'required|email',
            'password_account' =>'required',
            

        ],[
            'email_account.required' => 'Tên đăng nhập Không được để trống.',
            'password_account.required' => 'Mật khẩu Không được để trống.',
            'email' => 'Email không đúng dạng.',
        ]);

    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();

    	if($result){
    		Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
    		return Redirect('/');
    	}else{
    		return Redirect('/login-checkout');
    	}
    	 
    	
    	
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id); 
       

        return Redirect('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function dat_hang(Request $request){
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        
        
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] =  $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        $content = Cart::content();
        foreach ($content as $v_content) {
           
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] =  $v_content->name;
            $order_d_data['product_price'] = $v_content->price;;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            
            DB::table('tbl_order_details')->insert($order_d_data);
        }

        if($data['payment_method']==1){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product); 
        }else{
            
            echo 'Thanh toán bằng ATM';
        }
        

        // return Redirect('/payment');
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')->orderby('tbl_order.order_id','desc')->get();

        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);

    }

    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->where('tbl_order.order_id',$orderId)->get();


        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
        
    }

    public function delete_order($orderId){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','Xóa sản phẩm thành công.');
        return Redirect::to('/manage-order');
    }

    public function all_user(){
        $all_list_user = Customer::all();
        $manager_user = view('admin.all_user')->with('all_list_user',$all_list_user);
        return view('admin_layout')->with('admin.all_list_user',$manager_user);
    }

    public function del_user($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa tài khoản thành công.');
        return Redirect::to('/all-user');
    }

    
}
