<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index(){
        $title = 'Welcome to my channel';
        $product = new Product();
        $listProduct = $product->getAllProducts(); 
        return view('clients.home', compact('listProduct'));
    }
    public function getNews(){
        return view('news');
    }
    public function getCategories(){
        return 'Categories';
    }
}
