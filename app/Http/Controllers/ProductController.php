<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Comment;
use App\Rating;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
    public function AuthLogin(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
         return Redirect::to('admin.dashboard');
      }else{
         return Redirect::to('admin')->send();
      }
    }

   

    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'Admin';
        $comment->save();
    }

    public function duyet_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }

    public function list_comment(){
        $comment = Comment::with('product')
        ->where('comment_parent_comment','=',0)
        ->orderby('comment_id','DESC')->get();
        $comment_rep = Comment::with('product')
        ->where('comment_parent_comment','>',0)
        ->get();
        return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment -> save();
    }

    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)
        ->where('comment_parent_comment','=',0)
        ->where('comment_status',0)->get();
        $comment_rep = Comment::with('product')
        ->where('comment_parent_comment','>',0)->orderby('comment_id','DESC')
        ->get();
        $output = '';
        foreach ($comment as $key => $comm) {
            $output.= '

            <div class="row style_comment" style="background:#d9e3e8;">
                        <div class="col-md-2">
                            
                            <img width="100%" src="'.url('/public/frontend/images/tk.png').'" class="img img-reponsive img-thumbnail">
                        </div>
                        <div class="col-md-10 ">
                            <p style="color:green;">@'.$comm->comment_name.'</p>
                            <p style="color:blue;">'.$comm->comment_date.'</p>
                            <p>'.$comm->comment.'</p>

                        </div>
                    </div>
            </div><p></p>
            ';

            foreach ($comment_rep as $key => $rep_comment) {
                if ($rep_comment->comment_parent_comment == $comm->comment_id) {
                    
                    $output.= '<div class="row style_comment" style="margin:5px 40px;background:#0ae0ea;">
                                <div class="col-md-2">
                                    
                                    <img width="80%" src="'.url('/public/frontend/images/u1.png').'" class="img img-reponsive img-thumbnail">
                                </div>
                                <div class="col-md-10 ">
                                    <p style="color:red;">@Admin</p>
                                    <p style="color:blue;">'.$rep_comment->comment_date.'</p>
                                    <p>'.$rep_comment->comment.'</p>

                                </div>
                            </div>
                    </div><p></p>
                    
                    ';
                }
            }

           
        }
        echo ($output);
    }

    public function add_product(){
        $this->AuthLogin();
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    
    }

    public function all_product(){
        $this->AuthLogin();
        if (isset($_GET['keywords_submit'])) {
            $keywords=$_GET['keywords_submit'];
            $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')
            ->where('product_name','like','%'.$keywords.'%')
            ->orwhere('product_price','like','%'.$keywords.'%')
            ->paginate(5);
        }else{

    	$all_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->paginate(5);
        }
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $this->validate(request(),[
            'product_name' =>'required|min:3|unique:tbl_product,product_name',
            
            'product_price' =>'required|integer|min:6',
            'product_desc' =>'required|min:6',
            'product_content' =>'required|min:6',
            'product_image' =>'required',

        ],[
            'product_name.required' => 'Tên sản phẩm Không được để trống.',
            'product_price.required' => 'Giá sản phẩm Không được để trống.',
            'product_desc.required' => 'Mô tả sản phẩm Không được để trống.',
            'product_content.required' => 'Nội dung sản phẩm Không được để trống.',
            'product_image.required' => 'Hình ảnh Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
            'integer' => 'Chỉ được nhập số.',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại.'
        ]);



    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;
    	$data['product_image'] = $request->product_status;

    	$get_image = $request->file('product_image');
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalExtension();
    		$name_image = current(explode('.',$get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_image);
    		$data['product_image'] = $new_image;
    		DB::table('tbl_product')->insert($data);
    		Session::put('message','Thêm sản phẩm thành công.');
    		return Redirect::to('add-product');
    	}
    	$data['product_image'] = '';
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công.');
    	return Redirect::to('/all-product');
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('message','Không kích hoạt sản phẩm thành công.');
    	return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('message','Kích hoạt sản phẩm thành công.');
    	return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        
    	$edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }


    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $this->validate(request(),[
            'product_name' =>'required|min:3',
            'product_price' =>'required|integer|min:6',
            'product_desc' =>'required|min:6',
            'product_content' =>'required|min:6',
            

        ],[
            'product_name.required' => 'Tên sản phẩm Không được để trống.',
            'product_price.required' => 'Giá sản phẩm Không được để trống.',
            'product_desc.required' => 'Mô tả sản phẩm Không được để trống.',
            'product_content.required' => 'Nội dung sản phẩm Không được để trống.',
            
            'min' => 'Không ít hơn 6 kí tự.',
            'integer' => 'Chỉ được nhập số.',
        ]);
        
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;
    	$get_image = $request->file('product_image');

    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalExtension();
    		$name_image = current(explode('.',$get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_image);
    		$data['product_image'] = $new_image;
    		DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    		Session::put('message','Cập nhật sản phẩm thành công.');
    		return Redirect::to('all-product');
    	}
    	DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    	Session::put('message','Cập nhật sản phẩm thành công.');
    	return Redirect::to('/all-product');
    	
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công.');
        return Redirect::to('/all-product');
    }

    //End Admin

    public function details_product(Request $request, $product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $url_canonical = $request->url();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();

        foreach ($details_product as $key => $value){
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            
        }
      

       $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->paginate(4);

        $customer_rating = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_code','=','tbl_order.order_code')
        ->where('tbl_order_details.product_id',$product_id)
        ->where('tbl_order.order_status','3')
        ->get();
        $rating_id = Rating::get();
        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product)->with('relate',$related_product)->with('rating',$rating)->with('customer_rating',$customer_rating)->with('rating_id',$rating_id)->with('url_canonical',$url_canonical);
    }
    
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->customer_id = $data['customer_id_h'];
        $rating->save();
        echo 'done';
    }

}
