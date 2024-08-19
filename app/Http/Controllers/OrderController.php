<?php

namespace App\Http\Controllers;

use App\Affilicate;
use App\Commission;
use App\Customer;
use App\User;
use App\UserProduct;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Color;
use App\OrderDetail;
use App\CouponUsage;
use Auth;
use Session;
use DB;
use PDF;
use Mail;
use App\Mail\InvoiceEmailManager;
use Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                   ->where('order_details.seller_id', Auth::user()->id)
                    ->select('orders.id')
                    ->distinct()
                    ->paginate(20);
        return view('frontend.seller.orders', compact('orders'));
    }

    /**
     * Display a listing of the resource to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_orders(Request $request)
    {
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                   ->where('order_details.seller_id', Auth::user()->id)
                    ->select('orders.id')
                    ->distinct()
                    ->paginate(9);

        return view('orders.index', compact('orders'));
    }

    /**
     * Display a listing of the sales to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
       $orders = Order::orderBy('code', 'desc')->get();
       $comission = Commission::whereRaw('MONTH(active_date)=.6')->get();
        if(isset($request->month)){
            $commissions = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->get();
           $commissions_amount = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->where('status',0)->sum('commission_amount')->get();
            $commissions_amount = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->whereRaw('status=0')->sum('commission_amount')->get();
        }else{
            $commissions = Commission:: all();
            $commissions_amount = Commission::where('status',0)->sum('commission_amount');
        }

        return view('sales.index', compact('commissions','commissions_amount'));
    }
    public function doanhthu(Request $request)
    {
        if(isset($request->month)){
            $commissions = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->get();
            $commissions_amount = Commission:: whereRaw('MONTH(active_date) = '.$request->month)->whereRaw('status=0')->sum('commission_amount');
        }else{
            $commissions = Commission:: all();
            $commissions_amount = Commission::where('status',0)->sum('commission_amount');
        }

        return view('sales.index', compact('commissions','commissions_amount'));
    }

    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales_show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        return view('sales.show', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = new Order;
        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }
        else{
            $order->guest_id = mt_rand(100000, 999999);
        }

        $order->shipping_address = json_encode($request->session()->get('shipping_info'));
        $order->payment_type = $request->payment_option;
        $order->code = date('Ymd-his');
        $order->date = strtotime('now');
        if($request->hasCookie('referral')){
            $order->ref_id = $request->cookie('referral');
        }
        if($order->save()){
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            foreach (Session::get('cart') as $key => $cartItem){
                $product = Product::find($cartItem['id']);
                $subtotal += $cartItem['price']*$cartItem['quantity'];
                $tax += $cartItem['tax']*$cartItem['quantity'];
                $shipping += $cartItem['shipping']*$cartItem['quantity'];
                $product_variation = null;
                if(isset($cartItem['color'])){
                    $product_variation .= Color::where('code', $cartItem['color'])->first()->name;
                }
                foreach (json_decode($product->choice_options) as $choice){
                    $str = $choice->name; // example $str =  choice_0
                    if ($product_variation != null) {
                        $product_variation .= '-'.str_replace(' ', '', $cartItem[$str]);
                    }
                    else {
                        $product_variation .= str_replace(' ', '', $cartItem[$str]);
                    }
                }

                if($product_variation != null){
                    $variations = json_decode($product->variations);
                    $variations->$product_variation->qty -= $cartItem['quantity'];
                    $product->variations = json_encode($variations);
                    $product->save();
                }

                $order_detail = new OrderDetail;
                $order_detail->order_id  =$order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->shipping_cost = $cartItem['shipping']*$cartItem['quantity'];
                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

                $product->num_of_sale++;
                $product->save();
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if(Session::has('coupon_discount')){
                $order->grand_total -= Session::get('coupon_discount');
                $order->coupon_discount = Session::get('coupon_discount');

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Session::get('coupon_id');
                $coupon_usage->save();
            }

            $order->save();

            //stores the pdf for invoice

//             $pdf = PDF::setOptions([
//                             'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
//                             'logOutputFile' => storage_path('logs/log.htm'),
//                             'tempDir' => storage_path('logs/')
//                         ])->loadView('invoices.customer_invoice', compact(['product','order']));
//             $output = $pdf->output();
//     		file_put_contents('public/invoices/'.'Order#'.$order->code.'.pdf', $output);

//             $array['view'] = 'emails.invoice';
//             $array['subject'] = 'Đơn hàng từ website: - '.$order->code;
// //            $array['subject'] = 'Order Placed - '.$order->code;
//             $array['from'] = env('MAIL_USERNAME');
//             $array['content'] = '';
//             $array['file'] = 'public/invoices/Order#'.$order->code.'.pdf';
//             $array['file_name'] = 'Order#'.$order->code.'.pdf';

//             //sends email to customer with the invoice pdf attached
//             if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null){
//                 $mailadmin = \App\GeneralSetting::first()->email;
//                 Mail::to($mailadmin)->queue(new InvoiceEmailManager($array));
//             }
//             unlink($array['file']);

            $request->session()->put('order_id', $order->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order->viewed = 1;
        $order->save();
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order != null){
            foreach($order->orderDetails as $key => $orderDetail){
                $orderDetail->delete();
            }
            $order->delete();
            flash('Order has been deleted successfully')->success();
        }
        else{
            flash('Something went wrong')->error();
        }
        return back();
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        return view('frontend.partials.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
            $orderDetail->delivery_status = $request->status;
            $orderDetail->save();
        }
        return 1;
    }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
            $orderDetail->payment_status = $request->status;
            $orderDetail->save();
        }
        if($request->status == 'paid'){
            foreach($order->orderDetails as $key => $orderDetail){

                if($order->ref_id !=null){

                    $custommer = Customer::where('user_id','=',$order->ref_id)->first();

//                    dang login usser admin id =4
//                    id 61 luu tong tin mua hang cua f2
                    if($order->ref_id!=null) {
                        $commission = new Commission();
                        $commission->user_id = $order->user_id;
                        $commission->email_active = $order->user->email;
//                        sau nay co the sai
                        $commission->product_id = $orderDetail->product_id;
                        $commission->active_date = date('Y-m-d H:m:s');
                        $commission->commission = 200000;
                        $commission->commission_amount = 200000;
                        $commission->status = 0;
                        $commission->order_code = $order->code;
                        $commission->ref_id = $order->ref_id;
                        $commission->save();
                    }
                    $custommer2 = Customer::where('user_id','=',$custommer->ref_id)->first();
//54
                    if(isset($custommer2)){
                            $commission2 = new Commission();
                            $commission2->user_id = $order->user_id;
//                            email F2
                            $commission2->email_active =  $order->user->email;
                            $commission2->product_id = $orderDetail->product_id;
                            $commission2->active_date = date('Y-m-d H:m:s');
                            $commission2->commission = 30000;
                            $commission2->commission_amount = 30000;
                            $commission2->status = 0;
                            $commission2->order_code = $order->code;
                            $commission2->ref_id = $custommer->ref_id;
                            $commission2->save();
                    }

                    $userproduct = new UserProduct;
                    $userproduct->user_id = $order->user_id;
                    $userproduct->product_id = $orderDetail->product_id;
                    $userproduct->status =1;
                    $userproduct->order_code =$order->code;
                    if($userproduct->save()){
                        flash('đã kích hoạt khóa học thành công')->success();
                    }
                }else{
                    $userproduct = new UserProduct;
                    $userproduct->user_id = $order->user_id;
                    $userproduct->product_id = $orderDetail->product_id;
                    $userproduct->status =1;
                    $userproduct->order_code =$order->code;
                    if($userproduct->save()){
                        flash('đã kích hoạt khóa học thành công')->success();
                    }
                }

            }
        }
        else{
                $commission = Commission::where('order_code',$order->code);
                $commission->delete();
                $userproduct = UserProduct::where('order_code',$order->code);
                $userproduct->delete();
              flash('Đã xóa khóa học cho user: ',$order->user_id)->success();
        }

        $order->payment_status = $request->status;
        $order->save();
    }
}
