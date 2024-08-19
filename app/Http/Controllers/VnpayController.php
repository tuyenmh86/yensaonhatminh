<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Order;
use App\BusinessSetting;
use App\Seller;
use Session;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\WalletController;

class VnpayController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function vnpay()
    {
        if(Session::has('payment_type')){
            if(Session::get('payment_type') == 'cart_payment' || Session::get('payment_type') == 'wallet_payment'){
                return view('frontend.payment.vnpay');
            }
            elseif (Session::get('payment_type') == 'seller_payment') {
                $seller = Seller::findOrFail(Session::get('payment_data')['seller_id']);
                return view('stripes.stripe', compact('seller'));
            }
        }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
     function VnpayPost(Request $request)
    {

        $vnp_TmnCode = "X9I0GWU3"; //Mã website tại VNPAY
        $vnp_HashSecret = "LDVOQXHVGUYDIYGGXYXHDGZINKQVSKGX"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        $vnp_Returnurl = env('APP_URL')."/product/checkout/checkout_return";
        $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toan hoa don';
        $vnp_OrderType = "billpayment";
        $vnp_Amount = 10000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
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
    public function checkout_return(Request $request){
        $inputData =[
        'vnp_Amount' => $request->vnp_Amount,
        'vnp_BankCode' => $request->vnp_BankCode,
        'vnp_BankTranNo'=>$request->vnp_BankTranNo,
        'vnp_CardType'=> $request->vnp_CardType,
        'vnp_OrderInfo'=>$request->vnp_OrderInfo,
        'vnp_PayDate'=>$request->vnp_PayDate,
        'vnp_ResponseCode'=>$request->vnp_ResponseCode,
        'vnp_TmnCode'=>$request->vnp_TmnCode,
        'vnp_TransactionNo'=>$request->vnp_TransactionNo,
        'vnp_TxnRef'=>$request->vnp_TxnRef,
        'vnp_SecureHashType'=>$request->vnp_SecureHashType,
        'vnp_SecureHash'=>$request->vnp_SecureHash
        ];
        ksort($inputData);
        $result="";
        switch($request->vnp_ResponseCode){
            case '00':
                $result = "Giao dịch thành công";
                break;
            case '01':
                $result = "Giao dịch đã tồn tại";
                break;
            case '02':
                $result = "Merchant không hợp lệ (kiểm tra lại vnp_TmnCode)";
                break;
            case '03':
                $result = "Dữ liệu gửi sang không đúng định dạng";
                break;
            case '04':
                $result = "Khởi tạo GD không thành công do Website đang bị tạm khóa";
                break;
            case '05':
                $result = "Giao dịch không thành công do: Quý khách nhập sai mật khẩu quá số lần quy định. Xin quý khách vui lòng thực hiện lại giao dịch";
                break;
            case '13':
                $result = "Giao dịch không thành công do Quý khách nhập sai mật khẩu xác thực giao dịch (OTP). Xin quý khách vui lòng thực hiện lại giao dịch.";
                break;
            case '07':
                $result = "Giao dịch bị nghi ngờ là giao dịch gian lận";
                break;
           case '09':
                $result ="giao dịch không thành công do: Thẻ/Tài khoản của khách hàng chưa đăng ký dịch vụ InternetBanking tại ngân hàng.";
                break;
            case '10':
                $result ="Giao dịch không thành công do: Khách hàng xác thực thông tin thẻ/tài khoản không đúng quá 3 lần";
                break;
            case '11':
                $result = "Giao dịch không thành công do: Đã hết hạn chờ thanh toán. Xin quý khách vui lòng thực hiện lại giao dịch.";
                break;
            case '12':
                $result = "Giao dịch không thành công do: Thẻ/Tài khoản của khách hàng bị khóa.";
                break;
            case '51':
                $result =	"Giao dịch không thành công do: Tài khoản của quý khách không đủ số dư để thực hiện giao dịch.";
                break;
            case '65':
                $result =	"Giao dịch không thành công do: Tài khoản của Quý khách đã vượt quá hạn mức giao dịch trong ngày.";
                break;
            case '08':
                $result =	"Giao dịch không thành công do: Hệ thống Ngân hàng đang bảo trì. Xin quý khách tạm thời không thực hiện giao dịch bằng thẻ/tài khoản của Ngân hàng này.";
                break;
            case '99':
                $result =	"Các lỗi khác (lỗi còn lại, không có trong danh sách mã lỗi đã liệt kê)";
                break;
            // default:
            //     $result =	"Lỗi không xác định ";
            //     break;
        }

        // câp nhật số dư tài khoản cho user id;
        $this->userRepository->update(3,['sodutaikhoan' => $request->vnp_Amount]);
        // Cộng điểm cho khách hàng vào tài khoản

        // hien thi file đã mua vào trang return
        // add danh sach file download với khách hàng id

        // return view('site.cart.checkout_return',['inputData'=>$inputData,'result' =>$result]);
    }
}
