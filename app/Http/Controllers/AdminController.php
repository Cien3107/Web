<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use App\Customer;
use App\Social;
use App\SocialCustomers;
use Socialite;
use App\Login;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
   
   public function login_customer_google(){
         config( ['services.google.redirect' => env('GOOGLE_CLIENT_URL')] );
         return Socialite::driver('google')->redirect();
   }
   public function callback_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        $users = Socialite::driver('google')->stateless()->user(); 

        // return $users->id;
        $authUser = $this->findOrCreateCustomer($users,'google');
        if ($authUser) {
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_id',$account_name->customer_id);
        }elseif($customer_new){
            $account_name = Customer::where('admin_id',$authUser->user)->first();
            Session::put('customer_name',$account_name->customer_name);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_id',$account_name->customer_id);
        }
        
        return redirect('/trang-chu')->with($account_name->customer_email);
       
    }
    public function findOrCreateCustomer($users,$provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->where('provider_user_email', $users->email)->first();

        if($authUser){
            return $authUser;
        }else{
         $customer_new = new SocialCustomers([
            'provider_user_id' => $users->id,
            'provider_user_email' => $users->email,
            'provider' => strtoupper($provider)//all ky tu chuyen thanh hoa
        ]);

        $customer = Customer::where('customer_email',$users->email)->first();

            if(!$customer){
                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_picture' => $users->avatar,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
        $customer_new->customer()->associate($customer);
        $customer_new->save();
        return $customer_new;
        }

    }
   


   public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
   }
   public function index(){
   	return view('admin');
   }

   public function show_dashboard(){
      $this->AuthLogin();
   	return view('admin.dashboard');
   }

   public function dashboard(Request $request){

         $data = $request->all();
         $admin_email = $data['admin_email'];
         $admin_password = md5($data['admin_password']);
         $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
         if($login){
            $login_count = $login->count();
            if($login_count>0){
               Session::put('admin_name',$login->admin_name);
               Session::put('admin_email',$login->admin_email);
               Session::put('admin_id',$login->admin_id);
               return Redirect::to('/dashboard');
            }
         }else{
               Session::put('message','Mật khẩu hoặc tài khoản sai làm ơn nhập lại');
               return Redirect::to('/admin');
         }
   }

   public function logout(){
      $this->AuthLogin();
   	Session::put('admin_name',null);
   	Session::put('admin_id',null);
   	return Redirect::to('/admin');
   }

   


   public function days_order(){
      $sub30days = Carbon::now('Asia/Ho_Chi_minh')->subdays(30)->toDateString();
      $now = Carbon::now('Asia/Ho_Chi_minh')->toDateString();
      $get = DB::table('tbl_order')
      ->join('tbl_order_details','tbl_order_details.order_code','=','tbl_order.order_code')
      ->selectRaw('sum(tbl_order_details.product_sales_quantity) AS quantity, sum(tbl_order_details.product_price) AS sales, count(tbl_order.order_date) AS total_order, tbl_order.order_date')
      ->groupby('tbl_order.order_date')
      ->orderby('tbl_order.order_date','ASC')
      ->get();

      foreach ($get as $key => $val) {
         if (($sub30days<=$val->order_date)&&($val->order_date<=$now)) {
            
            $chart_data[] = array(
               'period' => $val->order_date,
               'order' => $val->total_order,
               'sales' => $val->sales,
               
               'quantity' => $val->quantity
            );
         }
      }
      echo $data = json_encode($chart_data);
   }

   public function filter_by_date(Request $request){
      $data = $request->all();
      $from_date = $data['from_date'];
      $to_date = $data['to_date'];

      $get = DB::table('tbl_order')
      ->join('tbl_order_details','tbl_order_details.order_code','=','tbl_order.order_code')
      ->selectRaw('sum(tbl_order_details.product_sales_quantity) AS quantity, sum(tbl_order_details.product_price) AS sales, count(tbl_order.order_date) AS total_order, tbl_order.order_date')
      ->groupby('tbl_order.order_date')
      ->orderby('tbl_order.order_date','ASC')
      ->get();
      foreach ($get as $key => $val) {
         if (($from_date<=$val->order_date)&&($val->order_date<=$to_date)) {
            
            $chart_data[] = array(
               'period' => $val->order_date,
               'order' => $val->total_order,
               'sales' => $val->sales,
               
               'quantity' => $val->quantity
            );
         }
      }
      echo $data = json_encode($chart_data);
   }
}
