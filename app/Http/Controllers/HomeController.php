<?php

namespace App\Http\Controllers;

use App\CategoriesPost;
use App\CategoryImage;
use App\Contact;
use App\District;
use App\Page;
use App\Post;
use App\ProductLesson;
use App\Province;
use App\SubCategory;
use App\UserProduct;
use App\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Auth;
use Hash;
use App\Category;
use App\Brand;
use App\SubSubCategory;
use App\Product;
use App\User;
use App\Seller;
use App\Shop;
use App\Color;
use App\Order;
use App\BusinessSetting;
use App\Http\Controllers\SearchController;
use ImageOptimizer;
use Menu;
use App\Commission;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{

    public function login()
    {
        if(Auth::check()){

            return redirect()->route('dashboard');
        }
        return view('frontend.user_login');
    }
    public function registration()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('frontend.user_registration');
    }
    public function getFilemanager ()
    {
        return view('filemanager.filemanager');
    }
    public function user_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if($user != null){
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);
                }
                else{
                        auth()->login($user, false);
                }
                return redirect()->route('dashboard');
            }
        }
        return back();
    }
    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if($user != null){
            updateCartSetup();
            if(Hash::check($request->password, $user->password)){
                if($request->has('remember')){
                    auth()->login($user, true);
                }
                else{
                    auth()->login($user, false);
                }
            }
        }
        return back();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::user()->user_type == 'seller'){
            return view('frontend.seller.dashboard');
        }
        elseif(Auth::user()->user_type == 'customer'){
            return view('frontend.customer.dashboard');
        }
        else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        if(Auth::user()->user_type == 'customer'){
            return view('frontend.customer.profile');
        }
        elseif(Auth::user()->user_type == 'seller'){
            return view('frontend.seller.profile');
        }
    }

    public function customer_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->province = $request->province;
        $user->district = $request->districts;
        $user->wards = $request->ward;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

        if($request->hasFile('photo')){
            $user->avatar_original = $request->photo->store('uploads');
        }

        if($user->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }


    public function seller_update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if($request->new_password != null && ($request->new_password == $request->confirm_password)){
            $user->password = Hash::make($request->new_password);
        }

        if($request->hasFile('photo')){
            $user->avatar_original = $request->photo->store('uploads');
        }

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->sslcommerz_status = $request->sslcommerz_status;
        $seller->ssl_store_id = $request->ssl_store_id;
        $seller->ssl_password = $request->ssl_password;
        $seller->paypal_status = $request->paypal_status;
        $seller->paypal_client_id = $request->paypal_client_id;
        $seller->paypal_client_secret = $request->paypal_client_secret;
        $seller->stripe_status = $request->stripe_status;
        $seller->stripe_key = $request->stripe_key;
        $seller->stripe_secret = $request->stripe_secret;

        if($user->save() && $seller->save()){
            flash(__('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {   
        $location = $request->get('location');
        $products = Product::where('published',1)->paginate(12);

    	if ($request->ajax()) {
            $view = view('frontend.partials.itemproduct',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('frontend.index',compact('products'));

    }

    public function trackOrder(Request $request)
    {
        if($request->has('order_code')){
            $order = Order::where('code', $request->order_code)->first();
            if($order != null){
                return view('frontend.track_order', compact('order'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request)
    {
        $slug = $request->slug;

        $product  = Product::where('slug', $slug)->first();

        if($product!=null ){
            updateCartSetup();
            if($request->query('ref')){

                return response()->view('frontend.product_details', compact('product'))->withCookie(cookie()->forever('referral', $request->query('ref')));
            }else{
                return view('frontend.product_details', compact('product'));
            }
        }
        abort(404);
    }
    public function productids(Request $request)
    {
        $productIds = $request->productIds;
        $products = Product::whereIn('id', $productIds)->get();
        return view('frontend.product_listing', compact('products'));
    }
    public function shop($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null){
            return view('frontend.seller_shop', compact('shop'));
        }
        abort(404);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if($shop!=null && $type != null){
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }

    public function listing(Request $request)
    {
        $products = filter_products(Product::orderBy('created_at', 'desc'))->paginate(50);
        return view('frontend.product_listing', compact('products'));
    }

    public function productOfUser(Request $request)
    {
        /***
         *Lấy danh sách sản phẩm của user đã thanh toán
         *1.Lấy danh sách order ID trong bảng Order của user có user_id
         *2.
         *3.Lấy danh sách mã sản phẩm product_id trong bảng Order Detail
         */
/*       $orders = Order::where('user_id',$request->user_id)->where('payment_status','paid')->get();
        $products = array();
        foreach ($orders as $order){
            foreach ($order->orderDetails as $detail){
                array_push($products,$detail->product_id);
            }
        }
        $products = Product::whereIn('id',$products)->orderBy('created_at', 'desc')->paginate(12);
*/
        $courseOfUser = UserProduct::where('user_id',$request->user_id)->where('status',1)->get(['product_id']);
        $products = Product::whereIn('id',$courseOfUser)->orderBy('created_at', 'desc')->paginate(12);

        return view('frontend.product_user', compact('products'));
    }

    public function staffCommission(Request $request){
//        $commissions = Commission::where('ref_id',$request->user_id)->orderBy('created_at','desc')->get();

            //lấy danh sách hóa đơn chưa thanh toán được giới thiệu bởi user đang đăng nhập
    //        $comission_info = Order::where('ref_id',$request->user_id)->where('payment_status','paid')->get();
    //        dd($comission_info);
        if(isset($request->month)){

            $commissions_amount = Commission::whereRaw('status=0')->where('ref_id',$request->user_id)->sum('commission_amount');
            $commissions = Commission::where('ref_id','=',$request->user_id)->whereRaw("MONTH(active_date) =".$request->month."")->get();

            $commissions_amount = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->whereRaw('status=0')->where('ref_id',$request->user_id)->sum('commission_amount');

//            $commissions = Commission:: where('ref_id',$request->user_id)->whereRaw('MONTH(active_date) = '.$request->month)->get();
//            $commissions_amount = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->where('status',0)->sum('commission_amount')->get();
//            $commissions_amount = Commission:: where('ref_id',$request->user_id)->whereRaw('MONTH(active_date) = '.$request->month)->whereRaw('status=0')->sum('commission_amount');
        }else{
            $commissions_amount = Commission::whereRaw('status=0')->where('ref_id',$request->user_id)->sum('commission_amount');
            $commissions = Commission::where('ref_id','=',$request->user_id)->get();

//            $commissions = Commission::where('ref_id',$request->user_id)->where('status',0)->whereRaw('MONTH(active_date) = '.$request->month)->sum('commission_amount');
//            $commissions_amount =  Commission::where('ref_id',$request->user_id)->where('status',0)->whereRaw('MONTH(active_date) = '.$request->month)->sum('commission_amount');
        }
//            $commissions_amount = Commission::where('ref_id',$request->user_id)->where('status',0)->sum('commission_amount');
//            $commissions_amount = 0;
        return view('frontend.customer.cus_commission',compact('commissions','commissions_amount'));
    }
    public function linkaff(Request $request){
        $products  = Product::all();
        return view('frontend.affilicate_link',compact('s'));
    }
    public function userCourse($slug){
        /***
         *
         */
        $product  = Product::where('slug', $slug)->first();
        if($product!=null){
            return view('frontend.userCourse', compact('product'));
        }
        abort(404);
    }
    public function all_categories(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_category', compact('categories'));
    }
    public function CategoryPost($alias)
    {
        $categorypost = CategoriesPost::where('alias',$alias)->first();
        $posts = Post::where('category_id',$categorypost->id)->paginate(12);
//        $categoryImage = CategoryImage::where('category_id','=',$categorypost->id)->paginate(12);
        return view('frontend.posts_list', compact('categorypost','categoryImage','posts'));
    }
    public function all_brands(Request $request)
    {
        $categories = Category::all();
        return view('frontend.all_brand', compact('categories'));
    }

    public function show_product_upload_form(Request $request)
    {
        $categories = Category::all();
        return view('frontend.seller.product_upload', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.product_edit', compact('categories', 'product'));
    }

    public function seller_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.seller.products', compact('products'));
    }

    public function ajax_search(Request $request)
    {
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$request->search.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $request->search) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%'.$request->search.'%'))->get()->take(3);
        
        $subsubcategories = SubSubCategory::where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        $shops = Shop::where('name', 'like', '%'.$request->search.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($subsubcategories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'subsubcategories', 'keywords', 'shops'));
        }
        return '0';
    }
    public function spdanhmuc(Request $request){
        $category = $request->slugLevel1;
         if($category != null){
            // $category = Category::where('slug',$category)->first();
            $category =  Category::where('slug',$category)->first();
            $products = Product::where('category_id',$category->id)
                        ->where('published',1)
                       ->paginate(50);
            return view('frontend.product_listing', compact('products','category')); 
        }

    }
     public function subcategory(Request $request){
        $slugLevel1 = $request->slugLevel1;
        $slugLevel2 = $request->slugLevel2;
        if($slugLevel1 != null||$slugLevel2 !=''){
            $subcategory =  SubCategory::where('slug',$slugLevel2)->first();
            $category = $subcategory ->category;
            $products = Product::where('subcategory_id',$subcategory->id)
                        ->where('published',1)
                       ->paginate(50);
            return view('frontend.product_listing', compact('products','category','subcategory')); 
        }
     }
     public function subsubcategory(Request $request){

        $slugLevel1 = $request->slugLevel1;
        $slugLevel2 = $request->slugLevel2;
        $slugLevel3 = $request->slugLevel3;
        
         if($slugLevel3 != null){
            $subsubcategory =  SubSubCategory::where('slug',$slugLevel3)->first();
            $category = $subsubcategory ->subcategory->category; 
            $subcategory = $subsubcategory ->subcategory;
            $products = Product::where('subsubcategory_id',$subsubcategory->id)
                        ->where('published',1)
                       ->paginate(50);
            return view('frontend.product_listing', compact('products','category','subcategory','subsubcategory')); 
        }
     }
     public function search_by_slug(Request $request)
    {
        $query = $request->q;
   
        $brand_id = $request->brand_id;
        $sort_by = $request->sort_by;

        $category_id = $request->slug;

        $subcategory_id = $request->subcategory_id;
        $subsubcategory_id = $request->subsubcategory_id;

        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $request->brand_id]);
        }
        if($category_id != null){

            $conditions = array_merge($conditions, ['category_id' => $category_id]);

            //neu category -> parent_id = 0
            //them vao dieu kien tim kiem co parent_id = category_id
//            $categories_child = Category::where('parent_id',$category_id)->get();
//            foreach ($categories_child as $category_child){
//                $conditions = array_merge($conditions, ['category_id'=>['subcategory_id' => $category_child->id]]);
//            }
        }
        if($subcategory_id != null){
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if($subsubcategory_id != null){
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if($seller_id != null){
        $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
    }
//        $products = Product::where($conditions);
        $products = Product::where($conditions);
        if($min_price != null && $max_price != null){
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%');
        }

        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }
//        $products = Product::
        $products = filter_products($products)->paginate(12)->appends(request()->query());
        return view('frontend.product_listing', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price'));
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $brand_id = $request->brand_id;
        $sort_by = $request->sort_by;
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $subsubcategory_id = $request->subsubcategory_id;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $request->brand_id]);
        }
        if($category_id != null){

            $conditions = array_merge($conditions, ['category_id' => $category_id]);

            //neu category -> parent_id = 0
            //them vao dieu kien tim kiem co parent_id = category_id
//            $categories_child = Category::where('parent_id',$category_id)->get();
//            foreach ($categories_child as $category_child){
//                $conditions = array_merge($conditions, ['category_id'=>['subcategory_id' => $category_child->id]]);
//            }
        }
        if($subcategory_id != null){
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if($subsubcategory_id != null){
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if($seller_id != null){
        $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
    }
//        $products = Product::where($conditions);
        $products = Product::where($conditions);
        
        if($min_price != null && $max_price != null){
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%'.$query.'%')
                        ->orWhere('tags','like','%'.$query.'%')
                        ->orWhere('meta_title','like','%'.$query.'%')
                        ->orWhere('meta_description','like','%'.$query.'%');
        }

        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }
//        $products = Product::
        $products = filter_products($products)->paginate(12)->appends(request()->query());
        return view('frontend.product_listing', compact('products', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price'));
    }

    public function product_content(Request $request){
        $connector  = $request->connector;
        $selector   = $request->selector;
        $select     = $request->select;
        $type       = $request->type;
        productDescCache($connector,$selector,$select,$type);
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if(in_array($category->id, $request->top_categories)){
                $category->top = 1;
                $category->save();
            }
            else{
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if(in_array($brand->id, $request->top_brands)){
                $brand->top = 1;
                $brand->save();
            }
            else{
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(__('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';

        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            if($str != null){
                $str .= '-'.str_replace(' ', '', $request[$choice->name]);
            }
            else{
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        if($str != null){
            $price = json_decode($product->variations)->$str->price;
        }
        else{
            $price = $product->unit_price;
        }

        //discount calculation
        $flash_deal = \App\FlashDeal::where('status', 1)->first();
        if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
            $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
            if($flash_deal_product->discount_type == 'percent'){
                $price -= ($price*$flash_deal_product->discount)/100;
            }
            elseif($flash_deal_product->discount_type == 'amount'){
                $price -= $flash_deal_product->discount;
            }
        }
        else{
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
//                $price -= $product->discount;
                if(isset(json_decode($product->variations)->$str->discount)){
                    $price = json_decode($product->variations)->$str->price - json_decode($product->variations)->$str->discount;
                }
                else{
                    $price -= $product->discount;
                }

            }
        }

        if($product->tax_type == 'percent'){
            $price += ($price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $price += $product->tax;
        }
        return single_price($price*$request->quantity);
    }

    public function sellerpolicy(){
        return view("frontend.policies.sellerpolicy");
    }

    public function returnpolicy(){
        return view("frontend.policies.returnpolicy");
    }

    public function supportpolicy(){
        return view("frontend.policies.supportpolicy");
    }
    public function page(Request $request){
        $page = Page::where('alias',$request->slug)->first();
        return view("frontend.evo_theme.evo_page",compact('page'));
    }
    public function gioithieu(Request $request){
        return view("frontend.gioithieu");
    }
    public function quytrinh(Request $request){
        return view("frontend.partials.body.quytrinh");
    }
    public function sanpham(Request $request){
        $products = filter_products(Product::orderBy('created_at', 'desc'))->paginate(50);
        return view("frontend.partials.body.sanpham", compact('products'));
    }
    public function lienhe(Request $request){
        return view("frontend.lienhe");
    }
    public function tintuc(Request $request){
        return view("frontend.posts_list");
    }
    public function tuyendung(Request $request){
        return view("frontend.tuyen-dung");
    }
    public function duan(Request $request){
        return view("frontend.du_an");
    }
    public function khuyenmai(Request $request){
        return view("frontend.khuyenmai");
    }
    public function catalogue(Request $request){
        return view("frontend.catalogue");
    }

    public function blogs(){
        $category = CategoriesPost::find(7);
        $posts = Post::where('category_id',7)->where('published',1)->orderBy('created_at','desc')->paginate(9);
        return view("frontend.evo_theme.evo_news",compact('posts','category'));
    }
    public function blog_detail($slug){

        $post = Post::where('alias',$slug)->first();
//        dd($post);
        return view("frontend.post_detail",compact('post'));
    }
    public function contact(){
        return view("frontend.contact");
    }
    public function postContact(Request $request){
        $contact = new Contact;
        $contact->name=$request ->fullname;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        if($contact->save()){
            flash(__('Thông điệp của bạn đã được gửi tới quản trị viên'))->success();
//            if(Auth::user()->user_type == 'admin'){
            return redirect()->route('lien-he');
//            }
//            else{
//                return redirect()->route('seller.products');
//            }
        }
        else{
            flash(__('Vui lòng điền đầy đủ thông tin'))->error();
            return back();
        }
    }
    public function terms(){
        return view("frontend.policies.terms");
    }

    public function privacypolicy(){
        return view("frontend.policies.privacypolicy");
    }
    public function get_district(Request $request){
        $districts = District::where('province_id',$request->province_id)->get();
        return $districts;
    }
    public function getWards(Request $request){
        $wards = Ward::where('district_id',$request->district_id)->get();
        return $wards;
    }
    public function get_subcategories_by_category(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();
        return $subcategories;
    }
    public function get_subcategories_by_id(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();
        return $subcategories;
    }
    public function get_subsubcategories_by_subcategory(Request $request)
    {
        $subsubcategories = SubSubCategory::where('sub_category_id', $request->subcategory_id)->get();
        return $subsubcategories;
    }

    public function get_brands_by_subsubcategory(Request $request)
    {
        $category_id = $request->category_id;
        $brand_ids = json_decode(Category::findOrFail($category_id)->brands);

         $brands = array();

         foreach ($brand_ids as $key => $brand_id) {
             array_push($brands, Brand::findOrFail($brand_id));
         }
//        $brands = Brand::all();

        return $brands;
    }
    public function getVideoUrl(Request $request)
    {
        $lesson = ProductLesson::findOrFail($request->id);
        $random = str_random(10);
        session(['random' =>$random]);
        $startTime  =  strtotime(now());
        return route('lesson.returnVideoUrl', ['id' => $request->id,'token'=>$random,'time'=>$startTime]);
//        return view('frontend.partials.videoCourse', compact('lesson'))->withHeaders([
//            'Content-Type' => 'application/mp4'
//        ]);
    }
        public function returnVideoUrl($id,$random,$startTime){

        if($random!=session('random')){
            return null;
        }
        $finishTime  = strtotime(now());
        $totalDuration  = $finishTime-$startTime;
        if($totalDuration>5){
            return null;
        }

        $lesson = ProductLesson::findOrFail($id);
        $file = File::get(base_path().'/public/'.$lesson->video_url);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'video/mp4');
        return $response;
    //        return view('frontend.partials.videoCourse', compact('lesson'))->withHeaders([
//            'Content-Type' => 'application/mp4'
//        ]);
    }
}
