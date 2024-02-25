<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    //
    public function create_payment(Request $request){
        $filePath = config_path('configPayment.php');
        $quantity_hidden = $request->quantity_hidden;
        $id_hidden = $request->id_hidden;
        $total = $request->total_hidden;        
        $total_all = $request->total;
        $note = $request->note !== null ? $request->note : '';
        $bill_info = [
            "quantity_hidden"=>$quantity_hidden,
            "id_hidden"=>$id_hidden,
            "total_hidden"=>$total,
            "total"=>$total_all,
            "note"=>$note
        ];
         /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        $request->session()->flash('bill_info',$bill_info);
         /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        $request->session()->reflash();
        
        require($filePath);
        $vnp_TxnRef = rand(1,10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request->total * 100; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" =>$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount* 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" .$vnp_TxnRef,
            "vnp_OrderType" => "other",
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
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
         
        return redirect($vnp_Url);
    }
}
