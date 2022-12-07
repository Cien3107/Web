<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tintuc;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
    public function add_tintuc(){
        return view('admin.post.add_tintuc');
    }

    public function all_tintuc(){
        $all_post = Tintuc::all();
        $manager_post = view('admin.post.all_tintuc')->with('all_post',$all_post);
        return view('admin_layout')->with('admin.post.all_tintuc',$manager_post);
    }

    public function save_tintuc(Request $request){
        
        $this->validate(request(),[
            'post_name' =>'required|min:3|unique:tbl_tintuc,ten_tin',
            'post_desc' =>'required|min:6',
            'post_image' =>'required',

        ],[
            'post_name.required' => 'Tên bài viết Không được để trống.',
            'post_desc.required' => 'Mô tả Không được để trống.',
            'post_image.required' => 'Hình ảnh Không được để trống.',
            'min' => 'Không ít hơn 6 kí tự.',
            'post_name.unique' => 'Tên bài viết đã tồn tại.'
        ]);

        
        $tintuc = new Tintuc();

        $tintuc->ten_tin = $request->post_name;
        $tintuc->noi_dung = $request->post_desc;
        $tintuc->image = $request->post_image;
        $tintuc->ngay_dang = date('Y-m-d');
        $tintuc->save();
        
        Session::put('message','Thêm bài viết thành công.');
        return Redirect::to('add-tintuc');
    }

    public function edit_post($id){
        // $this->AuthLogin();
        
        $edit_post = Tintuc::where('id',$id)->get();
        $manager_post = view('admin.post.edit_tintuc')->with('edit_post',$edit_post);
        return view('admin_layout')->with('admin.post.edit_tintuc',$manager_post);
    }

    public function update_tintuc(Request $request,$id){
        // $this->AuthLogin();
        $this->validate(request(),[
            'post_name' =>'required|min:3',
            'post_desc' =>'required|min:6',
            

        ],[
            'post_name.required' => 'Tên bài viết Không được để trống.',
            'post_desc.required' => 'Mô tả Không được để trống.',
            
            'min' => 'Không ít hơn 6 kí tự.',
            
        ]);

        
        $tintuc =Tintuc::find($id);

        $tintuc->ten_tin = $request->post_name;
        $tintuc->noi_dung = $request->post_desc;
        $tintuc->image = $request->post_image;
        $tintuc->ngay_dang = date('Y-m-d');
        $tintuc->save();
        
        Session::put('message','Cập nhật bài viết thành công.');
        return Redirect::to('all-tintuc');
    }

    public function delete_post($id){
        // $this->AuthLogin();
        DB::table('tbl_tintuc')->where('id',$id)->delete();
        Session::put('message','Xóa bài viết thành công.');
        return Redirect::to('all-tintuc');
    }

    //End backend

    public function news(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $baiviet = Tintuc::orderby('id','desc')->get();
        return view('pages.news.news')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('baiviet',$baiviet);
    }

    public function details_news(Request $request, $id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $baiviet = Tintuc::where('id',$id)->get();
        foreach ($baiviet as $key => $xem){
            $id = $xem->id;
            $ten_tin = $xem->ten_tin;
            
        }

        return view('pages.news.details_new')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('baiviet',$baiviet);
    }
}
