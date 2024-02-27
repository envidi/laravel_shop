<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $product = new Product();
        $listProduct = $product->getAllProducts(); 
        return view('clients.home', compact('listProduct'));
    }
    public function productPage(Request $request){
        $product = new Product();
        $listProduct = [];
        if($request->has('key')){
            $tukhoa = ($request->has('key'))? $request->key:"";
            $tukhoa = trim(strip_tags($tukhoa));
            $listProduct = $product->searchProductDB($tukhoa);
        }else{

            $listProduct = $product->getAllProducts(); 
           
        }      
        
        return view('clients.product', compact('listProduct'));
    }
    public function getNews(){
        return view('news');
    }
    public function getCategories(){
        return 'Categories';
    }
}
