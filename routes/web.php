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

use App\Commission;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
    // return what you want
});

//Route cache:
Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>config clear</h1>';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>config cached</h1>';
});
Route::get('/link', function() {
    $exitCode = Artisan::call('storage:link');
    return $exitCode;
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});


Route::group(['before' => 'web','middleware' => ['widget','web']],function() {


Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');

Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/users/registration', 'HomeController@registration')->name('user.registration');
Route::post('/users/login', 'HomeController@user_login')->name('user.login.submit');
Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');

Route::post('/getDistrict', 'HomeController@get_district')->name('province.get_district');
Route::post('/getWards', 'HomeController@getWards')->name('district.getWards');
Route::post('/subcategories/get_subcategories_by_category', 'SubCategoryController@get_subcategories_by_category')->name('subcategories.get_subcategories_by_category');
Route::post('/subsubcategories/get_subsubcategories_by_subcategory', 'SubSubCategoryController@get_subsubcategories_by_subcategory')->name('subsubcategories.get_subsubcategories_by_subcategory');
Route::post('/subsubcategories/get_brands_by_subsubcategory', 'SubSubCategoryController@get_brands_by_subsubcategory')->name('subsubcategories.get_brands_by_subsubcategory');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/gioi-thieu', 'HomeController@gioithieu')->name('gioi-thieu');
Route::get('/quy-trinh-lam-choi-dot', 'HomeController@quytrinh')->name('quy-trinh');
Route::get('/san-pham-choi-dot', 'HomeController@sanpham')->name('san-pham-choi-dot');
Route::get('/lien-he', 'HomeController@lienhe')->name('lienhe');
Route::get('/tin-tuc', 'HomeController@tintuc')->name('tintuc');
Route::get('/tuyen-dung', 'HomeController@tuyendung')->name('tuyendung');
Route::get('/du-an', 'HomeController@duan')->name('duan');
Route::get('/khuyen-mai', 'HomeController@khuyenmai')->name('khuyenmai');
Route::get('/catalogue', 'HomeController@catalogue')->name('catalogue');

Route::get('/san-pham', 'HomeController@listing')->name('products');
Route::get('/san-pham/{slug}', 'HomeController@product')->name('product');
Route::post('/san-pham-wishlist', 'HomeController@productids')->name('productids');
Route::resource('wishlists','WishlistController');
Route::post('/wishlists/remove', 'WishlistController@remove')->name('wishlists.remove');

Route::get('/_{slugLevel1}.html', 'HomeController@spdanhmuc')->name('category.slug');

Route::get('/_{slugLevel1}/{slugLevel2}.html', 'HomeController@subcategory')->name('subcategory.slug');

Route::get('/_{slugLevel1}/{slugLevel2}/{slugLevel3}', 'HomeController@subsubcategory')->name('subsubcategory.slug');



Route::get('/search?category_id={category_id}', 'HomeController@search')->name('products.category');
Route::get('/search?subcategory_id={subcategory_id}', 'HomeController@search')->name('products.subcategory');

Route::get('/search?subsubcategory_id={subsubcategory_id}', 'HomeController@search')->name('products.subsubcategory');
Route::get('/search?brand_id={brand_id}', 'HomeController@search')->name('products.brand');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shop/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shops/visit/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');

Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/nav-cart-items', 'CartController@updateNavCart')->name('cart.nav_cart');
Route::post('/cart/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
Route::post('/cart/addtocart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');

Route::post('/checkout/payment', 'CheckoutController@checkout')->name('payment.checkout');
Route::get('/checkout', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');
Route::post('/checkout/payment_select', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');
Route::get('/checkout/payment_select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
Route::post('/checkout/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

// SSLCOMMERZ Start
Route::get('/sslcommerz/pay', 'PublicSslCommerzPaymentController@index');
Route::POST('/sslcommerz/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/sslcommerz/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/sslcommerz/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/sslcommerz/ipn', 'PublicSslCommerzPaymentController@ipn');
//SSLCOMMERZ END

//Stipe Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Stripe END

//vnpay Start
Route::get('vnpay', 'VnpayController@vnpay');
Route::post('vnpaypost', 'VnpayController@VnpayPost')->name('vnpay.post');
//vnpay END

Route::get('/compare', 'CompareController@index')->name('compare');
Route::get('/compare/reset', 'CompareController@reset')->name('compare.reset');
Route::post('/compare/addToCompare', 'CompareController@addToCompare')->name('compare.addToCompare');

Route::resource('subscribers','SubscriberController');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');
Route::get('/categories', 'HomeController@all_categories')->name('categories.all');
Route::get('/category/{alias}', 'HomeController@CategoryPost')->name('categories.CategoryPost');
Route::post('/categories/get_subcategories_by_category', 'HomeController@get_subcategories_by_category')->name('categories.get_subcategories_by_category');
Route::post('/categories/get_subsubcategories_by_subcategory', 'HomeController@get_subsubcategories_by_subcategory')->name('categories.get_subsubcategories_by_subcategory');
Route::post('/categories/get_brands_by_subsubcategory', 'HomeController@get_brands_by_subsubcategory')->name('categories.get_brands_by_subsubcategory');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search?q={search}', 'HomeController@search')->name('suggestion.search');
Route::post('/ajax-search', 'HomeController@ajax_search')->name('search.ajax');
Route::post('/config_content', 'HomeController@product_content')->name('configs.update_status');

Route::get('/page/{slug}', 'HomeController@page')->name('page');
Route::get('/blogs', 'HomeController@blogs')->name('blogs');
Route::get('/news/{slug}', 'HomeController@blog_detail')->name('news');
Route::get('/lien-he', 'HomeController@lienhe')->name('lien-he');
Route::post('/gui-lien-he', 'HomeController@postContact')->name('gui-lien-he');
Route::get('/sellerpolicy', 'HomeController@sellerpolicy')->name('sellerpolicy');
Route::get('/quy-dinh-doi-tra-hang', 'HomeController@returnpolicy')->name('returnpolicy');
Route::get('/supportpolicy', 'HomeController@supportpolicy')->name('supportpolicy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacypolicy', 'HomeController@privacypolicy')->name('privacypolicy');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['middleware' => ['user', 'verified']], function(){
    Route::get('/khoahoccuaban/{user_id}', 'HomeController@productOfUser')->name('products.userId');
    Route::get('/khoahoc/{slug}', 'HomeController@userCourse')->name('product.userCourse');
    Route::post('/courseVideo', 'HomeController@getVideoUrl')->name('lesson.getVideoUrl');
    Route::get('/video_url/{id}_{random}_{time}', 'HomeController@returnVideoUrl')->name('lesson.returnVideoUrl');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/commission', 'CommissionController@index')->name('commission.index');
    Route::get('/commission/{user_id}', 'HomeController@staffCommission')->name('commission.custommer');
    Route::post('/commission/{user_id}', 'HomeController@staffCommission')->name('commission.month');
    Route::get('/affilicate/{user_id}', 'HomeController@linkaff')->name('aff.link');

	Route::post('/customer/update-profile', 'HomeController@customer_update_profile')->name('customer.profile.update');
	Route::post('/seller/update-profile', 'HomeController@seller_update_profile')->name('seller.profile.update');

	Route::resource('purchase_history','PurchaseHistoryController');
	Route::post('/purchase_history/details', 'PurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
	Route::get('/purchase_history/destroy/{id}', 'PurchaseHistoryController@destroy')->name('purchase_history.destroy');

	

	Route::get('/wallet', 'WalletController@index')->name('wallet.index');
	Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');

	Route::resource('support_ticket','SupportTicketController');
	Route::post('support_ticket/reply','SupportTicketController@seller_store')->name('support_ticket.seller_store');
});

Route::group(['prefix' =>'seller', 'middleware' => ['seller', 'verified']], function(){
	Route::get('/products', 'HomeController@seller_product_list')->name('seller.products');
	Route::get('/product/upload', 'HomeController@show_product_upload_form')->name('seller.products.upload');
	Route::get('/product/{id}/edit', 'HomeController@show_product_edit_form')->name('seller.products.edit');
	Route::resource('payments','PaymentController');

	Route::get('/shop/apply_for_verification', 'ShopController@verify_form')->name('shop.verify');
	Route::post('/shop/apply_for_verification', 'ShopController@verify_form_store')->name('shop.verify.store');

	Route::get('/reviews', 'ReviewController@seller_reviews')->name('reviews.seller');
});

Route::group(['middleware' => ['auth']], function(){

	Route::post('/products/store/','ProductController@store')->name('products.store');
	Route::post('/products/update/{id}','ProductController@update')->name('products.update');
	Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
	Route::get('/products/duplicate/{id}', 'ProductController@duplicate')->name('products.duplicate');
	Route::post('/products/sku_combination', 'ProductController@sku_combination')->name('products.sku_combination');
	Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
	Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
	Route::post('/products/published', 'ProductController@updatePublished')->name('products.published');

	Route::get('invoice/customer/{order_id}', 'InvoiceController@customer_invoice_download')->name('customer.invoice.download');
	Route::get('invoice/seller/{order_id}', 'InvoiceController@seller_invoice_download')->name('seller.invoice.download');

	Route::resource('orders','OrderController');
	Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
	Route::post('/orders/details', 'OrderController@order_details')->name('orders.details');
	Route::post('/orders/update_delivery_status', 'OrderController@update_delivery_status')->name('orders.update_delivery_status');
	Route::post('/orders/update_payment_status', 'OrderController@update_payment_status')->name('orders.update_payment_status');

	Route::resource('/reviews', 'ReviewController');


});

Route::resource('shops', 'ShopController');
Route::get('/track_your_order', 'HomeController@trackOrder')->name('orders.track');
Route::get('sitemap','SitemapController@index');
?>