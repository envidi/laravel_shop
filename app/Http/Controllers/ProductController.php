<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    private $products;
    private $categories;
    public function __construct() {
        $this->products = new Product();
        $this->categories = new Category();
    }
    public function index(Request $request)
    {   
        $productList = $this->products->getAllProducts();
        
        return view('clients.homeListProduct',compact('productList'));
    }
    public function getProductById(Request $request)
    {   
        $product = $this->products->getSingleProduct($request->id);
        $singleProduct = $product[0];
        
        return view('clients.productDetail',compact('singleProduct'));
    }

    public function addProduct(Request $request)
    {
        $allCate = $this->categories->getAllCategories();
        return view('clients.homeAddProduct',compact('allCate'));
    }
    public function handleAddProduct(Request $request)
    {
        
        $request->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'description'=>'required|min:5',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'category_id'=>'required',


        ], [
            'name.required'=>'Name is not allowed to empty',
            'price.required'=>'Price is not allowed to empty',
            'description.required'=>'Desc is not allowed to empty',
            'category_id.required'=>'Category is not allowed to empty'
        ]);
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'assets/client/images';
            $file->move($path, $filename);
        }
        
        $dataInsert = [
            $request->name,
            $request->price,
            $request->description,
            $request->$path.$filename,
            $request->category_id,
            date('Y-m-d H:i:s')
        ];
        
        $this->products->addProduct($dataInsert);
        
        return redirect()->route('products.list')->with('msg','Thêm sản phẩm thành công');
    }
    public function editProduct($id=0)
    {   
        if(!empty($id)){
            $productDetail = $this->products->getOneProduct($id);
            if(!empty($productDetail[0])){
                $allCate = $this->categories->getAllCategories();
                $productDetail = $productDetail[0];
                // dd($productDetail);
            }else{
                return redirect()->route('products.list')->with('msg','Sản phẩm không tồn tại');
            }
        }else{
            return redirect()->route('products.list')->with('msg','Liên kết không tồn tại');
        }
        return view('clients.homeEditProduct',compact('productDetail','allCate') );
    }
    public function handleEditProduct(Request $request, $id=0){
        $request->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'description'=>'required|min:5',
            'category_id'=>'required',


        ], [
            'name.required'=>'Name is not allowed to empty',
            'price.required'=>'Price is not allowed to empty',
            'description.required'=>'Desc is not allowed to empty',
            'category_id.required'=>'Category is not allowed to empty'
        ]);
        
        $dataUpdate = [
            $request->name,
            $request->price,
            $request->description,
            $request->category_id,
            date('Y-m-d H:i:s')
        ];
        
        $this->products->updateProduct($dataUpdate,$id);

        return  redirect()->route('products.edit',['id'=>$id])->with('msg','Update successfully');
    }
    public function handleDeleteProduct($id=0){
        
        if(!empty($id)){
            $productDetail = $this->products->getOneProduct($id);
            
            if(!empty($productDetail[0])){
                $productDeleted = $this->products->deleteProduct($id);
                if($productDeleted){
                    $msg='Delete successfully';
                }else{
                    $msg='Delete failed';
                }
            }else{
                $msg = 'This product is not exist';
            }
        }else{
            $msg = 'This link is not exist';
        }

        return  redirect()->route('products.list')->with('msg',$msg);
    }
    
}
