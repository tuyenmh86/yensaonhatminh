<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PayumoneyController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PublicSslCommerzPaymentController;
use App\Http\Controllers\OrderController;
use App\Order;
use App\BusinessSetting;
use App\Coupon;
use App\CouponUsage;
use Session;

class CheckoutController extends Controller
{

    public function __construct()
    {
        //
    }

    //check the selected payment gateway and redirect to that controller accordingly
    public function checkout(Request $request)

    {
        $orderController = new OrderController;
        $orderController->store($request);
       
        $request->session()->put('payment_type', 'cart_payment');
        
        if($request->session()->get('order_id') != null){
            if($request->payment_option == 'paypal'){
                $paypal = new PaypalController;
                return $paypal->getCheckout();
            }
            elseif ($request->payment_option == 'vnpay') {
                $vnpay = new VnpayController;
                return $vnpay->vnpay();
            }
            /*elseif ($request->payment_option == 'stripe') {
                $stripe = new StripePaymentController;
                return $stripe->stripe();
            }
            elseif ($request->payment_option == 'sslcommerz') {
                $sslcommerz = new PublicSslCommerzPaymentController;
                return $sslcommerz->index($request);
            }
            elseif ($request->payment_option == 'payumoney') {
                $payumoney = new PayumoneyController;
                return $payumoney->index($request);
            }*/
            elseif ($request->payment_option == 'cash_on_delivery') {
//                $order = Order::findOrFail($request->session()->get('order_id'));
//                $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
//
//                foreach ($order->orderDetails as $key => $orderDetail) {
//                    if($orderDetail->product->user->user_type == 'seller'){
//                        $seller = $orderDetail->product->user->seller;
//                        $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price*$commission_percentage)/100;
//                        $seller->save();
//                    }
//                }
                $request->session()->put('cart', collect([]));
                $request->session()->forget('order_id');
               
                // Lưu mã đơn hàng cho khách hàng để sử dụng trong việc tìm kiếm đơn hàng
              
                flash("Cảm ơn quý khách đã ủng hộ, chúng tôi sẽ liên hệ quý khách sau ít phút!")->success();
                return redirect()->route('home');
            }
            /*elseif ($request->payment_option == 'wallet') {
                $user = Auth::user();
                $user->balance -= Order::findOrFail($request->session()->get('order_id'))->grand_total;
                $user->save();
                return $this->checkout_done($request->session()->get('order_id'), null);
            }*/
        }
    }
    public function postCheckOutFinished (Request $request) {
        $vnp_TmnCode = "X9I0GWU3"; //Mã website tại VNPAY
        $vnp_HashSecret = "LDVOQXHVGUYDIYGGXYXHDGZINKQVSKGX"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://shopfile.local/product/checkout/checkout_return";
        $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        //goi ham checkout done
        $vnp_OrderInfo = 'thanh toan hoa don';
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $_POST['Amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bankcode'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $this->vnp_Tmncode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        echo json_encode($returnData);

    }
    //redirects to this method after a successfull checkout
    public function checkout_done($order_id, $payment)
    {
        $order = Order::findOrFail($order_id);
        $order->payment_status = 'paid';
        $order->payment_details = $payment;
        $order->save();

        /*$commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
        foreach ($order->orderDetails as $key => $orderDetail) {
            if($orderDetail->product->user->user_type == 'seller'){
                $seller = $orderDetail->product->user->seller;
                $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price*(100-$commission_percentage))/100;
                $seller->save();
            }
        }*/

        Session::put('cart', collect([]));
        Session::forget('order_id');
        Session::forget('payment_type');

        flash(__('Hoàn thành thanh toán'))->success();
        return redirect()->route('home');
    }

    public function get_shipping_info(Request $request)
    {
        $categories = Category::all();
        return view('frontend.shipping_info', compact('categories'));
    }

    public function store_shipping_info(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
//        $data['country'] = $request->country;
        $data['city'] = $request->city;
//        $data['postal_code'] = $request->postal_code;
        $data['phone'] = $request->phone;
        $data['checkout_type'] = $request->checkout_type;
        $data['payment_option']=$request->payment_option;
        $shipping_info = $data;
        $request->session()->put('shipping_info', $shipping_info);

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem){
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $tax += $cartItem['tax']*$cartItem['quantity'];
            $shipping += $cartItem['shipping']*$cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if(Session::has('coupon_discount')){
                $total -= Session::get('coupon_discount');
        }
        return $this->checkout($request);
        
    //    return view('frontend.payment_select', compact('shipping_info','total'));
    }

    public function get_payment_info(Request $request)
    {
        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem){
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $tax += $cartItem['tax']*$cartItem['quantity'];
            $shipping += $cartItem['shipping']*$cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if(Session::has('coupon_discount')){
                $total -= Session::get('coupon_discount');
        }

        return view('frontend.payment_select', compact('total'));
    }

    public function apply_coupon_code(Request $request){
        //dd($request->all());
        $coupon = Coupon::where('code', $request->code)->first();

        if($coupon != null && strtotime(date('d-m-Y')) >= $coupon->start_date && strtotime(date('d-m-Y')) <= $coupon->end_date && CouponUsage::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first() == null){
            $coupon_details = json_decode($coupon->details);

            if ($coupon->type == 'cart_base')
            {
                $subtotal = 0;
                $tax = 0;
                $shipping = 0;
                foreach (Session::get('cart') as $key => $cartItem)
                {
                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                    $tax += $cartItem['tax']*$cartItem['quantity'];
                    $shipping += $cartItem['shipping']*$cartItem['quantity'];
                }
                $sum = $subtotal+$tax+$shipping;

                if ($sum > $coupon_details->min_buy) {
                    if ($coupon->discount_type == 'percent') {
                        $coupon_discount =  ($sum * $coupon->discount)/100;
                        if ($coupon_discount > $coupon_details->max_discount) {
                            $coupon_discount = $coupon_details->max_discount;
                        }
                    }
                    elseif ($coupon->discount_type == 'amount') {
                        $coupon_discount = $coupon->discount;
                    }

                    if(!Session::has('coupon_discount')){
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('coupon_discount', $coupon_discount);
                        flash('Coupon has been applied')->success();
                    }
                    else{
                        flash('Coupon is already applied')->warning();
                    }
                }
            }
            elseif ($coupon->type == 'product_base')
            {
                $coupon_discount = 0;
                foreach (Session::get('cart') as $key => $cartItem){
                    foreach ($coupon_details as $key => $coupon_detail) {
                        if($coupon_detail->product_id == $cartItem['id']){
                            if ($coupon->discount_type == 'percent') {
                                $coupon_discount += $cartItem['price']*$coupon->discount/100;
                            }
                            elseif ($coupon->discount_type == 'amount') {
                                $coupon_discount += $coupon->discount;
                            }
                        }
                    }
                }
                if(!Session::has('coupon_discount')){
                    $request->session()->put('coupon_id', $coupon->id);
                    $request->session()->put('coupon_discount', $coupon_discount);
                    flash('Coupon has been applied')->success();
                }
                else{
                    flash('Coupon is already applied')->warning();
                }
            }
        }
        else {
            flash('No Coupon Exixts')->warning();
        }
        return back();
    }
}
