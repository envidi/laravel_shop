<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// session_start();
/** @noinspection PhpUndefinedMethodInspection */
class CartController extends Controller
{
    public function index(Request $request)
    {   
        $arrayCart = [];
        $total_summary = 0;
        $value = $request->session()->get('key');
        if(is_array($value)){
            $collection = new Collection($value);
            $total_summary = $collection->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });
        }
        session(['cart' => $value]);
        return view('clients.cart', compact('value','total_summary'));
    }
    public function addToCart(Request $request)
    {    
        
        $objectProduct = [
            'name'=>$request->name,
            'product_id'=>$request->product_id,
            'price'=>$request->price,
            'image'=>$request->image,
            
        ];
        $cartSession = $request->session()->has('key') ? $request->session()->get('key') :[];
        $currentObject = array_search($request->product_id, array_column($cartSession, 'product_id'));                
        if($currentObject !== false){
           
             /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
            $request->session()->increment("key.{$currentObject}.quantity",$incrementBy = $request->quantity);
            $total_price = ($cartSession[$currentObject]['quantity'] + $request->quantity) * $cartSession[$currentObject]['price'];
            $request->session()->put("key.{$currentObject}.total",$total_price);
            
            return redirect()->route('cart');
        }

        $objectProduct['quantity'] = $request->quantity;
        $objectProduct['total'] = $objectProduct['quantity'] * $objectProduct['price'];
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        $request->session()->push('key',$objectProduct);
        session(['cart' => $request->session()->get('key')]);
        return redirect()->route('cart');
    }
    public function confirmCart(Request $request)
    {    
        // dd($request->id_hidden);
        $cartSession = $request->session()->has('key') ? $request->session()->get('key') :[];
        $quantity = $request->quantity_hidden;
        $total_price = $request->total_hidden;
        $total_summary = $request->total;
        foreach ($request->id_hidden as $key => $value) {
            
            $request->session()->put("key.{$key}.quantity",$quantity[$key]);
            $request->session()->put("key.{$key}.total",$total_price[$key]);
        }


        // dd($request->session()->get('key'));
        $value = $request->session()->get('key');
        session(['cart' => $request->session()->get('key')]);
        return view('clients.confirmCart', compact('value','total_summary'));
    }
    public function deleteFromCart(Request $request)
    {    
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
       
        $value = $request->session()->get('key');
        $indexArray = $request->index;
        $request->session()->pull("key.{$indexArray}","key.{$indexArray}");
        // $value = $request->session()->get('key');
        // dd($value);
        return redirect()->route('cart');
    }
}
