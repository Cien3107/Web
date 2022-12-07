<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Mail;
use Carbon\Carbon;
use App\Rating;
use App\Product;
use App\CategoryProduct;
use App\Customer;
use App\Coupon;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function lien_he(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.lien_he')->with('category',$cate_product)->with('brand',$brand_product);
    }
    
    public function send_mail(){
        $to_name = "Chí Kiên";
        $to_email = "fanfan31071999@gmail.com";//send to this email

        $data = array("name"=>"noi dung ten","body"=>"noi dung body"); //body of mail.blade.php

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('test mail ');//send this mail with subject
        $message->from($to_email,$to_name);//send from this mail
        });
        // return redirect('/')->with('message','');
    }

    public function send_coupon($coupon_time,$coupon_condition,$coupon_number,$coupon_code){
        $customer_vip = Customer::where('customer_vip','=',NULL)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $start_coupon = $coupon->coupon_date_start;
        $end_coupon = $coupon->coupon_date_end;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi ngày".' '.$now;
        $data = [];
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;  
        }
        $coupon = array(
            'start_coupon' => $start_coupon,
            'end_coupon' => $end_coupon,
            'coupon_time' => $coupon_time,
            'coupon_condition' => $coupon_condition,
            'coupon_number' => $coupon_number,
            'coupon_code' => $coupon_code,
        );
        Mail::send('pages.send_coupon', ['coupon'=>$coupon] ,function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });

        return redirect()->back()->with('message','Đã gửi mã cho khách hàng');
    }
    public function mail_example(){
        return view('pages.send_coupon');
    }

    public function index(){

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	
        // $min_price = DB::table('tbl_product')->min('tbl_product.product_price');
        // $max_price = DB::table('tbl_product')->max('tbl_product.product_price');
        // $min_price_range = $min_price + 5000;
        // $max_price_range = $max_price + 5000000;

        // if (isset($_GET['start_price']) && $_GET['end_price']) {
        //     $min_price = $_GET['start_price'];
        //     $max_price = $_GET['end_price'];

        //     $all_product = DB::table('tbl_product')
        //     ->whereBetween('product_price',[$min_price,$max_price])
        //     ->orderby('product_price','desc')
        //     ->paginate(3);

        //     $pro_all = DB::table('tbl_rating')
        //     ->leftJoin('tbl_product','tbl_rating.product_id','tbl_product.product_id')
        //     ->selectRaw("tbl_product.product_id,tbl_product.category_id,tbl_product.product_image,tbl_product.product_name,tbl_product.product_price,CAST(AVG(tbl_rating.`rating`) AS DECIMAL (12,1)) as avg_rating")
        //     ->whereRaw("tbl_rating.`rating` > 2")
        //     ->groupBy('tbl_product.product_id')
        //     ->orderby('avg_rating','desc')
        //     ->paginate(6);
        // }else{
            $all_product = DB::table('tbl_product')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_brand.brand_status','0')
            ->where('tbl_category_product.category_status','0')
            ->where('tbl_product.product_status','0')
            ->orderby('tbl_product.product_id','desc')
            ->paginate(9);
            
            $pro_all = DB::table('tbl_rating')->leftJoin('tbl_product','tbl_rating.product_id','tbl_product.product_id')->selectRaw("tbl_product.product_id,tbl_product.category_id,tbl_product.product_image,tbl_product.product_name,tbl_product.product_price,CAST(AVG(tbl_rating.`rating`) AS DECIMAL (12,1)) as avg_rating")->whereRaw("tbl_rating.`rating` > 2")->groupBy('tbl_product.product_id')->orderby('avg_rating','desc')->paginate(9);
        // }


    	
       foreach ($all_product as $key => $product){
            $category_id = $product->category_id;
            $product_id = $product->product_id;
            
        }
        if(isset($pro_all)){
            foreach ($pro_all as $key => $pro){
            
            $product_id = $pro->product_id;
            
            }
        }
        
    	return view('pages.home')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('pro_all',$pro_all);
        // ->with('min_price',$min_price)
        // ->with('max_price',$max_price)
        // ->with('min_price_range',$min_price_range)
        // ->with('max_price_range',$max_price_range);
    }

    public function search(Request $request){

    	$keywords = $request->keywords_submit;
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	// $all_product = DB::table('tbl_product')
    	// ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	// ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id')->get();

    	$search_product = DB::table('tbl_product')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_brand.brand_status','0')
            ->where('tbl_category_product.category_status','0')
            ->where('tbl_product.product_name','like','%'.$keywords.'%')
            ->orwhere('tbl_product.product_price','like','%'.$keywords.'%')
            ->get();
    	return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }

    public function tu_dong(Request $request){
        $data = $request->all();
        if ($data['query']) {
            $product = Product::where('product_name','like','%'.$data['query'].'%')->orWhere('product_price','like','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; z-index: 1">';
            foreach ($product as $key => $val) {
                $output .='
                <li class="li_search"><a href="#" style="color:black;">'.$val->product_name.'</a></li>      
                <li class="li_search"><a href="#"><img src="public/upload/product/'.$val->product_image.'" alt="" width="6%" height="auto">'.$val->product_price.'</a></li>
                ';
            }
            $output .='</ul>';
            echo $output; 
        }
    }



}
