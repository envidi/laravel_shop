<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;


class ProductController extends Controller
{
    private $products;
    private $categories;
    private $cart;
    public function __construct()
    {
        $this->products = new Product();
        $this->categories = new Category();
        $this->cart = new Cart();
    }

    public function index(Request $request)
    {
        return view('layouts.dashboard');
    }
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
    public function listProduct(Request $request)
    {   
        
        $productList = $this->products->getAllProducts();
        return view('admin.productList', compact('productList'));

        
    }
    public function getProductById(Request $request)
    {
        $product = $this->products->getSingleProduct($request->id);
        $singleProduct = $product[0];

        return view('clients.productDetail', compact('singleProduct'));
    }

    public function addProduct(Request $request)
    {
        $allCate = $this->categories->getAllCategories();
        return view('admin.productAdd', compact('allCate'));
    }
    public function handleAddProduct(Request $request)
    {

        $request->validate([
            'name' => 'required|min:5',
            'price' => 'required',
            'description' => 'required|min:5',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'category_id' => 'required',


        ], [
            'name.required' => 'Name is not allowed to empty',
            'price.required' => 'Price is not allowed to empty',
            'description.required' => 'Desc is not allowed to empty',
            'category_id.required' => 'Category is not allowed to empty'
        ]);
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'assets/client/images';
            $file->move($path, $filename);
        }

        $dataInsert = [
            $request->name,
            $request->price,
            $request->description,
            $request->$path . $filename,
            $request->category_id,
            date('Y-m-d H:i:s')
        ];

        $this->products->addProduct($dataInsert);

        return redirect()->route('products.list')->with('msg', 'Thêm sản phẩm thành công');
    }
    public function editProduct($id = 0)
    {
        if (!empty($id)) {
            $productDetail = $this->products->getOneProduct($id);
            if (!empty($productDetail[0])) {
                $allCate = $this->categories->getAllCategories();
                $productDetail = $productDetail[0];
                // dd($productDetail);
            } else {
                return redirect()->route('products.list')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('products.list')->with('msg', 'Liên kết không tồn tại');
        }
        return view('admin.productEdit', compact('productDetail', 'allCate'));
    }
    public function handleEditProduct(Request $request, $id = 0)
    {
        $request->validate([
            'name' => 'required|min:5',
            'price' => 'required',
            'description' => 'required|min:5',
            'category_id' => 'required',


        ], [
            'name.required' => 'Name is not allowed to empty',
            'price.required' => 'Price is not allowed to empty',
            'description.required' => 'Desc is not allowed to empty',
            'category_id.required' => 'Category is not allowed to empty'
        ]);

        $dataUpdate = [
            $request->name,
            $request->price,
            $request->description,
            $request->image,
            $request->category_id,
            date('Y-m-d H:i:s')
        ];

        $this->products->updateProduct($dataUpdate, $id);

        return  redirect()->route('products.edit', ['id' => $id])->with('msg', 'Update successfully');
    }

    // Soft deletes
    public function handleDeleteProduct($id = 0)
    {
        if (!empty($id)) {
                $data = Product::find($id);
                $data->delete();
            
        } else {
            $msg = 'This link is not exist';
        }
        return redirect()->back();
    }


    // hard deletes
    public function handleRemoveProduct($id = 0)
    {

        if (!empty($id)) {
            $productDetail = $this->products->getOneProduct($id);

            if (!empty($productDetail[0])) {
                $productDeleted = $this->products->deleteProduct($id);
                if ($productDeleted) {
                    $msg = 'Delete successfully';
                } else {
                    $msg = 'Delete failed';
                }
            } else {
                $msg = 'This product is not exist';
            }
        } else {
            $msg = 'This link is not exist';
        }

        return back();
    }
    public function listProductDeleted(Request $request)
    {
        $productList = $this->products->getAllProductsDeleted();
        return view('admin.productsDeleted', compact('productList'));
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if (!empty($product)) {
            $product->restore();
        }
        return redirect()->route('products.list')->with('msg', 'Restore product successfully!');
    }
}
