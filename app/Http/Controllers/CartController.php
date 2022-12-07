<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Carbon\Carbon;
use App\Coupon;
session_start();

class CartController extends Controller
{
	public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $data = $request->all();
        if(Session::get('customer_id')){
           $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
           if($coupon){
            return redirect()->back()->with('error','Mã giảm giá đã sử dụng,vui lòng nhập mã khác');
            }else{

                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
                if($coupon_login){
                    $count_coupon = $coupon_login->count();
                    if($count_coupon>0){
                        $coupon_session = Session::get('coupon');
                        if($coupon_session==true){
                            $is_avaiable = 0;
                            if($is_avaiable==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,

                                );
                                Session::put('coupon',$cou);
                            }
                        }else{
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,

                            );
                            Session::put('coupon',$cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                    }


                }else{
                    return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
                }
            }
        //neu chua dang nhap
        }else{
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,

                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }


            }else{
                return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
            }

        }

}   


	public function gio_hang(Request $request){
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

		return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product);
	}
	
	public function add_cart_ajax(Request $request){
		$data = $request->all();
		$session_id = substr(md5(microtime()),rand(0,26),5);
		$cart = Session::get('cart');
		if ($cart==true) {
			$is_avaiable = 0;
			foreach ($cart as $key => $val) {
				if ($val['product_id']==$data['cart_product_id']) {
					$is_avaiable++;
					
				}
			}
			if ($is_avaiable == 0) {
				$cart[] = array(
				'session_id' => $session_id,
				'product_name' => $data['cart_product_name'],
				'product_id' => $data['cart_product_id'],
				'product_image' => $data['cart_product_image'],
				'product_price' => $data['cart_product_price'],
				'product_qty' => $data['cart_product_qty'],
				);
				Session::put('cart',$cart);
			}
		}else{
			$cart[] = array(
			'session_id' => $session_id,
			'product_name' => $data['cart_product_name'],
			'product_id' => $data['cart_product_id'],
			'product_image' => $data['cart_product_image'],
			'product_price' => $data['cart_product_price'],
			'product_qty' => $data['cart_product_qty'],
			);
			Session::put('cart',$cart);
		}
		
		Session::save();
	}

	public function xoa_sp($session_id){
		$cart = Session::get('cart');
		if($cart==true){
			foreach ($cart as $key => $val) {
				if ($val['session_id']==$session_id) {
					unset($cart[$key]);
				}
			}
			Session::put('cart',$cart);
			return Redirect()->back()->with('message','Xóa sản phẩm thành công');
		}else{
			return Redirect()->back()->with('error','Xóa sản phẩm thất bại');
		}
	}

	public function update_cart(Request $request){
		$data = $request->all();
		$cart = Session::get('cart');
		
		if ($cart==true) {
			foreach ($data['cart_qty'] as $key => $qty) {
				foreach ($cart as $session => $val) {
					if ($val['session_id']==$key) {
						if ($qty<=5) {
							$cart[$session]['product_qty'] = $qty;
						}else{
							return Redirect()->back()->with('error','Sản phẩm không được quá 5');
						}
					}
				}
			}
			Session::put('cart',$cart);
			return Redirect()->back()->with('message','Cập nhật sản phẩm thành công');
		}else{
			return Redirect()->back()->with('message','Cập nhật sản phẩm thất bại');
		}
	}

	public function save_cart(Request $request){
		$productId = $request->productid_hidden;
		$quantity = $request->qty;

		$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

		

		
		// Cart::add('293ad', 'Product 1', 1, 9.99);
		
 
		$data['id'] = $product_info->product_id;
		$data['qty'] = $quantity;
		$data['name'] = $product_info->product_name;
		$data['price'] = $product_info->product_price;
		$data['weight'] = $product_info->product_price;
		$data['options']['image'] = $product_info->product_image;
		Cart::add($data);
		
		return Redirect::to('/gio-hang');
		// Cart::destroy();
		

		
	}

	public function show_cart(){

		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

		return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
	}

	public function delete_to_cart($rowId){
		Cart::update($rowId,0);
		return Redirect::to('/show-cart');
	}

	public function update_cart_quantity(Request $request){
		$rowId = $request->rowId_cart;
		$qty = $request->cart_quantity;

		Cart::update($rowId,$qty);

		return Redirect::to('/show-cart');
	}
}
