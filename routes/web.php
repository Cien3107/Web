<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController; 
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/lien-he', [HomeController::class, 'lien_he']);
Route::post('/tim-kiem', [HomeController::class, 'search']);
Route::post('/tu-dong', [HomeController::class, 'tu_dong']);

//login gg
Route::get('/login-customer-google', [AdminController::class, 'login_customer_google']);
Route::get('/customer/google/callback', [AdminController::class, 'callback_customer_google']);

//login fb
Route::get('/login-customer-facebook', [AdminController::class, 'login_customer_facebook']);
Route::get('/customer/facebook/callback', [AdminController::class, 'callback_customer_facebook']);


//Danh mục sản phẩm index
Route::get('/danh-muc/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu/{brand_id}', [BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet/{product_id}', [ProductController::class, 'details_product']);


//backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);


//Tin tức
Route::get('/add-tintuc', [PostController::class, 'add_tintuc']);
Route::get('/all-tintuc', [PostController::class, 'all_tintuc']);
Route::get('/edit-post/{id}', [PostController::class, 'edit_post']);
Route::get('/save-tintuc', [PostController::class, 'save_tintuc']);
Route::get('/delete-post/{id}', [PostController::class, 'delete_post']);
Route::get('/update-tintuc/{id}', [PostController::class, 'update_tintuc']);





Route::get('/news', [PostController::class, 'news']);
Route::get('/details-news/{id}', [PostController::class, 'details_news']);

//thống kê
Route::post('/filter-by-date', [AdminController::class, 'filter_by_date']);
Route::post('/dashboard-filter', [AdminController::class, 'dashboard_filter']);
Route::post('/days-order', [AdminController::class, 'days_order']);


//category-product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('//delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('//update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);


//Brand
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);


//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/comment', [ProductController::class, 'list_comment']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
Route::post('/load-comment', [ProductController::class, 'load_comment']);
Route::post('/send-comment', [ProductController::class, 'send_comment']);
Route::post('/duyet-comment', [ProductController::class, 'duyet_comment']);
Route::post('/reply-comment', [ProductController::class, 'reply_comment']);
Route::post('/insert-rating', [ProductController::class, 'insert_rating']);
Route::post('/search-admin', [ProductController::class, 'search_admin']);


//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/xoa-sp/{session_id}', [CartController::class, 'xoa_sp']);


//Coupon

Route::get('/coupon', [CouponController::class, 'coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::get('/del-coupon', [CouponController::class, 'del_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
Route::post('/code-coupon', [CouponController::class, 'code_coupon']);
Route::post('/check-coupon', [CouponController::class, 'check_coupon']);

Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);

//Checkout
Route::get('/details-user/{customer_id}', [CheckoutController::class, 'details_user']);
// Route::get('/details-user/{customer_id}','CheckoutController@details_user');
Route::get('/del-user/{customer_id}', [CheckoutController::class, 'del_user']);
// Route::get('/del-user/{customer_id}','CheckoutController@del_user');
Route::get('/all-user', [CheckoutController::class, 'all_user']);
// Route::get('/all-user','CheckoutController@all_user');
Route::get('/doi-pass', [CheckoutController::class, 'doi_pass']);
// Route::get('/doi-pass','CheckoutController@doi_pass');
Route::get('/xem-canhan', [CheckoutController::class, 'xem_canhan']);
// Route::get('/xem-canhan','CheckoutController@xem_canhan');
Route::post('/update-canhan/{customer_id}', [CheckoutController::class, 'update_canhan']);
// Route::post('/update-canhan/{customer_id}','CheckoutController@update_canhan');
Route::post('/update-pass/{customer_id}', [CheckoutController::class, 'update_pass']);
// Route::post('/update-pass/{customer_id}','CheckoutController@update_pass');


Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
// Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
// Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/create-login', [CheckoutController::class, 'create_login']);
// Route::get('/create-login','CheckoutController@create_login');
Route::get('/add-customer', [CheckoutController::class, 'add_customer']);
// Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/show-checkout', [CheckoutController::class, 'show_checkout']);
// Route::get('/show-checkout','CheckoutController@show_checkout');
Route::get('/payment', [CheckoutController::class, 'payment']);
// Route::get('/payment','CheckoutController@payment');
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
// Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
// Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/dat-hang', [CheckoutController::class, 'dat_hang']);
// Route::post('/dat-hang','CheckoutController@dat_hang');
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
// Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/phi-ship', [CheckoutController::class, 'phi_ship']);
// Route::post('/phi-ship','CheckoutController@phi_ship');
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);
// Route::post('/confirm-order','CheckoutController@confirm_order');


//order
Route::get('/manage-order', [OrderController::class, 'manage_order']);
// Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
// Route::get('/view-order/{order_code}','OrderController@view_order');

Route::get('/xem-donhang', [OrderController::class, 'xem_donhang']);
// Route::get('/xem-donhang','OrderController@xem_donhang');
Route::get('/view-history/{order_code}', [OrderController::class, 'view_history']);
// Route::get('/view-history/{order_code}','OrderController@view_history');
Route::get('/huy-don/{order_code}', [OrderController::class, 'huy_don']);
// Route::get('/huy-don/{order_code}','OrderController@huy_don');



// Route::get('/delete-order/{orderId}','CheckoutController@delete_order');

//Vận chuyển
Route::get('/up-status/{phieu_id}', [DeliveryController::class, 'up_status']);
// Route::get('/up-status/{phieu_id}','DeliveryController@up_status');
Route::get('/delivery', [DeliveryController::class, 'delivery']);
// Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
// Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
// Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/chon-phi', [DeliveryController::class, 'chon_phi']);
// Route::post('/chon-phi','DeliveryController@chon_phi');
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);
// Route::post('/update-delivery','DeliveryController@update_delivery');

Route::post('/save-delivery-notes/{order_code}', [DeliveryController::class, 'save_delivery_notes']);
// Route::post('/save-delivery-notes/{order_code}','DeliveryController@save_delivery_notes');
Route::get('/all-delivery-notes', [DeliveryController::class, 'all-delivery-notes']);
// Route::get('/all-delivery-notes','DeliveryController@all-delivery-notes');



//Send mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);
// Route::get('/send-mail','HomeController@send_mail');


//send coupon mail
Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}', [HomeController::class, 'send_coupon']);
// Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','HomeController@send_coupon');
Route::get('/mail-example', [HomeController::class, 'mail_example']);
// Route::get('/mail-example','HomeController@mail_example');

// //Login facebook customer
// Route::get('/login-facebook','AdminController@login_facebook');
// Route::get('/facebook/callback','AdminController@callback_facebook');

//Login  google
// Route::get('/login-google','AdminController@login_google');
// Route::get('/google/callback','AdminController@callback_google');


//Login custom GG
// Route::get('/login-customer-google','AdminController@login_customer_google');
// Route::get('/customer/google/callback','AdminController@callback_customer_google');

// Route::get('/login-customer-google','AdminController@login_customer_google');