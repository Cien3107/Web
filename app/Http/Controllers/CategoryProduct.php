<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Product;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
   }

    public function add_category_product(){
        $this->AuthLogin();
    	return view('admin.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $this->validate(request(),[
            'category_product_name' =>'required|min:3|unique:tbl_category_product,category_name',
            'category_product_desc' =>'required|min:6',

        ],[
            'category_product_name.required' => 'Danh mục Không được để trống.',
            'category_product_desc.required' => 'Mô tả Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
            'category_product_name.unique' => 'Tên thương hiệu đã tồn tại.'
        ]);


    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công.');
    	return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('message','Không kích hoạt danh mục sản phẩm thành công.');
    	return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('message','Kích hoạt danh mục sản phẩm thành công.');
    	return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->AuthLogin();
    	$edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }

    public function delete_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    	Session::put('message','Xóa danh mục sản phẩm thành công.');
    	return Redirect::to('all-category-product');
    }

    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $this->validate(request(),[
            'category_product_name' =>'required|min:3',
            'category_product_desc' =>'required|min:6',

        ],[
            'category_product_name.required' => 'Danh mục Không được để trống.',
            'category_product_desc.required' => 'Mô tả Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
        ]);

        
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục sản phẩm thành công.');
    	return Redirect::to('all-category-product');
    }

    //End Admin
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        // $min_price = Product::min('product_price');
        // $max_price = Product::max('product_price');
        // $max_price_range = $max_price + 5000000;
        // $min_price_range = $min_price + 0;
        // if(isset($_GET['start_price']) && $_GET['end_price']){

        //     $min_price = $_GET['start_price'];
        //     $max_price = $_GET['end_price'];
            

        //     $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());
        // }

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
        // ->with('min_price',$min_price)->with('max_price',$max_price)->with('min_price_range',$min_price_range)->with('max_price_range',$max_price_range);
    }

    
}
