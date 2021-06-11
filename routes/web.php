<?php

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
//front-end
Route::get('/','HomeController@index');
Route::get('/huong-dan-mua-hang','HomeController@shopping_guide');
Route::get('/thanh-toan','HomeController@checkout_guide');
Route::get('/van-chuyen','HomeController@transport');
Route::get('/trang-chu','HomeController@index');
Route::get('/tim-kiem','HomeController@search')->name('searchGet');
Route::post('/tim-kiem-auto','HomeController@search_auto');

Route::get('/tat-ca-san-pham','ProductController@show_all_product')->name('allProduct');
Route::get('san-pham-khuyen-mai','ProductController@show_all_saleproduct');
Route::get('/tin-tuc/{news_id}','HomeController@detail_news')->name('detail_news');

//Danh mục, thương hiệu, chi tiet san pham và trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product')->name('productDetail');

//back-end
Route::get('/admin','AdminController@index');
Route::get('/change-pass-admin','AdminController@change_pass_admin');
Route::post('/save-change-pass-admin','AdminController@save_change_pass_admin');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');



//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

//Banner
Route::get('/add-banner','BannerController@add_banner');
Route::get('/edit-banner/{banner_id}','BannerController@edit_banner');
Route::get('/delete-banner/{banner_id}','BannerController@delete_banner');
Route::get('/all-banner','BannerController@all_banner');
Route::post('/save-banner','BannerController@save_banner');
Route::post('/update-banner/{banner_id}','BannerController@update_banner');
Route::get('/unactive-banner/{banner_id}','BannerController@unactive_banner');
Route::get('/active-banner/{banner_id}','BannerController@active_banner');

//Size
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-size/{size_id}','SizeController@edit');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-size','SizeController@index');
Route::get('/add-size','SizeController@add_size');
Route::post('/save-size','SizeController@save_size');
Route::post('/update-size','SizeController@update');
Route::get('/delete-size/{size_id}','SizeController@delete_size');

//Coupon

Route::get('/add-coupon','CouponController@add_coupon');
Route::get('/edit-coupon/{coupon_id}','CouponController@edit');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/all-coupon','CouponController@index');
Route::post('/save-coupon','CouponController@save_coupon');
Route::post('/update-coupon','CouponController@update');

//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart')->name('showCart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

//Checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment')->name('payment');
Route::get('/register-account','RegisterController@register_account');
Route::get('/delete-order/{id}','CheckoutController@deleteOrder');
Route::post('/add-customer','RegisterController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/order-place-view','CheckoutController@order_place_view')->name('orderPlace_view');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/check-coupon','CheckoutController@checkCoupon');
Route::get('/order-history','CheckoutController@show_history_order');

//Order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/thong-ke','CheckoutController@thongke')->name('thongke');
Route::get('/view-order/{orderId}','CheckoutController@view_order');
Route::post('/change-status-order','CheckoutController@saveStatus')->name('saveStatus');
// comment
Route::POST('/comment/add','CommentController@add')->name("comment.add");
Route::get('/manage-comment/{product_id}','CommentController@manage')->name("comment.manage");
Route::get('/manage-comment/delete/{id}','CommentController@delete')->name("comment.delete");
//News
Route::get('/add-news','NewsController@add_news');
Route::get('/edit-news/{news_id}','NewsController@edit_news');
Route::get('/delete-news/{news_id}','NewsController@delete_news');
Route::get('/all-news','NewsController@all_news');
Route::post('/save-news','NewsController@save_news');
Route::post('/update-news/{news_id}','NewsController@update_news');
Route::get('/unactive-news/{news_id}','NewsController@unactive_news');
Route::get('/active-news/{news_id}','NewsController@active_news');
Route::get('/tin-tuc','NewsController@show_news');


//Customer
Route::get('/add-customer','CustomerController@add_customer');
Route::get('/all-customer','CustomerController@all_customer');
Route::post('/save-customer','CustomerController@save_customer');
Route::get('/unactive-customer/{customer_id}','CustomerController@unactive_customer');
Route::get('/active-customer/{customer_id}','CustomerController@active_customer');
// Route::get('/change-pass/{id}','CustomerController@change_pass');
//Route::post('/save-change-pass','CustomerController@save_change_pass');
Route::get('/forgot-password','CustomerController@forgot_password');
Route::post('/forgot-password','CustomerController@send_forgot_password');
Route::get('/reset-password/{token}','CustomerController@reset_password');
Route::post('/reset-password','CustomerController@save_reset_password');
Route::get('/customer-info','CustomerController@customer_info');
Route::post('/customer-info','CustomerController@change_customer_info')->name('change-info');
