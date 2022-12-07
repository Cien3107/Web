<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\City;
use App\Quanhuyen;
use App\Xaphuong;
use App\Feeship;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function all_delivery_notes(){
        if (isset($_GET['phieu_status'])) {
            $status=$_GET['phieu_status'];
            $delivery_id=DB::table('tbl_phieugiao')
            ->where('trangthai',$status)
            ->get();
        }else{
            $delivery_id=DB::table('tbl_phieugiao')->get();
        }
        return view('admin.delivery.phieu_giao')->with('delivery_id',$delivery_id);
    }

    public function up_status($phieu_id){
        
        DB::table('tbl_phieugiao')->where('phieu_id',$phieu_id)->update(['trangthai'=>1]);
        $data['order_status'] = 3;
        DB::table('tbl_order')
        ->join('tbl_phieugiao','tbl_phieugiao.order_code','=','tbl_order.order_code')
        ->where('tbl_phieugiao.phieu_id',$phieu_id)->update($data);
        return Redirect::to('/all-delivery-notes');
    }

    public function save_delivery_notes (Request $request){
        $data=array();
        $date=getdate();
        $ma_ddh=$request->ma_ddh_h;
        $email=$request->email_h;
        $tong_tt=$request->tong_tt_h;
        $data['ngaygiao']=$date['mday'].'/'.$date['mon'].'/'.$date['year'];
        $Sum_mony_1=0;
        $Sum_mony=0;
        $Sum_qty=0;
        $dem_tt=0;
        $dem_tt_2=0;
        $all_order = DB::table('tbl_order')->where('order_code',$ma_ddh)->get();
        foreach ($all_order as $key => $vl) {
            $status=$vl->order_status;
        }
        
        if ($status==1) {
        
        
        $order_detail=DB::table('tbl_order_details')->where('order_code',$ma_ddh)->get();
        foreach ($order_detail as $key => $value_od) {
            $Sum_qty+=$value_od->product_sales_quantity;
            
        }  
        $ma_pg=rand(0,99999999);
        $data['phieu_id']=$ma_pg;
        $data['soluong']=$Sum_qty;
        $data['tongtien']=$tong_tt;
        $data['trangthai']=0;
        $data['order_code']=$ma_ddh;
        $data['admin_email']=$email;
        DB::table('tbl_phieugiao')->insert($data);
        
        foreach ($order_detail as $key => $value_od) {
           
                $data_delivery['phieu_id']=$ma_pg;
                $data_delivery['product_id']=$value_od->product_id;
                $data_delivery['ct_soluong']=$value_od->product_sales_quantity;
                $data_delivery['ct_tien']=$value_od->product_price;
                $data_detail['order_status']=2;
                DB::table('tbl_order')->where('order_code',$value_od->order_code)->update($data_detail);
                DB::table('tbl_details_phieu')->insert($data_delivery);
            
        }
        return Redirect::to('/all-delivery-notes'); 
        } 
        else{
            $result=$_SERVER['HTTP_REFERER'];
            Session::put('message','Đơn hàng đã xử lý.');
            return Redirect::to($result);
        }  
    }

    public function chon_phi(){
        $feeship = Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>Thành Phố</th>
                                <th>Quận Huyện</th>
                                <th>Xã Phường</th>
                                <th>Phí Ship</th>
                            </tr>
                        </thread>
                        <tbody>
            ';

                        foreach ($feeship as $key => $fee) {
                            $output .='
                       
                            <tr>
                                <td>'.$fee->city->name_city.'</td>
                                <td>'.$fee->quanhuyen->name_quanhuyen.'</td>
                                <td>'.$fee->xaphuong->name_xaphuong.'</td>
                                <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                            </tr>
                            ';
                        }

                $output .='
                        </tbody>
                    </table>
                    </div>
                    ';

                echo $output;
    }

    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }

    public function delivery(Request $request){
    	$city = City::orderby('matp','ASC')->get();
    	return view('admin.delivery.add_delivery')->with(compact('city'));
    }

    public function select_delivery(Request $request){
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

}
