<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Cart;

class BillController extends Controller
{
    private $bill;
    private $cart;
    
    public function __construct() {
        $this->bill = new Bill();
        $this->cart = new Cart();
    }
    public function getBill(Request $request){
        $bill_user = $this->bill->listBill(1);
        foreach ($bill_user as $key => $value) {
            $cartFromBill = $this->cart->listCartDB($value['id'])->toArray();
            $bill_user[$key]['cartList'] = $cartFromBill;
        }
        return view('clients.bill_list',compact('bill_user'));
    }
    public function getAllBill(Request $request){
        $bill_all = $this->bill->getAllBillDB();
        foreach ($bill_all as $key => $value) {
            $cartFromBill = $this->cart->listCartDB($value['id'])->toArray();
            $bill_all[$key]['cartList'] = $cartFromBill;
        }
        // dd($bill_all);
        return view('admin.cart.cartList',compact('bill_all'));
    }
    public function editBill($id = 0){
        $bill_single = $this->bill->getSingleBillDB($id)[0];
        
        $array_status = ['Processing','Completed','Cancle'];        
        return view('admin.cart.cartEdit',compact('bill_single','array_status'));
    }
    public function handleEditBill(Request $request){
        
        $bill_single = $this->bill->updateStatusBill($request->status, $request->id);
        
              
        return redirect()->route('order.list')->with('msg', 'Cập nhật đơn hàng thành công');
    }
    public function cancleBill(Request $request){
        $this->bill->updateStatusBill('Cancle', $request->id);
        
        return redirect()->route('bill_list')->with('msg', 'Hủy đơn hàng thành công');
    }
    public function deleteBill($id){
        $this->cart->deleteCartDb($id);
        $this->bill->deleteBillDB($id);
        return redirect()->route('order.list')->with('msg', 'Xóa đơn hàng thành công');
    }
    
    public function addToBillAndCart(Request $request)
    {   
        if($request->query('vnp_ResponseCode') == "00"){
            
            $bill_info = $request->session()->get('bill_info');
           
            $quantity_hidden = $bill_info['quantity_hidden'];
            $id_hidden = $bill_info['id_hidden'];
            $total = $bill_info['total_hidden'];;            
            $total_all = $bill_info['total'];
            $note = $bill_info['note'];
            $cartSession = $request->session()->get('key');
            
            $data_bill = [
                'user_id'=>1,
                'total'=> $total_all,
                'typeBank'=>'NCB',
                'status'=>'Processing',
                'note'=>$note,
                'description'=>'This bill is paid',
                'created_at'=>date('Y-m-d H:i:s')
            ];
            $id_bill = $this->bill->addBill($data_bill);

            foreach ($id_hidden as $index){
                $cartSession[$index]['quantity'] = $quantity_hidden[$index];
                $cartSession[$index]['total'] = $total[$index];
                $cartSession[$index]['bill_id'] = $id_bill;
            }
            
           $this->cart->addCartDB($cartSession);
           $request->session()->forget(['key', 'bill_info', 'cart']);

           
           return redirect()->route('bill_list');
        }
        return redirect()->route('cart');
    
    }
}
